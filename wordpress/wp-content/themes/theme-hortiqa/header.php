<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>





<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php global $geniuscourses_options; ?>



	<header class="header">
		<!-- Navbar -->
		<div class="header__desktop">
			<div class="wrapper">
				<div class="header__wrapper">
					<div class="navbar">
						<div class="navbar__wrapper">
							<div class="logo">

								<?php if (function_exists('has_custom_logo')) { ?>
									<a href="<?php echo esc_url(home_url("/")); ?>"> <? the_custom_logo(); ?> </a>
								<? } ?>

							</div>




							<button class="burger">
								<div class="burger__box">
									<span></span>
								</div>
								<div class="burger__content">Catalog</div>
							</button>
						</div>
						<nav class="nav__menu">
							<ul class="menu">
								<?php
								wp_nav_menu(array(
									'theme_location'  => 'header_nav',
									'container'      => false,
									'items_wrap'     => '%3$s',
								));
								?>
							</ul>
						</nav>

						<div class="header__inner">

							<a class="header__tell" href="tel:+380631298869">
								<svg class="header__tell-icon">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/svg/tell.svg#tell"></use>
								</svg> <span>380 (63) 129-88-69</span></a>


							<div class="header__content">
								<div class="header__account account header__box">
									<svg class="user__svg">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/svg/login.svg#login"></use>
									</svg>
								</div>

								<div class="header__wishlist wishlist header__box">
									<svg class="wishlist__svg">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/svg/wishlist.svg#wishlist"></use>
									</svg>
									<span class="wishlist__number">0</span>
								</div>

								<div class="header__cart cart header__box">
									<svg class="cart__svg">

										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/svg/basket.svg#basket"></use>
									</svg>
									<span class="cart__number">0</span>
								</div>

							</div>


							<div class="header__languages languages">
								<a href="#" class="languages__link active">UA</a>
								<a href="#" class="languages__link">RU</a>
							</div>
						</div>
					</div>
				</div>

				<!-- catalog -->

				<nav class="catalog">
					<h3 class="catalog__title">Каталог товарів</h3>
					<div class="catalog_wrapper">


						<ul class="menu catalog__category catalog__category-one">

							<?php
							$categories = get_terms([
								'taxonomy'   => 'product_cat',
								'hide_empty' => false,
								'parent'     => 0,
							]);

							foreach ($categories as $category):

								$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
								$image = wp_get_attachment_url($thumbnail_id);

								$products = wc_get_products([
									'category' => [$category->slug],
									'limit'    => -1,
									'status'   => 'publish',
								]);

								if (empty($products)) {
									continue;
								}
							?>

								<li class="menu__item">

									<!-- 1 lvl: category -->
									<a class="menu__item-link" href="<?php echo esc_url(get_term_link($category)); ?>">
										<?php if ($image): ?>
											<img class="menu__item-catalog-image"
												src="<?php echo esc_url($image); ?>"
												alt="<?php echo esc_attr($category->name); ?>">
										<?php endif; ?>
										<div class="menu__item-name"><?php echo esc_html($category->name); ?></div>
										<span class="menu__arrow"></span>
									</a>

									<!-- 2 lvl: products -->
									<ul class="catalog__category catalog__category-two">

										<?php foreach ($products as $product): ?>

											<?php
											$all_terms = [];
											$attributes = $product->get_attributes();

											foreach ($attributes as $attribute) {

												if (!$attribute->is_taxonomy()) {
													continue;
												}

												$taxonomy = $attribute->get_name();

												$terms = wp_get_post_terms(
													$product->get_id(),
													$taxonomy,
													[
														'orderby' => 'term_order',
														'order'   => 'ASC',
													]
												);

												if (!empty($terms)) {
													$all_terms[$taxonomy] = $terms;
												}
											}
											?>

											<li class="menu__item">

												<a class="menu__item-link" href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
													<div class="menu__item-name"><?php echo esc_html($product->get_name()); ?></div>
													<?php if (!empty($all_terms)): ?>
														<span class="menu__arrow"></span>
													<?php endif; ?>
												</a>

												<!-- 3 lvl: attributes -->
												<?php if (!empty($all_terms)): ?>
													<ul class="catalog__category catalog__category-three">

														<?php foreach ($all_terms as $taxonomy => $terms): ?>
															<?php foreach ($terms as $term): ?>

																<li class="menu__item">
																	<a class="menu__item-link"
																		href="<?php echo esc_url(
																					add_query_arg(
																						'filter_' . wc_attribute_taxonomy_slug($taxonomy),
																						$term->slug,
																						get_term_link($category)
																					)
																				); ?>">
																		<div class="menu__item-name">
																			<?php echo esc_html($term->name); ?>
																		</div>
																	</a>
																</li>

															<?php endforeach; ?>
														<?php endforeach; ?>

													</ul>
												<?php endif; ?>

											</li>

										<?php endforeach; ?>

									</ul>

								</li>

							<?php endforeach; ?>

						</ul>



					</div>
				</nav>








			</div>
		</div>

		<div class="header__mobile">
			<div class="wrapper">
				<div class="navbar">
					<div class="header__wrapper">
						<div class="header__detals">
							<div class="logo">

								<?php if (function_exists('has_custom_logo')) { ?>
									<a href="<?php echo esc_url(home_url("/")); ?>"> <? the_custom_logo(); ?> </a>
								<? } ?>

							</div>
							<button class="burger burger__mobile-btn">
								<div class="burger__box">
									<span></span>
								</div>
								<div class="burger__content">Каталог товарів</div>
							</button>


						</div>

						<div class="header__detals">


							<div class="header__account account header__box">
								<svg class="user__svg">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/svg/login.svg#login"></use>
								</svg>
							</div>


							<div class="header__wishlist wishlist header__box">
								<svg class="wishlist__svg">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/svg/wishlist.svg#wishlist"></use>
								</svg>
								<span class="wishlist__number">0</span>
							</div>

							<div class="header__cart cart header__box">
								<svg class="cart__svg">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/svg/basket.svg#basket"></use>
								</svg>
								<span class="cart__number">0</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="burger-mobile">
			<div class="burger-mobile__box">
				<div class="logo">

					<?php if (function_exists('has_custom_logo')) { ?>
						<a href="<?php echo esc_url(home_url("/")); ?>"> <? the_custom_logo(); ?> </a>
					<? } ?>

				</div>
				<div class="burger-mobile__close">
					<?php
					echo file_get_contents(
						get_template_directory() . '/assets/img/svg/close.svg'
					);
					?>

				</div>

			</div>

			<ul class="burger-mobile__items burger-mobile__items-catalog">
				<li class="burger-mobile__item ">
					<div class="burger-mobile__content burger-mobile__table">
						<a class="burger-mobile__link"> Каталог товарів</a>

						<?php
						echo file_get_contents(
							get_template_directory() . '/assets/img/svg/arrow.svg'
						);
						?>

					</div>

					<ul class="burger-mobile__catalog-items">



			<ul class="menu catalog__category catalog__category-one">

							<?php
							$categories = get_terms([
								'taxonomy'   => 'product_cat',
								'hide_empty' => false,
								'parent'     => 0,
							]);

							foreach ($categories as $category):

								$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
								$image = wp_get_attachment_url($thumbnail_id);

								$products = wc_get_products([
									'category' => [$category->slug],
									'limit'    => -1,
									'status'   => 'publish',
								]);

								if (empty($products)) {
									continue;
								}
							?>

								<li class="menu__item menu__item-one">

									<!-- 1 lvl: category -->
									<a class="menu__item-link" href="<?php echo esc_url(get_term_link($category)); ?>">
										<?php if ($image): ?>
											<img class="menu__item-catalog-image"
												src="<?php echo esc_url($image); ?>"
												alt="<?php echo esc_attr($category->name); ?>">
										<?php endif; ?>
										<div class="menu__item-name menu__item-one-name"><?php echo esc_html($category->name); ?></div>
										<span class="menu__arrow"></span>
									</a>

									<!-- 2 lvl: products -->
									<ul class="catalog__category catalog__category-two">

										<?php foreach ($products as $product): ?>

											<?php
											$all_terms = [];
											$attributes = $product->get_attributes();

											foreach ($attributes as $attribute) {

												if (!$attribute->is_taxonomy()) {
													continue;
												}

												$taxonomy = $attribute->get_name();

												$terms = wp_get_post_terms(
													$product->get_id(),
													$taxonomy,
													[
														'orderby' => 'term_order',
														'order'   => 'ASC',
													]
												);

												if (!empty($terms)) {
													$all_terms[$taxonomy] = $terms;
												}
											}
											?>

											<li class="menu__item menu__item-two">

												<a class="menu__item-link" href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
													<div class="menu__item-name"><?php echo esc_html($product->get_name()); ?></div>
													<?php if (!empty($all_terms)): ?>
														<span class="menu__arrow"></span>
													<?php endif; ?>
												</a>

												<!-- 3 lvl: attributes -->
												<?php if (!empty($all_terms)): ?>
													<ul class="catalog__category catalog__category-three">

														<?php foreach ($all_terms as $taxonomy => $terms): ?>
															<?php foreach ($terms as $term): ?>

																<li class="menu__item menu__item-three">
																	<a class="menu__item-link"
																		href="<?php echo esc_url(
																					add_query_arg(
																						'filter_' . wc_attribute_taxonomy_slug($taxonomy),
																						$term->slug,
																						get_term_link($category)
																					)
																				); ?>">
																		<div class="menu__item-name">
																			<?php echo esc_html($term->name); ?>
																		</div>
																	</a>
																</li>

															<?php endforeach; ?>
														<?php endforeach; ?>

													</ul>
												<?php endif; ?>

											</li>

										<?php endforeach; ?>

									</ul>

								</li>

							<?php endforeach; ?>

						</ul>

					</ul>
				</li>
			</ul>
			<?php


			$locations = get_nav_menu_locations();
			$menu_id = $locations['header_nav'] ?? null;

			if ($menu_id):
				$menu_items = wp_get_nav_menu_items($menu_id);
			?>
				<ul class="burger-mobile__nav">
					<?php foreach ($menu_items as $item): ?>
						<?php if ($item->menu_item_parent == 0): ?>
							<li class="burger-mobile__item">
								<div class="burger-mobile__content">
									<a
										class="burger-mobile__link"
										href="<?php echo esc_url($item->url); ?>">
										<?php echo esc_html($item->title); ?>
									</a>
								</div>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<div class="wrapper">
				<div class="burger-mobile__wrapper">
					<a class="header__tel" href="tel:+380631298869">380 (63) 129-88-69</a>

					<div class="header__languages languages">
						<a href="#" class="languages__link active">UA</a>
						<a href="#" class="languages__link">RU</a>
					</div>
				</div>

				<div class="burger-mobile__social">
					<div class="burger-mobile__social-box">
						<a class="burger-mobile__social-link" href="#"><img
								class="burger-mobile__social-image"
								src="img/svg/telegram.png"
								alt="" /></a>
					</div>
					<div class="burger-mobile__social-box">
						<a class="burger-mobile__social-link" href="#"><img
								class="burger-mobile__social-image"
								src="img/svg/viber.png"
								alt="" /></a>
					</div>
					<div class="burger-mobile__social-box">
						<a class="burger-mobile__social-link" href="#"><img
								class="burger-mobile__social-image"
								src="img/svg/whats.png"
								alt="" /></a>
					</div>
				</div>
			</div>
		</div>
	</header>