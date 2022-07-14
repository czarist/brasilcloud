<?php
/*
 Template Name: Dez Motivos
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

                            <section id="blocos-infra" class="mt-5 pt-5">
                                <div class="container">
                                    <div class="row min-h-section justify-content-center align-items-center">
                                        <div class="col-12 text-center">
                                            <div class="mb-5">
                                                <?= get_field('texto_motivos', 5315) ?>
                                            </div>
                                            <div class="swiper3 position-relative">
                                                <div class="swiper-wrapper mb-5">
                                                    <?php
                                                    if (have_rows('blocos', 5315)) :
                                                        while (have_rows('blocos', 5315)) : the_row();
                                                            $titulo_bloco = get_sub_field('titulo_bloco', 5315);
                                                            $texto_bloco = get_sub_field('texto_bloco', 5315);
                                                            $imagem_bloco = get_sub_field('imagem_bloco', 5315);
                                                    ?>
                                                            <div class="swiper-slide row justify-content-center align-items-center bloco-infra position-relative">

                                                                <div class="col-12 d-flex justify-content-center text-center align-items-center flex-column ">
                                                                    <div class="content-image-bloco">
                                                                        <img src="<?= $imagem_bloco ?>" alt="<?= $titulo_bloco ?>">
                                                                    </div>
                                                                    <h4 class="mt-2 text-center"><?= $titulo_bloco ?></h4>
                                                                </div>
                                                                <div class="text-opaco2 text-center d-flex justify-content-center align-items-center flex-column">
                                                                    <h6><?= $titulo_bloco ?></h6>
                                                                    <p><?= $texto_bloco ?></p>
                                                                </div>
                                                            </div>

                                                    <?php
                                                        endwhile;
                                                    endif;
                                                    ?>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div class="swiper-pagination3"></div>
                                                </div>
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