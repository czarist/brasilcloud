<?php
/*
 Template Name: duvidas
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
					} ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('cf screen section'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


						<section class="entry-content pt-5 cf" itemprop="articleBody">
							<section id="banner" class="banner-page-2 fx fx-center" style="background-image: url('<?= $image ?>');">
								<div class="filter"></div>
								<div class="container fx fx-center">
									<div class="row justify-content-center align-items-center w-100">
										<div class="col-8 pt-4 pb-4 text-banner text-white text-center">
											<h1><?= the_title() ?></h1>
										</div>
									</div>
								</div>
							</section>

							<section id="cats" class="mb-5">
								<div class="container">
									<div class="row">
										<div class="col-12 text-dark text-center mt-5">
											<?= the_content() ?>
										</div>
									</div>
								</div>
							</section>

							<section id="duvidas-intern" class="mb-0 min-h-section mt-5">

								<div class="container">
									<div class="row mb-4 mt-4">
										<?php
										if (have_rows('contratos', 5632)) :
											while (have_rows('contratos', 5632)) : the_row();
												$titulo_contrato = get_sub_field('titulo_contrato', 5632);
												$arquivo_contrato = get_sub_field('arquivo_contrato', 5632);

										?>
												<div onclick="location.href='<?= $arquivo_contrato ?>';" class="col-12 ml-0 mr-0 mb-2 mt-1 d-flex justify-content-between align-items-center duvida position-relative">
													<div class="d-flex align-items-center justify-content-start">
														<b>
															<p class="m-0"><?= $titulo_contrato ?></p>
														</b>
													</div>
													<div class="d-flex align-items-center justify-content-end">
														<i class="bi bi-download h4 m-0"></i>
													</div>
												</div>

										<?php
											endwhile;
										endif;
										?>

									</div>
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