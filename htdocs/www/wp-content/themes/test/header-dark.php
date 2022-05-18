<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="Создадим сайт любой сложности, приведем на него посетителей и превратим их в ваших клиентов.">
	<meta name="keywords" content="дизайн сайта веб-студия сделать сайты под ключ веб разработка лендинг визитка магазин шапка">
	<meta name="author" content="Веб-студия Шапка">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Шапка</title>

	<?php wp_head(); ?>
	
</head>
<body>
	<div class="page">

		<header id="header" class="header header_dark">
			<div class="header__con">
				<?php the_custom_logo(); ?>
				<ul class="header__links">
					<li><a class="header__link" href="<?php echo home_url('#description'); ?>">О нас</a></li>
					<li><a class="header__link" href="<?php echo home_url( '#services' ); ?>">Услуги</a></li>
					<li><a class="header__link" href="<?php echo home_url( '#description_places' ); ?>">Преимущества</a></li>
					<li><a class="header__link" href="./works">Работы</a></li>
					<li><a class="header__link" href="<?php echo home_url( '#form-block' ); ?>">Как заказать?</a></li>
				</ul>
				<div class="header__burger">
					<div class="header__burger-circle header__burger-circle_left"></div> 
					<div class="header__burger-circle header__burger-circle_center"></div>
					<div class="header__burger-circle header__burger-circle_right"></div>
					<!-- Стили модификаторов left center и right написаны в файле стиля элемента -->
				</div>
			</div>
		</header>