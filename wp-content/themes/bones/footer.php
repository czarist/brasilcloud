			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<nav role="navigation">
						<?php wp_nav_menu(array('container' => 'div', 'container_class' => 'footer-links cf', 'menu' => __('Footer Links', 'bonestheme'), 'menu_class' => 'nav footer-nav cf', 'theme_location' => 'footer-links', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0, 'fallback_cb' => 'bones_footer_links_fallback')); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos os direitos reservados. <a href="http://ondaweb.com.br" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/ondaweb.png" /></a></p>

				</div>

			</footer>

			</div>

			<?php // all js scripts are loaded in library/bones.php 
			?>
			<?php wp_footer(); ?>

			</body>

			</html> <!-- end of site. what a ride! -->