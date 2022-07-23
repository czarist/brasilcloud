<?php
/*
 Template Name: Termos e Condições de Uso de nossos Serviços
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
                                            <h4>CONTRATO</h4>
                                            <h3><?= the_title() ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section id="content-texto-contrato" class="mt-5 mb-5 pt-5">
                                <div class="container">
                                    <div class="row min-h-section justify-content-center align-items-center">
                                        <div class="col-12 text-center text-left">
                                            <?= the_content() ?>
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