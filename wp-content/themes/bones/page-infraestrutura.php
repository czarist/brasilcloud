<?php
/*
 Template Name: Infraestrutura
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
                                    <div id="infra-text-banner" data-aos="fade-up" class="row justify-content-center align-items-center">
                                        <div class="col-8 pt-4 pb-4 text-banner text-white text-center">
                                            <h4><?= the_title() ?></h4>
                                            <?= the_content() ?>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section id="dados" class="mt-5">
                                <div data-aos="fade-right" class="row min-h-section">
                                    <div class="col-12 col-xl-6 text-left text-dark d-flex justify-content-center align-items-center">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-12 col-xl-6 ">
                                                <h2><?= get_field('texto_1', 5277) ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-aos="fade-left" class="col-12 col-xl-6 bg-center bg-cover bg-nrp br-120-left min-h-general" style="background-image: url('<?= get_field('imagem_1', 5277) ?>');"></div>
                                </div>
                            </section>

                            <section id="blocos-infra" class="mt-5 pt-5">
                                <div class="container">
                                    <div class="row min-h-section justify-content-center align-items-center">
                                        <div class="col-12">
                                            <div class="swiper3 position-relative">
                                                <div class="swiper-wrapper mb-5">
                                                    <?php
                                                    if (have_rows('blocos', 5277)) :
                                                        $count = 500;
                                                        while (have_rows('blocos', 5277)) : the_row();
                                                            $titulo_bloco = get_sub_field('titulo_bloco', 5277);
                                                            $texto_bloco = get_sub_field('texto_bloco', 5277);
                                                            $imagem_bloco = get_sub_field('imagem_bloco', 5277);
                                                            $count =  $count + 500;

                                                    ?>
                                                            <div data-aos="flip-up" data-aos-duration="<?= $count ?>" class="swiper-slide row justify-content-center align-items-center bloco-infra position-relative">

                                                                <div class="col-12 d-flex justify-content-center align-items-center flex-column text-center">
                                                                    <div class="content-image-bloco">
                                                                        <img src="<?= $imagem_bloco ?>" alt="<?= $titulo_bloco ?>">
                                                                    </div>
                                                                    <h4 class="mt-2 text-center"><?= $titulo_bloco ?></h4>
                                                                    <div class="barra-verde mt-2 mb-2"></div>

                                                                </div>
                                                                <div class="text-opaco text-center d-flex justify-content-center align-items-center flex-column">
                                                                    <h6><?= $titulo_bloco ?></h6>
                                                                    <div class="barra-verde"></div>
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

                            <section id="infra-bloco-3" class="mt-5 pt-5 mb-5 pb-5">
                                <div class="row min-h-section">
                                    <div data-aos="fade-left" class="col-12 col-xl-6 bg-center bg-cover bg-nrp br-120-right min-h-general" style="background-image: url('<?= get_field('imagem_2', 5277) ?>');"></div>
                                    <div data-aos="fade-right" class="col-12 col-xl-6 text-left text-dark d-flex justify-content-center align-items-center min-h-general">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-12 col-xl-6 ">
                                                <h2><?= get_field('texto_2', 5277) ?></h2>
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