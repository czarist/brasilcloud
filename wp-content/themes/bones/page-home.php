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
						<div class="wrap">
							<section class="entry-content cf" itemprop="articleBody">



							</section>
						</div>
					</article>

			<?php endwhile;
			endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>