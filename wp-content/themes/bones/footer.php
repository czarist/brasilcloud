			<div id="newsletter" class="d-flex position-relative justify-content-center align-items-center">
				<div class="filter-degrade"></div>
				<div data-aos="flip-up" data-aos-duration="1000" class="container">
					<div class="row">
						<div class="col-12">
							<h1 class="text-center text-white mb-5">Inscreva-se na nossa Newsletter</h1>
							<form action="" method="post">
								<div class="row">
									<div class="col-12 col-xl-4">
										<input type="text" name="nome" id="nome" placeholder="Nome">
									</div>
									<div class="col-12 col-xl-4">
										<input type="email" name="email" id="email" placeholder="E-mail">
									</div>
									<div class="col-12 col-xl-4">
										<input type="submit" class="botaoNews text-white" value="Inscreva-se" name="enviar" id="enviar">
									</div>
									<div class="col-12 d-flex justify-content-start align-items-center">
										<input class="mb-0 mr-2" type="checkbox" name="concorda" id="concorda">
										<span class="text-white">
											Ao continuar, você indica que aceita nossos <a class="text-white" href=""><ins>Termos de Serviço</ins></a> e a nossa <a class="text-white" href=""><ins>Política de Privacidade</ins></a>.
										</span>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="container">
					<div id="links-rodape" class="row pt-5">
						<div data-aos="fade-up" data-aos-duration="1000" class="col-12 col-xl-3 text-center text-xl-left  br-white d-xl-flex justify-content-center justify-content-xl-start">
							<div class="row">
								<div class="col-12">
									<nav role="navigation">
										<?php
										if (have_rows('links_rodape_bloco_1', 5336)) :
											while (have_rows('links_rodape_bloco_1', 5336)) : the_row();
												$titulo = get_sub_field('titulo', 5336);
										?>
												<ul>
													<li><b><?= $titulo ?></b></li>
													<?php
													if (have_rows('links_rodape', 5336)) :
														while (have_rows('links_rodape', 5336)) : the_row();
															$link_rodape = get_sub_field('link_rodape', 5336);
															$titulo_link = get_sub_field('titulo_link', 5336);

													?>
															<li><a href="<?= $link_rodape ?>" class="text-white"><?= $titulo_link ?></a></li>
													<?php
														endwhile;
													endif;
													?>
												</ul>

										<?php
											endwhile;
										endif;
										?>
									</nav>
								</div>
							</div>
						</div>
						<div data-aos="fade-up" data-aos-duration="1500" class="col-12 col-xl-3 text-center text-xl-left  br-white d-xl-flex justify-content-center">
							<div class="row">
								<div class="col-12">
									<nav role="navigation">
										<?php
										if (have_rows('links_rodape_bloco_2', 5336)) :
											while (have_rows('links_rodape_bloco_2', 5336)) : the_row();
												$titulo = get_sub_field('titulo', 5336);
										?>
												<ul>
													<li><b><?= $titulo ?></b></li>
													<?php
													if (have_rows('links_rodape', 5336)) :
														while (have_rows('links_rodape', 5336)) : the_row();
															$link_rodape = get_sub_field('link_rodape', 5336);
															$titulo_link = get_sub_field('titulo_link', 5336);

													?>
															<li><a href="<?= $link_rodape ?>" class="text-white"><?= $titulo_link ?></a></li>
													<?php
														endwhile;
													endif;
													?>
												</ul>

										<?php
											endwhile;
										endif;
										?>
									</nav>
								</div>
							</div>
						</div>
						<div data-aos="fade-up" data-aos-duration="2000" class="col-12 col-xl-3 text-center text-xl-left  br-white d-xl-flex justify-content-center">
							<div class="row">
								<div class="col-12">
									<nav role="navigation">
										<?php
										if (have_rows('links_rodape_bloco_3', 5336)) :
											while (have_rows('links_rodape_bloco_3', 5336)) : the_row();
												$titulo = get_sub_field('titulo', 5336);
										?>
												<ul>
													<li><b><?= $titulo ?></b></li>
													<?php
													if (have_rows('links_rodape', 5336)) :
														while (have_rows('links_rodape', 5336)) : the_row();
															$link_rodape = get_sub_field('link_rodape', 5336);
															$titulo_link = get_sub_field('titulo_link', 5336);

													?>
															<li><a href="<?= $link_rodape ?>" class="text-white"><?= $titulo_link ?></a></li>
													<?php
														endwhile;
													endif;
													?>
												</ul>

										<?php
											endwhile;
										endif;
										?>
									</nav>
								</div>
							</div>
						</div>
						<div data-aos="fade-up" data-aos-duration="2500" class="col-12 col-xl-3 text-center text-xl-left  d-xl-flex justify-content-xl-end justify-content-center">
							<div class="row">
								<div class="col-12">
									<nav role="navigation">
										<?php
										if (have_rows('links_rodape_bloco_4', 5336)) :
											while (have_rows('links_rodape_bloco_4', 5336)) : the_row();
												$titulo = get_sub_field('titulo', 5336);
										?>
												<ul>
													<li><b><?= $titulo ?></b></li>
													<?php
													if (have_rows('links_rodape', 5336)) :
														while (have_rows('links_rodape', 5336)) : the_row();
															$link_rodape = get_sub_field('link_rodape', 5336);
															$titulo_link = get_sub_field('titulo_link', 5336);

													?>
															<li><a href="<?= $link_rodape ?>" class="text-white"><?= $titulo_link ?></a></li>
													<?php
														endwhile;
													endif;
													?>
												</ul>

										<?php
											endwhile;
										endif;
										?>
									</nav>
									<ul class="mt-5">
										<li class="mb-2">Empresa Associada:</li>
										<li><img src="<?= get_field('empresa_associada', 5336) ?>" alt="Empresa Associada"></li>
									</ul>
									<ul class="mt-5">
										<li class="mb-2">Empresa Colaboradora :</li>
										<li><img src="<?= get_field('empresa_colaboradora', 5336) ?>" alt="Empresa Colaboradora"></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div id="general-infos-footer" class="row mt-5 mb-5">
						<div data-aos="flip-up" data-aos-duration="1000" class="col-12 col-xl-3 d-xl-block d-flex justify-content-center mb-xl-0 mb-5">
							<a href="<?php echo home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/library/images/logofooter.svg" alt="logo footer">
							</a>
						</div>
						<div data-aos="flip-up" data-aos-duration="1000" class="col-12 col-xl-3">
							<p class="text-center text-white text-xl-left">
								<?= get_field('infos', 5336) ?>
							</p>
						</div>
						<div data-aos="flip-up" data-aos-duration="1000" class="col-12 col-xl-3">
							<p class="text-center text-white text-xl-left">
								<?= get_field('endereco', 5336) ?>
							</p>
						</div>
						<div data-aos="flip-up" data-aos-duration="1000" class="col-12 col-xl-3 d-xl-block d-flex justify-content-center">
							<div class="d-flex">
								<a class="ml-2 mr-2" href="<?= get_field('facebook', 5336) ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/logofacebook.svg" alt="facebook">
								</a>
								<a class="ml-2 mr-2" href="<?= get_field('linkedin', 5336) ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/logolinkedin.svg" alt="linkedin">
								</a>
								<a class="ml-2 mr-2" href="<?= get_field('twitter', 5336) ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/logotwitter.svg" alt="twitter">
								</a>
								<a class="ml-2 mr-2" href="<?= get_field('instagram', 5336) ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/logoinstagram.svg" alt="instagram">
								</a>
								<a class="ml-2 mr-2" href="<?= get_field('youtube', 5336) ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/logoyoutube.svg" alt="youtube">
								</a>
								<a class="ml-2 mr-2" href="https://api.whatsapp.com/send?phone=<?= get_field('whatsapp', 5336) ?>&text=Gostaria%20de%20fazer%20um%20or%C3%A7amento!">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/logowhatsapp.svg" alt="whatsapp">
								</a>
							</div>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12">
							<p class="source-org copyright">
								&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
								. Todos os direitos reservados.
								<a href="https://ondaweb.com.br" target="_blank">
									<img class="ondaweb_icon" src="<?php echo get_template_directory_uri(); ?>/library/images/ondaweb-ico-white.png" />
								</a>
							</p>
						</div>
					</div>
				</div>
			</footer>

			</div>

			<?php wp_footer(); ?>

			</body>

			</html>