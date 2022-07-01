<?php
/*
 Template Name: Home
*/
 ?>
 <?php get_header(); ?>

 <div id="content">

 	<div id="inner-content" class="cf">

 		<main id="main" class="m-all t-all d-all cf " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

 			<section class="home-slider screen section">
 				<div class="swiper-container home-slider">
 					<div class="swiper-wrapper">
 						<?php
 						$args = array(
 							'post_type' => 'slider',
 							'order'     => 'DESC'
 						);

 						$query = new WP_Query( $args );
 						while( $query->have_posts() ) :

 							$query->the_post();
 							$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

 							echo '<div class="swiper-slide" style="background: url('.$image.') no-repeat center">';
 							echo '<div class="filter" style="background: #000"></div>';
 							echo '<div class="content-slide">';
 							echo the_content();
 							echo '</div>';
 							echo '</div>';

 						endwhile;
 						?>
 					</div>
 					<div class="swiper-pagination"></div>
 				</div> <!-- end slider -->
 			</section>


 			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

 				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf screen section' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
 					<div class="wrap">
 						<section class="entry-content cf" itemprop="articleBody">

 							<div class="clearfix">
 								<?php the_content(); ?>
 							</div>

 						</section>
 					</div>
 				</article>

 			<?php endwhile; endif; ?>

 		</main>

 	</div>

 </div>

 <?php get_footer(); ?>
