<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tektonmaster
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header class="main__header">
	<div class="top__line">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-4 col-lg-4 col-md-4">
					<?php if(is_home() || is_front_page()): ?>
						<div class="logo">
							<h3>Тектонмастер</h3>
							<h4>Строительство домов под ключ с гарантией 50 лет</h4>
						</div>

					<?php else: ?>
						<div class="logo">
							<a href="<?php echo get_home_url()?>"> Тектонмастер <span>Строительство домов под ключ с гарантией 50 лет</span></a>
						</div>
					<?php endif; ?>

				</div>
				<div class="col-xl-8 col-lg-8 col-md-8 d-none d-lg-block">
                    <div class="phone_button_wrapper ">
                        <div class="phone__question">
                            <a uk-toggle="target: #modal-question" class="button__normal-accent-light">Задать вопрос архитектору</a>
                        </div>

                        <a class="button__normal-accent" href="tel:88003010169" onclick="ym(47680306, 'reachGoal', 'TOP_PHONE'); return true;">8 - 800 - 301 - 01 - 69</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="header__info">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-margin-mobile">
                    <?php wp_nav_menu([
                        'theme_location'  => 'header-menu',
                        'container'       => 'nav',
                        'container_class' => 'header__menu-wrapper',
                        'menu_class'      => 'header__menu',
                        'menu_id'         => 'header-menu',
                    ])?>
                </div>
            </div>
		</div>

	</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
