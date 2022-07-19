<?php
/*
 Template Name: Home
*/
?>
<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="cf">

		<main id="main" class="m-all t-all d-all cf " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<section id="banners" class="banner-top fx fx-center">
				<div class="swiper position-relative">
					<div class="swiper-wrapper">

						<?php
						if (have_rows('banners', 8)) :
							while (have_rows('banners', 8)) : the_row();
								$imagem = get_sub_field('imagem', 8);
								$texto = get_sub_field('texto', 8);
								$i = ++$i
						?>
								<div class="swiper-slide banner position-relative  d-flex justify-content-start align-items-center" style="background-image: url('<?= $imagem ?>');">
									<div class="filter"></div>
									<div class="container">
										<div class="row justify-content-center align-items-center">
											<div class="col-8 pt-4 pb-4 text-banner text-white">
												<?= $texto ?>
											</div>
										</div>
									</div>
								</div>
						<?php

							endwhile;
						endif;
						?>
					</div>
					<div id="my-particles-1"></div>
					<div class="swiper-pagination"></div>
				</div>
			</section>


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf screen section'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<section class="entry-content pt-5 cf" itemprop="articleBody">

							<section id="servicos" class="mt-5 pt-5 mb-5 pb-5 container">
								<div class="row justify-content-center align-items-center">
									<div class="col-12 text-center text-dark d-flex justify-content-center align-items-center flex-column">
										<h2><?= get_field('titulo_servicos', 8) ?></h2>
										<div class="barra-verde mt-2"></div>
									</div>

									<?php
									$args = array(
										'post_type' => 'solucoes_e_produtos',
										'post_status' => 'publish',
										'posts_per_page' => -1,
										'orderby' => 'title',
										'order' => 'ASC',
									);

									$loop = new WP_Query($args);

									while ($loop->have_posts()) : $loop->the_post();
									?>

										<div class="row servicos-bloco p-4 d-none col-12 col-xl-4 justify-content-center align-items-center">
											<div class="col-12 the_servico d-flex justify-content-center align-items-center">
												<div class="row">
													<div class="col-12">
														<?php include 'library/images/servico_fundo.svg'; ?>

														<h6><?php the_title(); ?></h6>

														<?php the_excerpt(); ?>

														<a href="<?php echo the_permalink() ?>"> <b>Saiba mais ></b> </a>
													</div>
												</div>
											</div>
										</div>

									<?php
									endwhile;
									wp_reset_postdata();
									?>
								</div>
								<div class="col-12 d-flex justify-content-center align-items-center flex-column mt-5">
									<div id="mais_servicos" class="botaoFakeAjax d-flex">
										<span><b>Ver todos os serviços</b></span>
									</div>
									<div id="menos_servicos" class="botaoFakeAjax d-none">
										<span><b>Ver menos serviços</b></span>
									</div>
									<div id="ajaxLoad" class="d-none">
										<div class="lds-roller">
											<div></div>
											<div></div>
											<div></div>
											<div></div>
											<div></div>
											<div></div>
											<div></div>
											<div></div>
										</div>
									</div>
								</div>
							</section>
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

							<section id="sobre-home" class="mt-5 pt-5 mb-5 pb-5">
								<div class="row min-h-section">
									<div class="col-12 col-xl-6 text-left text-dark d-flex justify-content-center align-items-center">
										<div class="row justify-content-center align-items-center">
											<div class="col-12 col-xl-6 ">
												<h2><?= get_field('titulo_sobre', 8) ?></h2>
												<div class="barra-verde mt-2 mb-2"></div>
												<p> <?= get_field('texto_sobre', 8) ?></p>
												<a class="generalSaibaMais d-flex" href="<?= get_field('link_sobre', 8) ?>"> <b>Saiba Mais</b> </a>
											</div>
										</div>
									</div>
									<div class="col-12 col-xl-6 bg-center bg-cover bg-nrp br-120-left" style="background-image: url('<?= get_field('imagem_sobre', 8) ?>');"></div>
							</section>

							<section id="blog-home" class="bg-c-24cb9d59 mb-0 min-h-section">

								<div class="container">
									<div class="row">
										<div id="titles-blog-home" class="col-12 text-center pt-4 ">
											<h2><?= get_field('titulo_1_blog', 8) ?></h2>
											<h5><?= get_field('titulo_2_blog_', 8) ?></h5>
										</div>
									</div>
								</div>
								<div class="swiper2 position-relative">
									<div class="swiper-wrapper">
										<?php
										$the_argo = array(
											'post_type' => 'blog',
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'orderby' => 'title',
											'order' => 'ASC',
										);
										$loop_blog = new WP_Query($the_argo);
										while ($loop_blog->have_posts()) : $loop_blog->the_post();
										?>
											<div class="swiper-slide banner row position-relative">
												<div class="col-12 p-xl-5 p-2 d-flex justify-content-center align-items-center">
													<?php require(dirname(__FILE__) . "/template-parts/posts/post-blog.php"); ?>
												</div>
											</div>
										<?php
										endwhile;
										wp_reset_postdata();
										?>

									</div>

									<div class="swiper-pagination2 d-flex justify-content-center align-items-center mb-5 mt-2"></div>

								</div>
							</section>
						</section>
					</article>

			<?php endwhile;
			endif; ?>

		</main>

	</div>

</div>
<script type="text/javascript">

</script>
<?php get_footer(); ?>