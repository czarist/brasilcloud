<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		<?php
		wp_title('');
		echo ' - ' . $wp_query->post->post_title;
		?>
	</title>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	<meta name="theme-color" content="#121212">
	<meta name="author" content="Lucas Cezar Trentin" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>

	<!-- bootstrap -->
	<link href="<?php echo get_template_directory_uri(); ?>/library/bootstrap4.1.1/css/bootstrap.min.css" rel="stylesheet" />
	<script src="<?php echo get_template_directory_uri(); ?>/library/bootstrap4.1.1/js/bootstrap.min.js"></script>

	<!-- bootstrap icons -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/icons-1.5.0/font/bootstrap-icons.css" />

	<!-- fontawesome icons -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/fontawesome/css/all.css" />

	<!-- swipper -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/swiper/swiper.min.css" />
	<script src="<?php echo get_template_directory_uri(); ?>/library/swiper/swiper.min.js"></script>

	<!-- aos -->
	<script src="<?php echo get_template_directory_uri(); ?>/library/aos/dist/aos.js"></script>
	<link href="<?php echo get_template_directory_uri(); ?>/library/aos/dist/aos.css" rel="stylesheet" />

	<!-- urls -->
	<input type="hidden" name="get_template_directory_uri" id="get_template_directory_uri" value="<?php echo get_template_directory_uri(); ?>">
	<input type="hidden" name="home_url" id="home_url" value="<?php echo home_url(); ?>">

	<!-- particles js -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/particles/particles.min.js"></script>
</head>


<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

	<div id="container">
		<header id="header" class="header header-maior w-100" role="banner" itemscope itemtype="https://schema.org/WPHeader">

			<div id="sup-header" class="d-flex bg-c-DDDDDD">
				<div class="container p-0">
					<div class="row justify-content-end align-items-center pt-2 pb-2">
						<div class="col-xl-6 col-12 ">
							<nav role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
								<ul class="d-lg-flex d-none justify-content-between align-items-center m-0">
									<?php

									if (have_rows('menu_superior', 5336)) :
										while (have_rows('menu_superior', 5336)) : the_row();
											$texto = get_sub_field('texto', 5336);
											$link = get_sub_field('link', 5336);
											$id = get_sub_field('id', 5336);
									?>
											<li class="mr-5 d-none d-xl-block">
												<a class="mb-0 text-dark" id="<?= $id ?>" href="<?= $link ?>"><?= $texto ?></a>
											</li>
									<?php
										endwhile;
									endif;
									?>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div id="inner-header" class="container d-flex justify-content-between align-items-center p-0">

				<img id="open-menu" class="d-flex d-xl-none burguer" src="<?php echo get_template_directory_uri(); ?>/library/images/burguer.svg" alt="open-menu">
				<img id="close-menu" class="d-none close_it" src="<?php echo get_template_directory_uri(); ?>/library/images/close.svg" alt="open-menu">
				<p id="logo" class="h1 d-none d-xl-block" itemscope itemtype="https://schema.org/Organization">
					<a href="<?= home_url() ?>" rel="nofollow">
						<img id="imgLogo" src="<?php echo get_template_directory_uri(); ?>/library/images/logo.svg" alt="logo">
					</a>
				</p>
				<nav role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
					<ul class="d-lg-flex d-none justify-content-between align-items-center m-0">
						<?php
						if (have_rows('menu_inferior', 5336)) :
							while (have_rows('menu_inferior', 5336)) : the_row();
								$texto = get_sub_field('texto', 5336);
								$link = get_sub_field('link', 5336);
								$id = get_sub_field('id', 5336);
						?>
								<li class="mr-5 d-none d-xl-block menu-item">
									<a class="mb-0 text-dark" id="<?= $id ?>" href="<?= $link ?>"><?= $texto ?></a>
								</li>
						<?php
							endwhile;
						endif;
						?>
					</ul>
				</nav>
			</div>

			<nav id='menu-mobile' class="d-none" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
			</nav>

		</header>