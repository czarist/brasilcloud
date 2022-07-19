<?php
/*
 Template Name: MARKETPLACE
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
											<h4><?= the_title() ?></h4>
											<?= the_content() ?>
										</div>
									</div>
								</div>
							</section>
							<section id="marketplace-content">
								<div class="wrap">
									<div class="row align-items-center justify-content-center mt-5 mb-5">
										<div class="col-10">
											<p class="text-center">
												<?= get_field('texto_marketplace', 5410) ?>
											</p>
										</div>
									</div>
									<div class="row mt-5">
										<?php
										if (have_rows('empresas', 5410)) :
											while (have_rows('empresas', 5410)) : the_row();
												$logo_empresa = get_sub_field('logo_empresa', 5410);
												$titulo = get_sub_field('titulo', 5410);
												$texto_empresa = get_sub_field('texto_empresa', 5410);
												$site = get_sub_field('site', 5410);
										?>
												<div class="col-12 col-xl-3 text-center mb-3 ">
													<div class="empresa p-2">
														<img src="<?= $logo_empresa ?>" alt="<?= $titulo ?>">
														<h4><b><?= $titulo ?></b></h4>
														<p><?= $texto_empresa ?></p>
														<a href="https://<?= $site ?>"><?= $site ?></a>
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