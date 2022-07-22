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

					<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">


						<section class="entry-content cf" itemprop="articleBody">
							<section id="banner" class="banner-page-2 fx fx-center" style="background-image: url('<?= $image ?>');">
								<div class="filter"></div>
								<div class="container">

									<div class="row justify-content-center align-items-center w-100">
										<div class="col-8 pb-4 text-banner text-white text-center">
											<h2 class="mt-5"><?= the_title() ?></h2>
										</div>
									</div>
								</div>
							</section>

							<div class="container mt-5">
								<div class="row">
									<!-- conteúdo do blog -->
									<div class="col-xl-8 col-12 mt-5">
										<?php the_content(); ?>
										<div class="row mt-5 mb-5 pb-5 pt-5">
											<div class="col-6">
												<div id="compartilhe-posts" class="row">
													<div class="col-12">
														<h4>Compartilhe:</h4>
													</div>
													<div class="col-2">
														<a href="">
															<img class="m-0" src="<?php echo get_template_directory_uri(); ?>/library/images/share-facebook.svg" alt="facebook">
														</a>
													</div>
													<div class="col-2">
														<a href="">
															<img class="m-0" src="<?php echo get_template_directory_uri(); ?>/library/images/share-linkedin.svg" alt="linkedin">
														</a>
													</div>
													<div class="col-2">
														<a href="">
															<img class="m-0" src="<?php echo get_template_directory_uri(); ?>/library/images/share-twitter.svg" alt="twitter">
														</a>
													</div>
													<div class="col-2">
														<a href="">
															<img class="m-0" src="<?php echo get_template_directory_uri(); ?>/library/images/share-whatsapp.svg" alt="whatsapp">
														</a>
													</div>
													<div class="col-2">
														<a href="">
															<img class="m-0" src="<?php echo get_template_directory_uri(); ?>/library/images/share-link.svg" alt="link">
														</a>
													</div>
												</div>
											</div>
										</div>

									</div>
									<!-- lado direito -->
									<div class="col-xl-4 col-12">
										<?php include 'searchform-tutorial.php'; ?>
										<div class="col-12 mt-5">
											<h4>Categorias:</h4>
										</div>
										<div class="col-12">

											<?php
											$terms = get_terms([
												'taxonomy' => 'categoria_tutoriais',
												'hide_empty' => true,
											]);
											foreach ($terms as $term) {
											?>
												<span>
													<a class="text-blue mr-2" href="<?= get_term_link($term, "categoria_duvida")  ?>"><b>#<?= $term->name ?></b></a>
												</span>
											<?php } ?>
										</div>
										<div class="col-12 mt-5">
											<h4 class="texto-dark">
												Confira outras dúvidas:
											</h4>
										</div>

										<?php
										$args = array(
											'post_type' => 'tutorial',
											'post_status' => 'publish',
											'posts_per_page' => 5,
											'orderby' => 'title',
											'order' => 'ASC',
										);

										$query = new WP_Query($args);

										while ($query->have_posts()) : $query->the_post();
										?>
											<div class="col-12 mt-2">
												<span>
													<a class="text-blue" href="<?php echo the_permalink(); ?>"><b><?php the_title(); ?></b></a>
												</span>
											</div>

										<?php
										endwhile;
										wp_reset_postdata();
										?>
										<div class="col-12 mt-3 mb-5">
											<a class="text-golden" href="<?= home_url() ?>/duvidas"><b>Ver todos</b></a>
										</div>

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