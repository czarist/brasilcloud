<?php
/*
 Template Name: Brasil Cloud
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

                            <section id="conheca" class="mt-5 pt-5 mb-5 pb-5">
                                <div class="row min-h-section">
                                    <div class="col-12 col-xl-6 text-left text-dark d-flex justify-content-center align-items-center">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-12 col-xl-6 ">
                                                <h2><?= get_field('texto_1', 5240) ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 bg-center bg-cover bg-nrp" style="background-image: url('<?= get_field('imagem_1', 5240) ?>');"></div>
                                </div>
                            </section>

                            <section id="proposito">
                                <div class="container">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-12">
                                            <?= get_field('texto_2', 5240) ?>
                                            <div class="justify-content-center align-items-center d-flex">
                                                <img class="mt-2 mw-100" src="<?= get_field('imagem_2', 5240) ?>" width="500" alt="Nosso Proposito">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section id="hoje" class="mt-5 pt-5 mb-5 pb-5">
                                <div class="row min-h-section">
                                    <div class="col-12 col-xl-6 bg-center bg-cover bg-nrp" style="background-image: url('<?= get_field('imagem_3', 5240) ?>');"></div>
                                    <div class="col-12 col-xl-6 text-left text-dark d-flex justify-content-center align-items-center">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-12 col-xl-6 ">
                                                <h2><?= get_field('texto_3', 5240) ?></h2>
                                            </div>
                                        </div>
                                    </div>
                            </section>

                            <section id="blocos" class="mt-5 pt-5">
                                <div class="container">
                                    <div class="row min-h-section justify-content-center align-items-center">
                                        <?php
                                        if (have_rows('blocos', 5240)) :
                                            while (have_rows('blocos', 5240)) : the_row();
                                                $titulo_bloco = get_sub_field('titulo_bloco', 5240);
                                                $texto_bloco = get_sub_field('texto_bloco', 5240);
                                                $imagem_bloco = get_sub_field('imagem_bloco', 5240);
                                        ?>

                                                <div class="col-12 col-xl-4">
                                                    <div class="row justify-content-center align-items-center boxe-bloco">
                                                        <div class="col-12 d-flex justify-content-start align-items-center flex-column text-center">
                                                            <div class="content-bloco-imagem">
                                                                <img src="<?= $imagem_bloco ?>" alt="<?php $titulo_bloco ?>">
                                                            </div>
                                                            <h3><?= $titulo_bloco ?></h3>
                                                            <p><?= $texto_bloco ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </section>

                            <section id="somos">
                                <div class="row min-h-section pb-5">
                                    <div class="col-12 col-xl-6 text-left text-dark d-flex justify-content-center align-items-center">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-12 col-xl-6 ">
                                                <h2><?= get_field('texto_4', 5240) ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 bg-center bg-cover bg-nrp" style="background-image: url('<?= get_field('imagem_4', 5240) ?>');"></div>
                                </div>
                            </section>
                    </article>

            <?php endwhile;
            endif; ?>

        </main>

    </div>

</div>

<?php get_footer(); ?>