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
                            <?php

                            $textos_e_imagens_comeco = get_field('textos_e_imagens_comeco', $post->ID);
                            if ($textos_e_imagens_comeco) {
                            ?>

                                <section id="textos-imagens-comeco">
                                    <div class="container">
                                        <?php
                                        if (have_rows('textos_e_imagens_comeco', $post->ID)) :
                                            $c = 1;
                                            while (have_rows('textos_e_imagens_comeco', $post->ID)) : the_row();
                                                $texto_geral = get_sub_field('texto_geral', $post->ID);
                                                $imagem_geral = get_sub_field('imagem_geral', $post->ID);
                                        ?>
                                                <div class="row mt-4 <?= $c % 2 == 0 ? 'flex-xl-row-reverse flex-row' : '' ?>">
                                                    <div class="col-12 col-xl-6">
                                                        <img src="<?= $imagem_geral ?>" alt="logo">
                                                    </div>
                                                    <div class="col-12 col-xl-6">
                                                        <?= $texto_geral ?>
                                                    </div>
                                                </div>
                                        <?php
                                                $c = ++$c;
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </section>

                            <?php
                            }

                            $titulo_painel = get_field('titulo_painel', $post->id);
                            $texto_dourado_painel = get_field('texto_dourado_painel', $post->id);
                            $texto_painel = get_field('texto_painel', $post->id);

                            if ($titulo_painel) {
                            ?>

                                <section class="mt-5 mb-5" id="galeria-painel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h2><?= $titulo_painel ?></h2>
                                                <div class="fx fx-center">
                                                    <div class="barra-verde"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-5">
                                                <div class="swiper swiperPainel">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        if (have_rows('imagens_painel', $post->id)) :
                                                            while (have_rows('imagens_painel', $post->id)) : the_row();
                                                                $imagem_painel = get_sub_field('imagem_painel_');
                                                        ?>
                                                                <div class="swiper-slide">
                                                                    <img src="<?php echo $imagem_painel; ?>" alt="<?= $titulo_painel ?>">
                                                                </div>

                                                        <?php
                                                            endwhile;
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                                <p>
                                                    <b class="text-golden">
                                                        <?= $texto_dourado_painel ?>
                                                    </b>
                                                    <span>
                                                        <?= $texto_painel ?>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            <?php }

                            $texto_geral = get_field('texto_geral', $post->ID);
                            if ($texto_geral) {

                            ?>

                                <section id="texto-geral" class="pt-5 pb-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <?= $texto_geral ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            <?php

                            }

                            $titulo_carrocel = get_field('titulo_carrocel', $post->id);

                            if ($titulo_carrocel) {
                            ?>
                                <section class="pt-5 pb-5 bg-c-FBFBFB" id="diferenciais">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h2><?= $titulo_carrocel ?></h2>
                                                <div class="fx fx-center">
                                                    <div class="barra-verde"></div>
                                                </div>
                                                <div class="swiper3 position-relative">
                                                    <div class="swiper-wrapper mb-5 mt-5">
                                                        <?php
                                                        if (have_rows('diferenciais_', $post->id)) :
                                                            while (have_rows('diferenciais_',  $post->id)) : the_row();
                                                                $imagem_diferencial = get_sub_field('imagem_diferencial');
                                                                $titulo_diferencial = get_sub_field('titulo_diferencial', $post->id);
                                                                $texto_diferencial = get_sub_field('texto_diferencial', $post->id);
                                                        ?>
                                                                <div class="swiper-slide row justify-content-center align-items-center bloco-infra position-relative">

                                                                    <div class="col-12 d-flex justify-content-center text-center align-items-center flex-column ">
                                                                        <div class="content-image-bloco d-flex justify-content-center text-center align-items-center">
                                                                            <img class="m-0" src="<?= $imagem_diferencial ?>" alt="<?= $titulo_diferencial ?>">
                                                                        </div>
                                                                        <h4 class="mt-2 text-center"><?= $titulo_diferencial ?></h4>
                                                                        <p><?= $texto_diferencial ?></p>
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

                            <?php  }

                            $titulo_carrocel_2 = get_field('titulo_carrocel_2', $post->id);

                            if ($titulo_carrocel_2) {
                            ?>
                                <section class="pt-5 pb-5" id="caracteristicas">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h2><?= $titulo_carrocel_2 ?></h2>
                                                <div class="fx fx-center">
                                                    <div class="barra-verde"></div>
                                                </div>
                                                <div class="swiper3 position-relative">
                                                    <div class="swiper-wrapper mb-5 mt-5">
                                                        <?php
                                                        if (have_rows('caracteristicas', $post->id)) :
                                                            while (have_rows('caracteristicas',  $post->id)) : the_row();
                                                                $titulo_caracteristica_ = get_sub_field('titulo_caracteristica_', $post->id);
                                                                $texto_caracteristica = get_sub_field('texto_caracteristica', $post->id);
                                                        ?>
                                                                <div class="swiper-slide row justify-content-center align-items-center bloco-infra position-relative">

                                                                    <div class="col-12 d-flex justify-content-center text-center align-items-center flex-column ">
                                                                        <h4 class="mt-2 text-center"><?= $titulo_caracteristica_ ?></h4>
                                                                        <p><?= $texto_caracteristica ?></p>
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

                            <?php  }

                            $imagens_e_textos_com_link_1 = get_field('imagens_e_textos_com_link_1', $post->ID);

                            if ($imagens_e_textos_com_link_1) {
                            ?>

                                <section id="imagens_e_textos_com_link_1" class="">
                                    <div class="container">
                                        <div class="row pb-5">
                                            <?php
                                            if (have_rows('imagens_e_textos_com_link_1', $post->id)) :
                                                while (have_rows('imagens_e_textos_com_link_1', $post->id)) : the_row();
                                                    $texto_ = get_sub_field('texto_');
                                                    $imagem = get_sub_field('imagem');
                                                    $link = get_sub_field('link');
                                            ?>
                                                    <div class="col-12 col-xl-6">
                                                        <?= $texto_ ?>
                                                        <img src="<?= $imagem ?>" alt="logo-imagens-servicos">
                                                        <div class="fx fx-center">
                                                            <a class="generalSaibaMais fx fx-center text-center p-1" href="<?= $link['url'] ?>">
                                                                <b><?= $link['title'] ?></b>
                                                            </a>
                                                        </div>
                                                    </div>
                                            <?php
                                                endwhile;
                                            endif; ?>
                                        </div>
                                    </div>
                                </section>

                            <?php
                            }

                            $texto_parceiros = get_field('texto_parceiros', $post->id);
                            $cor_fundo = get_field('cor_fundo', $post->id);
                            $medida_grade_parceiros = get_field('medida_grade_parceiros', $post->id);

                            if ($medida_grade_parceiros == 'col-1') {
                                $medida = 'col-xl-1';
                            } else if ($medida_grade_parceiros == 'col-2') {
                                $medida = 'col-xl-2';
                            } else if ($medida_grade_parceiros == 'col-3') {
                                $medida = 'col-xl-3';
                            } else if ($medida_grade_parceiros == 'col-4') {
                                $medida = 'col-xl-4';
                            } else if ($medida_grade_parceiros == 'col-5') {
                                $medida = 'col-xl-5';
                            } else if ($medida_grade_parceiros == 'col-6') {
                                $medida = 'col-xl-6';
                            } else if ($medida_grade_parceiros == 'col-7') {
                                $medida = 'col-xl-7';
                            } else if ($medida_grade_parceiros == 'col-8') {
                                $medida = 'col-xl-8';
                            } else if ($medida_grade_parceiros == 'col-9') {
                                $medida = 'col-xl-9';
                            } else if ($medida_grade_parceiros == 'col-10') {
                                $medida = 'col-xl-10';
                            } else if ($medida_grade_parceiros == 'col-11') {
                                $medida = 'col-xl-11';
                            } else if ($medida_grade_parceiros == 'col-12') {
                                $medida = 'col-xl-12';
                            }

                            if ($texto_parceiros) { ?>

                                <section class="pt-5 pb-5 <?= $cor_fundo == 'Verde' ? 'bg-c-24cb9d59' : 'bg-c-FBFBFB' ?>" id="parceiros-tecnologicos">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <?= $texto_parceiros ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php
                                            if (have_rows('parceiros', $post->id)) :
                                                while (have_rows('parceiros', $post->id)) : the_row();
                                                    $imagem_parceiro = get_sub_field('imagem_parceiro');
                                            ?>
                                                    <div class="<?= $medida ?> col-12 d-flex justify-content-center align-items-center">
                                                        <img src="<?= $imagem_parceiro ?>" alt="parceiros">
                                                    </div>
                                            <?php
                                                endwhile;
                                            endif
                                            ?>
                                        </div>
                                    </div>

                                </section>
                            <?php  }
                            $texto_infografico = get_field('texto_infografico', $post->id);
                            $imagem_infografico = get_field('imagem_infografico', $post->id);


                            if ($texto_infografico) {
                            ?>
                                <section id="infografico" class="pb-5 pt-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 mb-5">
                                                <?= $texto_infografico ?>
                                            </div>
                                            <div class="col-12">
                                                <img src="<?= $imagem_infografico ?>" alt="infografico">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php
                            }


                            $texto_secao_azul = get_field('texto_secao_azul', $post->id);
                            $link_secao_azul = get_field('link_secao_azul', $post->id);

                            if ($texto_secao_azul) { ?>

                                <section class="pt-5 pb-5" id="secao-azul">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 text-white">
                                                <?= $texto_secao_azul ?>
                                            </div>
                                        </div>
                                        <?php if ($link_secao_azul) { ?>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center align-items-center">
                                                    <a class="golden-link" href="<?= $link_secao_azul['url'] ?>"><?= $link_secao_azul['title'] ?></a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </section>

                            <?php
                            }

                            $imagens_e_textos_com_link_2 = get_field('imagens_e_textos_com_link_2');

                            if ($imagens_e_textos_com_link_2) {
                            ?>
                                <section id="imagens_e_textos_com_link_2" class="pt-5 pb-5">
                                    <div class="container">
                                        <div class="row pb-5">
                                            <?php
                                            if (have_rows('imagens_e_textos_com_link_2', $post->id)) :
                                                while (have_rows('imagens_e_textos_com_link_2', $post->id)) : the_row();
                                                    $texto_ = get_sub_field('texto_');
                                                    $imagem = get_sub_field('imagem');
                                                    $link = get_sub_field('link');
                                            ?>
                                                    <div class="col-12 col-xl-6">
                                                        <?= $texto_ ?>
                                                        <img src="<?= $imagem ?>" alt="logo-imagens-servicos">
                                                        <div class="fx fx-center">
                                                            <a class="generalSaibaMais fx fx-center text-center p-1" href="<?= $link['url'] ?>">
                                                                <b><?= $link['title'] ?></b>
                                                            </a>
                                                        </div>
                                                    </div>
                                            <?php
                                                endwhile;
                                            endif; ?>
                                        </div>
                                    </div>
                                </section>

                            <?php
                            }


                            $texto_imagens_fim = get_field('texto_imagens_fim', $post->id);
                            $textos_e_imagens_fim = get_field('textos_e_imagens_fim', $post->id);

                            if ($texto_imagens_fim or $textos_e_imagens_fim) {  ?>

                                <section id="textos-imagens-fim">
                                    <div class="container">
                                        <?php
                                        if ($texto_imagens_fim) { ?>
                                            <div class="col-12 mt-5 mb-5">
                                                <?= $texto_imagens_fim ?>
                                            </div>
                                            <?php  }
                                        if (have_rows('textos_e_imagens_fim', $post->ID)) :
                                            $kek = 1;
                                            while (have_rows('textos_e_imagens_fim', $post->ID)) : the_row();
                                                $texto_geral = get_sub_field('texto_geral', $post->ID);
                                                $imagem_geral = get_sub_field('imagem_geral', $post->ID);
                                            ?>
                                                <div class="row mt-5 mb-5 <?= $kek % 2 == 0 ? '' : 'flex-xl-row-reverse flex-row' ?>">
                                                    <div class="col-12 col-xl-6">
                                                        <img src="<?= $imagem_geral ?>" alt="logo">
                                                    </div>
                                                    <div class="col-12 col-xl-6">
                                                        <?= $texto_geral ?>
                                                    </div>
                                                </div>
                                        <?php
                                                $kek = ++$kek;
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </section>

                            <?php
                            }


                            $mostrar_secao_quem_confia = get_field('mostrar_secao_quem_confia', $post->id);
                            if ($mostrar_secao_quem_confia) {
                            ?>
                                <section id="quem-confia-home" class="mt-5 pt-5 mb-5 pb-5 container">

                                    <div class="row">
                                        <div class="col-12 text-center text-dark d-flex justify-content-center align-items-center flex-column">
                                            <h2><?= get_field('titulo_quem_confia', 8) ?></h2>
                                            <div class="barra-verde mt-2"></div>
                                        </div>

                                        <?php
                                        if (have_rows('quem_confia', 8)) :
                                            while (have_rows('quem_confia', 8)) : the_row();
                                                $logo_quem_confia = get_sub_field('logo_quem_confia'); ?>

                                                <div class="col-12 col-xl-3 mt-4 d-flex justify-content-center align-items-center">
                                                    <img src="<?= $logo_quem_confia ?>" alt="logo quem confia">
                                                </div>

                                        <?php endwhile;
                                        endif; ?>
                                    </div>

                                </section>

                            <?php }

                            $titulo_implantacao = get_field('titulo_implantacao', $post->id);
                            if ($titulo_implantacao) {
                            ?>
                                <section id="implantacao" class="pt-5 pb-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h1><?= $titulo_implantacao ?></h1>
                                                <div class="fx fx-center">
                                                    <div class="barra-verde"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <?php
                                            if (have_rows('implantacao', $post->id)) :
                                                while (have_rows('implantacao', $post->id)) : the_row();
                                                    $texto_implantacao = get_sub_field('texto_implantacao');
                                                    $imagem_implantacao = get_sub_field('imagem_implantacao');
                                            ?>
                                                    <div class="col-12 col-xl-4 ">

                                                        <div class="d-flex justify-content-center text-center bloco-infra align-items-center flex-column ">
                                                            <img src="<?= $imagem_implantacao ?>" alt="<?= $texto_implantacao ?>">
                                                            <h4 class="mt-2 text-center"><?= $texto_implantacao ?></h4>
                                                        </div>

                                                    </div>
                                            <?php
                                                endwhile;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </section>
                            <?php

                            }

                            $iframe_video_solucao = get_field('iframe_video_solucao', $post->ID);

                            if ($iframe_video_solucao) {
                            ?>
                                <div id="video-solucao" class="container pb-5">
                                    <div class="row">
                                        <div class="col-12 text-center mt-5 mb-5">
                                            <h1>Conheça a Solução</h1>
                                            <div class="fx fx-center">
                                                <div class="barra-verde"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <?= $iframe_video_solucao ?>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }

                            $texto_certificadoras = get_field('texto_certificadoras', $post->id);

                            if ($texto_certificadoras) {
                            ?>
                                <section id="sertificadoras" class="mt-5 mb-5 pt-5 pb-5">
                                    <div class="container">
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <h1><?= $texto_certificadoras ?></h1>
                                                <div class="fx fx-center">
                                                    <div class="barra-verde"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php
                                            if (have_rows('certificadoras', $post->ID)) :
                                                while (have_rows('certificadoras', $post->ID)) : the_row();
                                                    $imagem_certificadora = get_sub_field('imagem_certificadora');
                                            ?>
                                                    <div class="col-xl-4 col-12 d-flex mb-2 mt-2 justify-content-center text-center align-items-center">
                                                        <img src="<?= $imagem_certificadora ?>" alt="certificadoras">
                                                    </div>
                                            <?php
                                                endwhile;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </section>
                            <?php
                            }

                            $perguntas = get_field('perguntas', $post->ID);
                            if ($perguntas) {
                            ?>

                                <section id="perguntas" class="bg-c-24cb9d59 pt-5 pb-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 text-center d-flex justify-content-center align-items-center flex-column">
                                                <h2>Perguntas Frequentes</h2>
                                                <div class="barra-verde mt-2"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php
                                            if (have_rows('perguntas', $post->ID)) :
                                                $q = 0;
                                                while (have_rows('perguntas')) : the_row();
                                                    $pergunta = get_sub_field('pergunta', $post->ID);
                                                    $resposta = get_sub_field('resposta', $post->ID);
                                            ?>
                                                    <div class="box-pergunta col-12 bg-white mt-4 <?= $q > 2 ? 'd-none' : '' ?> ">
                                                        <div class="pergunta">
                                                            <p class="mt-2 mb-2"><b><?= $pergunta ?></b></p>
                                                            <i id="box-pergunta-<?= $q ?>" class="bi bi-plus h1 m-0"></i>
                                                        </div>
                                                        <div class="resposta box-pergunta-<?= $q ?> d-none">
                                                            <p class="mt-2 mb-2"><b class="text-golden">Resposta: </b><?= $resposta ?></p>
                                                        </div>
                                                    </div>
                                            <?php
                                                    $q = ++$q;
                                                endwhile;
                                            endif;
                                            ?>
                                            <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                                                <div id="botaoMostraMaisPerguntas" class="generalSaibaMais d-flex justify-content-center align-items-center">
                                                    <span>Ver mais perguntas</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            <?php } ?>

                    </article>

            <?php endwhile;
            endif; ?>
        </main>
    </div>
</div>
<style>

</style>
<?php get_footer(); ?>