<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="entry-header article-header">

									<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<div class="data-post">
						           		<span class="dia">
						                     <?php printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('d', 'bonestheme'))); ?>
							            </span>
							            <span class="mes">.
							                <?php printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('F', 'bonestheme'))); ?>
							            </span>
							            <span class="ano">.
							                <?php printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('Y', 'bonestheme'))); ?>
							            </span>
							        </div>

								</header>

								<section class="entry-content cf">

									<?php the_post_thumbnail( 'thumb-noticias' ); ?>

									<?php echo excerpt(30); ?>

								</section>

								<footer class="article-footer">

									<a id="leia-mais" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Continue lendo »</a>

								</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, post não encontrado!', 'bonestheme' ); ?></h1>
										</header>
									</article>

							<?php endif; ?>

						</main>

					<?php //get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
