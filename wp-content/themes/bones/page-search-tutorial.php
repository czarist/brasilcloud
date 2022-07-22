<?php
/*
 Template Name: Search Tutorial
*/
?>
<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="cf">

		<main id="main" class="m-all t-all d-all cf " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php
			$image = get_template_directory_uri() . "/library/images/blog-provisorio.jpg";
			?>

			<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<section class="entry-content pt-5 cf" itemprop="articleBody">
					<section id="banner" class="banner-page-2 fx fx-center" style="background-image: url('<?= $image ?>');">
						<div class="filter"></div>
						<div class="container fx fx-center">
							<div class="row justify-content-center align-items-center w-100">
								<div class="col-8 pt-4 pb-4 text-banner text-white text-center">
									<h4>Resultados para: <?= $s ?></h4>
								</div>
							</div>
						</div>
					</section>

					<section id="cats" class="mb-5">
						<div class="container">
							<div class="row">
								<div class="col-12 col-xl-8">
									<div class="mt-5">
										<?php
										$terms = get_terms([
											'taxonomy' => 'categoria_tutoriais',
											'hide_empty' => true,
										]);
										?>
										<select class="categoria-duvida pl-4" name="categoria-duvida" id="duvidas-select">
											<option value="" disabled selected>Categoria</option>
											<?php foreach ($terms as $term) : ?>
												<option value="<?= get_term_link($term, "categoria_tutoriais") ?>">
													<?= $term->name; ?>
												</option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-12 col-xl-4">
									<?php include 'searchform-tutorial.php'; ?>
								</div>
							</div>
						</div>
					</section>


					<section id="duvidas-intern" class="mb-0 min-h-section mt-5">
						<div class="container">
							<h2 class="text-left text-dark">
								Resultados:
							</h2>
							<div class="row mb-4 mt-4">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										<div onclick="location.href='<?= the_permalink() ?>';" class="col-12 ml-0 mr-0 mb-2 mt-1 d-flex justify-content-between align-items-center duvida position-relative">
											<div class="d-flex align-items-center justify-content-start">
												<b>
													<p class="m-0"><?php the_title(); ?></p>
												</b>
											</div>
											<div class="d-flex align-items-center justify-content-end">
												<i class="bi bi-arrow-right-short h4 m-0"></i>
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
		</main>
	</div>
</div>
<?php get_footer(); ?>