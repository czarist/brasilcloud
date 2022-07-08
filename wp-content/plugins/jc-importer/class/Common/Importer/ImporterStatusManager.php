<?php

namespace ImportWP\Common\Importer;

use ImportWP\Common\Model\ImporterModel;
use ImportWP\Container;

class ImporterStatusManager
{
    public function get_importer_status(ImporterModel $importer)
    {
        $status_data = $importer->getStatus();
        if (!$status_data) {
            return false;
        }

        return new ImporterStatus($importer->getId(), $status_data);
    }

    public function get_importer_status_report(ImporterModel $immpoter_data, $session)
    {
        $logs = $this->get_importer_logs($immpoter_data);
        foreach ($logs as $log) {
            if ($log && $log['session'] === $session) {
                return $log;
            }
        }
        return false;
    }

    public function get_importer_logs(ImporterModel $importer_data, $page = 0, $per_page = -1)
    {
        $file_path = $this->get_status_file($importer_data->getId());

        $line_counter = 0;
        $lines = [];

        $start = $end = -1;

        if ($per_page > 0) {
            $start = ($page - 1) * $per_page;
            $end =  $start + $per_page;
        }

        if (file_exists($file_path)) {
            $fh = fopen($file_path, 'r');
            if ($fh !== false) {
                while (($data = fgets($fh)) !== false) {
                    if ($data[strlen($data) - 1] === "\n") {
                        $data = substr($data, 0, strlen($data) - 1);
                    }

                    if ($line_counter === $end) {
                        return $lines;
                    } elseif ($per_page === -1 || $line_counter >= $start) {
                        $lines[] = json_decode($data, true);
                    }

                    $line_counter++;
                }
                fclose($fh);
            }
        }
        return $lines;
    }

    public function prune_importer_logs(ImporterModel $importer_data, $limit)
    {
        $limit = intval($limit);
        if ($limit <= -1) {
            return;
        }

        $file_path = $this->get_status_file($importer_data->getId());
        $tmp_file_path = $this->get_status_file($importer_data->getId()) . '.tmp';
        $lines = $this->get_importer_logs($importer_data);

        if (count($lines) > $limit) {

            require_once(ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php');
            require_once(ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php');
            $fileSystemDirect = new \WP_Filesystem_Direct(false);

            $fh = fopen($tmp_file_path, 'w');
            for ($i = 0; $i < count($lines); $i++) {

                if ($i < count($lines) - $limit) {
                    $log_file_path = $this->get_log_file($importer_data->getId(), $lines[$i]['session']);
                    if ($fileSystemDirect->exists($log_file_path)) {

                        $fileSystemDirect->delete($log_file_path);

                        $tmp = $log_file_path;
                        for ($j = 0; $j < 3; $j++) {
                            $tmp = dirname($tmp);
                            $sub_files = $fileSystemDirect->dirlist($log_file_path);
                            if (empty($sub_files)) {
                                $fileSystemDirect->rmdir($tmp);
                            }
                        }
                    }
                } else {
                    fputs($fh, json_encode($lines[$i]) . "\n");
                }
            }
            fclose($fh);

            if ($fileSystemDirect->move($tmp_file_path, $file_path, true)) {
                $fileSystemDirect->delete($tmp_file_path);
            }
        }
    }

    public function get_importer_log(ImporterModel $importer_data, $session_id, $page = 0, $per_page = -1)
    {
        $file_path = $this->get_log_file($importer_data->getId(), $session_id);

        $line_counter = 0;
        $lines = [];
        $start = $end = -1;

        if ($per_page > 0) {
            $start = ($page - 1) * $per_page;
            $end =  $start + $per_page;
        }

        if (file_exists($file_path)) {
            $fh = fopen($file_path, 'r');
            if ($fh !== false) {
                while (($data = fgetcsv($fh)) !== false) {
                    if ($line_counter === $end) {
                        return $lines;
                    } elseif ($per_page === -1 || $line_counter >= $start) {
                        $lines[] = $data;
                    }

                    $line_counter++;
                }
                fclose($fh);
            }
        }
        return $lines;
    }

    public function get_status_file($id)
    {
        /**
         * @var ImporterManager $importer_manager
         */
        $importer_manager = Container::getInstance()->get('importer_manager');
        return $importer_manager->get_config_path($id) . '.status';
    }

    public function get_log_file($importer_id, $session_id)
    {
        /**
         * @var ImporterManager $importer_manager
         */
        $importer_manager = Container::getInstance()->get('importer_manager');
        return $importer_manager->get_config_path($importer_id, false, $session_id) . '.logs-' . $session_id;
    }

    public function create(ImporterModel $importer)
    {
        $version = get_post_meta($importer->getId(), '_iwp_version', true);
        if ($version !== false) {
            $version++;
        } else {
            $version = 0;
        }
        update_post_meta($importer->getId(), '_iwp_version', $version);

        $status = new ImporterStatus($importer->getId(), [
            'session' => md5($importer->getId() . time()),
            'status' => 'init',
            'version' => $version
        ]);

        // keep track of current session
        update_post_meta($importer->getId(), '_iwp_session', $status->get_session_id());

        $importer->setStatus($status);
        return $status;
    }

    public function clear(ImporterModel $importer_model)
    {
        delete_post_meta($importer_model->getId(), '_iwp_session');
        wp_update_post(['ID' => $importer_model->getId(), 'post_excerpt' => '']);
    }
}
