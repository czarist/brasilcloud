<?php
/*
 Template Name: Search Blog
*/
?>
<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="cf">

		<main id="main" class="m-all t-all d-all cf " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php
			$image = get_template_directory_uri() . "/library/images/blog-provisorio.jpg";
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('cf screen section'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

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

					<section id="cats">
						<div class="container">
							<div class="row">
								<div class="col-12 col-xl-8">
									<div class="mt-5">
										<?php
										$terms = get_terms([
											'taxonomy' => 'category',
											'hide_empty' => true,
										]);
										?>

										<?php foreach ($terms as $term) : ?>

											<a href="<?php echo get_term_link($term, "category"); ?>">
												<span><b>#<?php echo $term->name; ?></b></span>
											</a>

										<?php endforeach; ?>
									</div>
								</div>
								<div class="col-12 col-xl-4">
									<?php include 'searchform-blog.php'; ?>
								</div>
							</div>
						</div>
					</section>

					<section id="blog-intern" class="mb-0 min-h-section">
						<div class="container">
							<div class="row mb-4 mt-4">
								<?php
								function get_the_cats()
								{
									$categorias = get_the_category();
									foreach ($categorias as $categoria) {
										echo '<a href="#" class="cat-blog">' . $categoria->name . '</a>,';
									}
								}
								if (have_posts()) : while (have_posts()) : the_post();

										$image = get_the_post_thumbnail_url(get_the_ID(), 'full');

										if (!$image) {
											// se não houver imagem principal selecionada, o IF define essa imagem como capa;
											$image = get_template_directory_uri() . "/library/images/blog-provisorio.jpg";
										}	?>

										<div class="col-12 col-xl-4 mt-2 mb-2 d-flex justify-content-center align-items-center">
											<div class="box-blog position-relative ">
												<img class="p-0 m-0" height="230" width="350" src="<?= $image ?>" alt="img-blog">
												<div class="row pl-3 pr-3 mt-2">
													<div class="col-12">
														<?php get_the_cats() ?>
													</div>
												</div>
												<h6 class="text-black p-3"><?php the_title(); ?></h6>
												<div class="pl-3 pr-3">
													<?php the_excerpt(); ?>
												</div>
												<a class="ler-mais-blog" href="<?php echo get_permalink(); ?>"><b>Ler mais</b></a>
											</div>
										</div>

								<?php endwhile;
								endif; ?>
							</div>
						</div>
					</section>
				</section>
			</article>
		</main>
	</div>
</div>
<?php get_footer(); ?>