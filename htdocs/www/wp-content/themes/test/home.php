<?php
//Template Name: Home
?>
<?php get_header(); ?>

		<nav class="menu-mobile">

			<div class="menu-mobile__content">

				<ul class="menu-mobile__links">
					<li class="menu-mobile__links-title">Меню:</li>
					<li><a class="menu-mobile__link" href="<?php echo home_url('#description') ?>">О нас</a></li>
					<li><a class="menu-mobile__link" href="<?php echo home_url('#services') ?>">Услуги</a></li>
					<li><a class="menu-mobile__link" href="<?php echo home_url('#description_places') ?>">Преимущества</a></li>
					<li><a class="menu-mobile__link" href="./works">Работы</a></li>
					<li><a class="menu-mobile__link" href="<?php echo home_url('#form-block') ?>">Как заказать?</a></li>
				</ul>

				<div class="menu-mobile__contacts">
					<p class="menu-mobile__contacts-title">Контакты:</p>
					<div class="menu-mobile__number-con">
						<img src="<?php bloginfo('template_url');?>/assets/image/footer__number-min.svg" alt="" 	class="menu-mobile__number-logo">
						<a href="tel:<?php the_field('phone-number'); ?>" class="menu-mobile__number"><?php the_field('phone'); ?></a>
					</div>
					<div class="menu-mobile__email-con">
						<img src="<?php bloginfo('template_url');?>/assets/image/footer__email-min.svg" alt="" 	class="menu-mobile__email-logo">
						<a href="mailto:<?php the_field('email'); ?>" class="menu-mobile__email"><?php the_field('email'); ?></a>
					</div>
				</div>

				<div class="menu-mobile__social">
					<p class="menu-mobile__social-title">Мы в соцсетях:</p>
					<a target="_blank"  href="<?php the_field('social__logo-link'); ?>">
						<img src="<?php the_field('social__logo_one'); ?>" alt="" 	class="menu-mobile__social-img">
					</a>
				</div>

			</div>

		</nav>

		<main class="content">

			<section class="intro"> 

				<div class="intro__content">
					<div class="intro__column">
						<h1 class="intro__title"><?php the_field('intro__title'); ?></h1>
						<h2 class="intro__subtitle"><?php the_field('intro__subtitle'); ?></h2>
						<a href="#form-block">
							<button class="intro__button">Заказать сайт</button>
						</a>
					</div>
					<img class="intro__img" src="<?php the_field('intro_img');?>">

		   	</section>

			<article id="description" class="description">

				<div class="description__background-mobil" style="background-image:url('<?php the_field("description_background-img_mobil") ?>')">
					<div class="description__contain" style="background-image:url('<?php the_field("description_background-img") ?>')">
						<div class="description__content">
							<h3 class="description__title">О нас</h3>
							<p class="description__text"><?php the_field('description__text_top'); ?></p>
							<p class="description__text"><?php the_field('description__text_bottom'); ?></p>
						</div>
					</div>
				</div>
				<div id="description_places" class="description__places-con">

					<h3 class="description__places-title">Преимущества <span class="title_mobile">работы с нами</span></h3>
					<div class="description__places">

						<div class="description__place">
							<img src="<?php the_field('description__place-img_one'); ?>" alt="Время" class="description__place-img">
							<div class="description__place-con">
								<p class="description__place-title"><?php the_field('description__place-title_one'); ?></p>
								<p class="description__place-text"><?php the_field('description__place-text_one'); ?></p>
							</div>
						</div>

						<div class="description__place description__place_reverse">
							<img src="<?php the_field('description__place-img_two'); ?>" alt="Дизайн" class="description__place-img description__place-img_reverse">
							<div class="description__place-con description__place-con_reverse">
								<p class="description__place-title description__place-title_reverse"><?php the_field('description__place-title_two'); ?></p>
								<p class="description__place-text description__place-text_reverse"><?php the_field('description__place-text_two'); ?></p>
							</div>
						</div>

						<div class="description__place">
							<img src="<?php the_field('description__place-img_three'); ?>" alt="Продвижение" class="description__place-img">
							<div class="description__place-con">
								<p class="description__place-title"><?php the_field('description__place-title_three'); ?></p>
								<p class="description__place-text"><?php the_field('description__place-text_three'); ?></p>
							</div>
						</div>

					</div>
				</div>

			</article>
			<section id="services" class="services">

				<div class="services__contain">
					<h3 class="services__title">Услуги <span class="title_mobile">нашей студии</span></h3>
					<div class="services__grid">

<?php
global $post;

$myposts = get_posts([
	'numberposts' => -1,
	'category' => 3
]);

if( $myposts ){
	foreach( $myposts as $post ){
		setup_postdata( $post );
?>

<!-- Вывод постов, функции цикла: the_title() и т.д. -->
<div style="background-image: url('<?php the_post_thumbnail_url() ?>')" class="services__card">
	<p class="services__card-title"><?php the_title(); ?></p>
	<div class="services__content">
		<div class="services__card-text"><?php the_content(); ?></div>
		<a class="services__link" href="<?php echo the_field('service-page-link'); ?>"> 
			<img src="<?php bloginfo('template_url');?>/assets/image/arrow-min.svg" alt="Подробнее" class="services__button">
		</a> 
	</div>
</div>

<?php } } wp_reset_postdata(); // Сбрасываем $post?>

					</div>
				</div>

			</section>
			
			<section class="works">

				<div class="works__contain">
					<div class="works__title-con">
						<h3 class="works__title">Работы</h3>
						<a href="./works" class="works__link">показать все проекты</a>
					</div>

					<div class="slider">
						<div class="slider__track">

<?php
global $post;

$myposts = get_posts([ 
	'numberposts' => -1,
	'category' => 4
]);

if( $myposts ){
	foreach( $myposts as $post ){
		setup_postdata( $post );
?>

<!-- Вывод постов, функции цикла: the_title() и т.д. -->
<div class="slider__card">
	<img class="slider__card-img" src="<?php the_post_thumbnail_url() ?>">
		<div class="slider__card-con">
			<div class="slider__card-content">
				<p class="slider__con-title"><?php the_title(); ?></p>
				<div class="slider__con-text"><?php the_content(); ?></div>
			</div>
		<a class="works__links" href="<?php echo the_field('works-link') ?>">
			<img src="<?php bloginfo('template_url');?>/assets/image/arrow-min.svg" 	class="slider__arrow">
		</a>
	</div>
</div>

<?php } } wp_reset_postdata(); // Сбрасываем $post?>


							

						</div>
					</div>
					<a class="works__links" href="./works">
					<button class="works__link-mobile">Показать все проекты</button>
					</a>
				</div>

			</section>

			<section id="form-block" class="form-block">

				<div class="form-block__con">
					<div class="form-block__content">
						<h3 class="form-block__title">Как заказать?</h3>
						<p class="form-block__text">Заполните форму. 	Укажите ваши пожелания по срокам и цене. Далее 	мы с вами свяжемся для составления брифа. И 	все. Готово.</p>
					</div>
					
					<?php echo do_shortcode(art_feedback()); ?>
					
				</div>

			</section>

			<section id="popap-message" class="popap-message">
			<!-- стили модального окна в services-page.css -->
				<a href="#header" class="popap-message__area"></a>
				<div class="popap-message__body">
					<div class="popap-message__content">
						<h2 class="popap-message__title">Станьте первым</h2>
						<p class="popap-message__text">Если вы читаете это сообщение, значит у вас есть возможность стать одним из первых клиентов нашей студии и извлечь из этого выгоду.</p>
						<h2 class="popap-message__title">Мы заплатим за доверие</h2>
						<p class="popap-message__text">Мы не можем представить вам примеры работ за авторством нашей молодой студии. Тем не менее все члены нашей команды обладают актуальным опытом для реализации проектов, которые предлагаются на этом сайте. И если вы доверитесь нам, мы это оценим. Оценим в 50% от стоимости проекта.</p>
					</div>
				</div>
			</section>
			</main>
<?php get_footer(); ?>