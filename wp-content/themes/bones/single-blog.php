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
								<div class="container">

									<div class="row justify-content-center align-items-center w-100">
										<div class="col-8 pt-4 pb-4 text-banner text-white text-center">
											<div class="row">
												<div class="col-12 d-none d-xl-block">
													<?php
													$tags = get_tags();
													foreach ($tags as $tag) { ?>
														<span class="text-golden">#<?= $tag->name ?></span>
													<?php } ?>
												</div>
											</div>
											<h5 class="mt-5"><?= the_title() ?></h5>
										</div>
									</div>
								</div>
							</section>

							<div class="container mt-5">
								<div class="row">
									<!-- lado esquerdo -->
									<div class="col-xl-3 col-12 mt-5">
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
										<div class="row mt-5">
											<div class="col-12">
												<h4>Publicado em:</h4>
											</div>
											<div class="col-12">
												<?php echo get_the_date(); ?>
											</div>
										</div>
										<div class="row mt-5">
											<div class="col-12">
												<h4>Publicado por:</h4>
											</div>
											<div class="col-12">
												<?php echo get_the_author(); ?>
											</div>
										</div>
										<div class="row mt-5">
											<div class="col-12">
												<h4>Tags:</h4>
											</div>

											<?php
											$tags = get_tags();
											foreach ($tags as $tag) { ?>
												<div class="col-12">
													<span class="text-blue"><b>#<?= $tag->name ?></b></span>
												</div>
											<?php } ?>

										</div>
									</div>
									<!-- conteúdo do blog -->
									<div class="col-xl-6 col-12 mt-5">
										<?php the_content(); ?>
										<div class="row">
											<div class="col-xl-6 col-12">
												<div class="row">
													<div class="col-12">
														<h4>Publicado por:</h4>
													</div>
													<div class="col-12">
														<?php echo get_the_author(); ?>
													</div>
												</div>
											</div>
											<div class="col-xl-6 col-12">
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
									<div class="col-xl-3 col-12">
										<?php include 'searchform-blog.php'; ?>
										<div class="row mt-5">
											<div class="col-12">
												<h4>Categorias:</h4>
											</div>

											<?php
											$categorias = get_the_category();
											foreach ($categorias as $categoria) {
											?>
												<div class="col-12">
													<span>
														<a class="text-blue" href="<?= home_url() ?>/category/<?= $categoria->slug ?>"><b>#<?= $categoria->name ?></b></a>
													</span>
												</div>
											<?php } ?>
										</div>
										<div class="col-12 mt-5">
											<a href="#">
												<?php include 'library/images/teste_publicidade.svg'; ?>
											</a>
										</div>
										<div class="col-12 mt-5">
											<h4 class="texto-dark">
												Posts recentes:
											</h4>
										</div>

										<?php
										$args = array(
											'post_type' => 'blog',
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
										<div class="col-12 mt-3">
											<a class="text-golden" href="<?= home_url() ?>/blog_page"><b>Ver todos</b></a>
										</div>
										<div class="col-12 mt-5">
											<a href="#">
												<?php include 'library/images/teste_publicidade2.svg'; ?>
											</a>
										</div>
									</div>

								</div>
							</div>

							<section id="blog-destaques" class="mb-0 min-h-section">
								<div class="container">
									<div class="row">
										<div id="titles-blog-home" class="col-12 text-center text-dark mt-5 mb-5">
											<h2>Confira posts relacionados</h2>
										</div>
									</div>
								</div>
								<div class="swiper2 position-relative">
									<div class="swiper-wrapper">
										<?php
										$args = array(
											'post_type' => 'blog',
											'post_status' => 'publish',
											'posts_per_page' => 7,
											'orderby' => 'title',
											'order' => 'ASC',
										);

										$query = new WP_Query($args);

										while ($query->have_posts()) : $query->the_post();
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