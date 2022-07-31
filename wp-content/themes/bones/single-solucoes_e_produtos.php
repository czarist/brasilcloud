<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="cf">

        <main id="main" class="m-all t-all d-all cf " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

            <?php if (have_posts()) : while (have_posts()) : the_post();
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $tipo_cabecario = get_field('tipo_cabecario', $post->ID);

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
                                        <div class="col-8 pt-4 pb-4 text-banner  text-center">
                                            <h4 class="text-golden"><?= the_title() ?></h4>
                                            <h2 class="text-white"> <b><?= the_content() ?></b> </h2>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="container p-5" id="cabecario-servico">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <?= get_field('texto_cabecario', $post->ID) ?>
                                    </div>
                                </div>
                                <?php

                                if ($tipo_cabecario == 'Plano com Abas') {
                                    include_once 'template-parts/produtos_solucoes/planos_com_abas.php';
                                } else if ($tipo_cabecario == 'Planos') {
                                    include_once 'template-parts/produtos_solucoes/planos_simples.php';
                                } else if ($tipo_cabecario == 'Formulário') {
                                    include_once 'template-parts/produtos_solucoes/tipo_formulario.php';
                                } else if ($tipo_cabecario == 'Registro de Domínio') {
                                    include_once 'template-parts/produtos_solucoes/registro_dominio.php';
                                }

                                ?>
                            </section>
                    </article>
            <?php endwhile;
            endif; ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>