<?php

$tld_pesquisados = array();
$valores_tld = array();

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://contrate.brasilwork.com.br/dominios/valores_extensoes/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: contrate.brasilwork.com.br'));
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$pega_valores = json_decode($output, true);
foreach ($pega_valores as $valor) {
    $valores_tld[$valor['extensao']] = $valor['valoranual'];
}

require('inc/Whois/Whois.php');
require('inc/tldextract.php');

$resultado = array();
if (!is_array($_GET['dominio'])) {
    $_GET['dominio'] = array($_GET['dominio'] => $_GET['dominio']);
}
foreach ($_GET['dominio'] as $dominio) {
    $TLD = tldextract($dominio);
    $tld_pesquisados[$TLD->tld] = $TLD->tld;
}
if (count($_GET['dominio']) == 1) {
    $TLD = tldextract($_GET['dominio'][0]);
    foreach ($valores_tld as $tld => $valor) {
        if (!$tld_pesquisados[$tld]) {
            $_GET['dominio'][] = $TLD->domain . '.' . $tld;
        }
    }
}
foreach ($_GET['dominio'] as $dominio) {
    try {
        $TLD = tldextract($dominio);
        if (!isset($valores_tld[$TLD->tld])) {
            $valores_tld[$TLD->tld] = '40';
        }
        $domain = new Phois\Whois\Whois($dominio);
        $whois_answer = $domain->info();
        if ($domain->isAvailable()) {
            $resultado[$dominio] = array('registrado' => 0, 'tld' => $TLD->tld, 'valor' => $valores_tld[$TLD->tld], 'valor_formatado' => number_format($valores_tld[$TLD->tld], 2));
        } else {
            $resultado[$dominio] = array('registrado' => 1, 'tld' => $TLD->tld, 'valor' => $valores_tld[$TLD->tld], 'valor_formatado' => number_format($valores_tld[$TLD->tld], 2));
        }
    } catch (Exception $ex) {
    }
}

$resultado_post = array('dominios' => $resultado, 'ip' => $_SERVER['REMOTE_ADDR']);
$url = 'https://api.workstation.brasilwork.com.br/consulta_whois/?key=5438uhcdfegcnj6ddjghj3kk812365&';
$arrContextOptions = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    ),
    'http' => array(
        'content' => http_build_query($resultado_post),
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
    )
);

$response = @file_get_contents($url, false, stream_context_create($arrContextOptions));

echo json_encode($resultado);
