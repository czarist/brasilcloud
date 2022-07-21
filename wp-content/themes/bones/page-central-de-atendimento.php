<?php
/*
 Template Name: Central de Atendimento
*/
?>
<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="cf">

        <main id="main" class="m-all t-all d-all cf " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

            <?php if (have_posts()) : while (have_posts()) : the_post();
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');

                    if (!$image) {
                        // se não houver imagem principal selecionada, o IF define essa imagem como capa;
                        $image = get_template_directory_uri() . "/library/images/blog-provisorio.jpg";
                    }
            ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('cf screen section'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                        <section class="entry-content" itemprop="articleBody">

                            <section id="banner" class="banner-page fx fx-center" style="background-image: url('<?= $image ?>');">
                                <div class="filter"></div>
                                <div class="container">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-8 pt-4 pb-4 text-banner text-white text-center">
                                            <h4><?= the_title() ?></h4>
                                            <?= the_content() ?>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section id="form-trabalhe-conosco" class="mb-5 mt-5 p-0 p-xl-5 ">
                                <div class="container">
                                    <div class="row form-box-trabalhe-com-nos">
                                        <?php echo do_shortcode('[contact-form-7 id="5444" title="FALE CONOSCO"]'); ?>
                                    </div>
                                </div>
                            </section>
                            <section id="fale-conosco-infos" class="pb-5 mb-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <?= get_field('horarios_de_atendimento', 5445) ?>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <?= get_field('endereco_para_correspondecias', 5445) ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section id="video-fale-conosco" class="bg-c-24cb9d59">
                                <div class="container p-2 p-xl-5">
                                    <div class="row">
                                        <div class="col-12 p-2 p-xl-5">
                                            <h4 class="text-center mb-4"><?= get_field('titulo_video', 5445) ?></h4>
                                            <hr>
                                            <div class="fx fx-center">
                                                <?= get_field('iframe_video', 5445) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                    </article>

            <?php endwhile;
            endif; ?>

        </main>

    </div>

</div>

<?php get_footer(); ?>