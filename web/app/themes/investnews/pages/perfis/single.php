<?php
get_header();
?>
<section id="header-perfil" class="header__perfil">
	<div class="container">
	
		<div class="nu-post-head-content">
			<div class="perfil__wrapper">
				<div class="perfil__content">
					<?php
					$user_image = get_field('foto_perfil');
					?>
					<div class="perfil__img">
						<img src="<?php echo $user_image['url']; ?>" alt="<?php the_title(); ?>">
					</div>

					<div class="text-content">
						<div class="perfil__name">
							<h3 class="nu-post-cat left relative">
								<a href="/perfis">
									<span class="nu-post-cat left">Perfis</span>
								</a>
							</h3>
							<h1 class="title"><?php the_title(); ?></h1>
						</div>
	
						<div class="perfil__text">
							<p class="perfil__excerpt">
								<?php the_field('descricao_perfil_interna'); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
			
	</div>
</section>

<section class="perfil__wrapper">
	<div class="container">
		<div class="perfil__grid">
			<div class="perfil__item">

				<?php if (wp_is_mobile()) : ?>
					<div class="perfil__title">
						<h2>Perfil de <span><?php the_title(); ?></span></h2>
						<hr>
					</div>
					<div class="perfil__informacoes mobile__item">
						<table>
							<?php if (get_field('nome_completo_perfil')) : ?>
								<tr>
									<td>Nome Completo</td>
									<td><?php the_field('nome_completo_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('data_de_nascimento_perfil')) : ?>
								<tr>
									<td>Nascimento</td>
									<td><?php the_field('data_de_nascimento_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('local_de_nascimento_perfil')) : ?>
								<tr>
									<td>Local de Nascimento</td>
									<td><?php the_field('local_de_nascimento_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('filhos_perfil')) : ?>
								<tr>
									<td>Filhos</td>
									<td><?php the_field('filhos_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('nacionalidade_perfil')) : ?>
								<tr>
									<td>Nacionalidade</td>
									<td><?php the_field('nacionalidade_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('formacao_perfil')) : ?>
								<tr>
									<td>Formação</td>
									<td><?php the_field('formacao_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('ocupacao_perfil')) : ?>
								<tr>
									<td>Ocupação</td>
									<td><?php the_field('ocupacao_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('fortuna_perfil')) : ?>
								<tr>
									<td>Fortuna</td>
									<td><?php the_field('fortuna_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('conhecido_como_perfil')) : ?>
								<tr>
									<td>Conhecido como</td>
									<td><?php the_field('conhecido_como_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('estado_civil_perfil')) : ?>
								<tr>
									<td>Estado Civil</td>
									<td><?php the_field('estado_civil_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('site_oficial_perfil')) : ?>
								<tr>
									<td>Site oficial</td>
									<td>
										<a href="<?php the_field('site_oficial_perfil'); ?>" target="_blank">
											<?php the_field('site_oficial_perfil'); ?>
										</a>
									</td>
								</tr>
							<?php endif; ?>
							<?php if (have_rows('redes_sociais_perfil')) : ?>
								<tr>
									<td>Redes Sociais</td>
									<td>
										<ul class="social__list">
											<?php if (have_rows('redes_sociais_perfil')) : ?>

												<?php while (have_rows('redes_sociais_perfil')) : the_row(); ?>

													<li>
														<a href="<?php the_sub_field('link') ?>" target="_blank">
															<img src="<?php the_sub_field('imagem') ?>" alt="Icone">
														</a>
													</li>

												<?php endwhile; ?>

											<?php endif; ?>

										</ul>
									</td>
								</tr>
							<?php endif; ?>
						</table>
					</div>
				<?php endif; ?>

				<div class="perfil__title mobile__item">
					<h2>Biografia de <span><?php the_title(); ?></span></h2>
					<hr>
				</div>

				<div class="perfil__sobre">
					<h2>Quem é <?php the_title(); ?></h2>

					<?php the_field('biografia_perfil') ?>
				</div>

				<div class="perfil__newsletter">
					<?php echo do_shortcode('[newsletter_single_post_content]'); ?>
				</div>

				<div class="perfil__conteudo">
					<?php if (have_rows('sobre_perfil')) : ?>

						<?php while (have_rows('sobre_perfil')) : the_row(); ?>

							<div class="perfil__conteudo__content">
								<h2><?php the_sub_field('titulo'); ?></h2>
								<?php the_sub_field('texto'); ?>
							</div>

						<?php endwhile; ?>

					<?php endif; ?>

				</div>
				<?php if (get_field('perfis_relacionados')) : ?>
					<div class="perfil__relacionados">
						<div class="perfil__title">
							<h2>Perfis relacionados a <span><?php the_title(); ?></span></h2>
							<hr>
						</div>

						<div class="perfil__posts__relacionados">
							<div class="perfil__posts__relacionados__grid">
								<?php
								$perfis__relacionados = get_field('perfis_relacionados');
								?>
								<?php if ($perfis__relacionados) : ?>
									<?php foreach ($perfis__relacionados as $relacionado) :  ?>
										<?php setup_postdata($relacionado); ?>
										<?php
										$background_image = get_field('foto_perfil', $relacionado->ID);
										?>
										<a href="<?php the_permalink($relacionado->ID); ?>" class="perfil__posts__relacionados__item" style="background-image: url('<?php echo $background_image['url']; ?>');">
											<div class="perfil__posts__relacionados__content">
												<span>
													<?php
													$terms = get_the_terms($relacionado->ID, 'perfis_classificacao');

													echo $terms[0]->name;
													?>
												</span>
												<h3>
													<?php echo get_the_title($relacionado->ID); ?>
												</h3>
											</div>
										</a>
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if (wp_is_mobile()) : ?>
					<div class="perfil__ultimas">
						<!-- Últimas posts sobre -->
						<?php
						$posts_args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => 5,
							'tag' => get_post_field('post_name'),
							'orderby' => 'date',
						);

						$posts_items = get_posts($posts_args);

						?>
						<?php if ($posts_items) : ?>
							<div class="perfil__title">
								<h2>Últimas sobre <span><?php the_title(); ?></span></h2>
								<hr>
							</div>
							<div class="perfil__ultimas__sobre">
								<?php foreach ($posts_items as $post_item) : ?>
									<?php
									$image = get_the_post_thumbnail_url($post_item->ID);
									?>
									<a href="<?php the_permalink($post_item->ID) ?>" class="ultimas__sobre__link__wrapper">
										<div class="ultimas__sobre__item">
											<div class="ultimas__post__image">
												<img src="<?php echo $image;  ?>" alt="#">
											</div>
											<div class="ultimas__post__content">
												<span>
													<strong>
														<?php
														$category = get_the_category($post_item->ID);
														echo esc_html(mb_strtoupper($category[0]->cat_name));
														?>
													</strong>
												<h3>
													<?php echo get_the_title($post_item->ID); ?>
												</h3>
											</div>
										</div>
									</a>
								<?php endforeach; ?>
							</div>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
						<div class="perfil__newsletter">
							<?php do_shortcode('[newsletter_sidebar]'); ?>
						</div>
					</div>
				<?php endif; ?>

			</div>
			<div class="perfil__item">
				<?php if (!wp_is_mobile()) : ?>
					<div class="perfil__title">
						<h2>Perfil de <span><?php the_title(); ?></span></h2>
						<hr>
					</div>
					<div class="perfil__informacoes">
						<table>
							<?php if (get_field('nome_completo_perfil')) : ?>
								<tr>
									<td>Nome Completo</td>
									<td><?php the_field('nome_completo_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('data_de_nascimento_perfil')) : ?>
								<tr>
									<td>Nascimento</td>
									<td><?php the_field('data_de_nascimento_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('local_de_nascimento_perfil')) : ?>
								<tr>
									<td>Local de Nascimento</td>
									<td><?php the_field('local_de_nascimento_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('filhos_perfil')) : ?>
								<tr>
									<td>Filhos</td>
									<td><?php the_field('filhos_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('nacionalidade_perfil')) : ?>
								<tr>
									<td>Nacionalidade</td>
									<td><?php the_field('nacionalidade_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('formacao_perfil')) : ?>
								<tr>
									<td>Formação</td>
									<td><?php the_field('formacao_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('ocupacao_perfil')) : ?>
								<tr>
									<td>Ocupação</td>
									<td><?php the_field('ocupacao_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('fortuna_perfil')) : ?>
								<tr>
									<td>Fortuna</td>
									<td><?php the_field('fortuna_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('conhecido_como_perfil')) : ?>
								<tr>
									<td>Conhecido como</td>
									<td><?php the_field('conhecido_como_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('estado_civil_perfil')) : ?>
								<tr>
									<td>Estado Civil</td>
									<td><?php the_field('estado_civil_perfil'); ?></td>
								</tr>
							<?php endif; ?>
							<?php if (get_field('site_oficial_perfil')) : ?>
								<tr>
									<td>Site oficial</td>
									<td>
										<a href="<?php the_field('site_oficial_perfil'); ?>" target="_blank">
											<?php the_field('site_oficial_perfil'); ?>
										</a>
									</td>
								</tr>
							<?php endif; ?>
							<?php if (have_rows('redes_sociais_perfil')) : ?>
								<tr>
									<td>Redes Sociais</td>
									<td>
										<ul class="social__list">
											<?php if (have_rows('redes_sociais_perfil')) : ?>

												<?php while (have_rows('redes_sociais_perfil')) : the_row(); ?>

													<li>
														<a href="<?php the_sub_field('link') ?>" target="_blank">
															<img src="<?php the_sub_field('imagem') ?>" alt="Icone">
														</a>
													</li>

												<?php endwhile; ?>

											<?php endif; ?>

										</ul>
									</td>
								</tr>
							<?php endif; ?>
						</table>
					</div>
				<?php endif; ?>

				<?php if (!wp_is_mobile()) : ?>
					<div class="perfil__ultimas">
						<!-- Últimas posts sobre -->
						<?php
						$posts_args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => 5,
							'tag' => get_post_field('post_name'),
							'orderby' => 'date',
						);

						$posts_items = get_posts($posts_args);
						?>
						<?php if ($posts_items) : ?>
							<div class="perfil__title">
								<h2>Últimas sobre <span><?php the_title(); ?></span></h2>
								<hr>
							</div>
							<div class="perfil__ultimas__sobre">
								<?php foreach ($posts_items as $post_item) : ?>
									<?php
									$image = get_the_post_thumbnail_url($post_item->ID);
									?>
									<a href="<?php the_permalink($post_item->ID) ?>" class="ultimas__sobre__link__wrapper">
										<div class="ultimas__sobre__item">
											<div class="ultimas__post__image">
												<img src="<?php echo $image;  ?>" alt="#">
											</div>
											<div class="ultimas__post__content">
												<span>
													<strong>
														<?php
														$category = get_the_category($post_item->ID);
														echo esc_html(mb_strtoupper($category[0]->cat_name));
														?>
													</strong>
												<h3>
													<?php echo get_the_title($post_item->ID); ?>
												</h3>
											</div>
										</div>
									</a>
								<?php endforeach; ?>
							</div>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>

						<div class="perfil__newsletter">
							<?php do_shortcode('[newsletter_sidebar]'); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
