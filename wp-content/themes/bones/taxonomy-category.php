<?php
$categoriaAtual = get_queried_object();
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
									<h4><?= $categoriaAtual->name ?></h4>
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
								$big = 999999999;
								$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
								$the_argo = array(
									'post_type' => 'blog',
									'post_status' => 'publish',
									'posts_per_page' => 9,
									'orderby' => 'title',
									'order' => 'ASC',
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field'    => 'slug',
											'terms'    => $categoriaAtual->slug,
										),
									),
								);

								$loop_blog = new WP_Query($the_argo);
								while ($loop_blog->have_posts()) : $loop_blog->the_post();
								?>
									<div class="col-12 col-xl-4 mt-2 mb-2 d-flex justify-content-center align-items-center">
										<?php require(dirname(__FILE__) . "/template-parts/posts/post-blog.php"); ?>
									</div>
								<?php
								endwhile;
								wp_reset_postdata();
								?>

							</div>
						</div>
						<div class="content-paginacao wrap fx fx-center mt-5 mb-5">
							<?php
							echo '<div class="" aria-label="Paginação">';
							echo paginate_links(array(
								'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
								'format' => '?paged=%#%',
								'current' => max(1, get_query_var('paged')),
								'total' => $loop_blog->max_num_pages
							));
							echo '</div>';
							?>
						</div>
					</section>
				</section>
			</article>

		</main>

	</div>

</div>
<script type="text/javascript">

</script>
<?php get_footer(); ?>