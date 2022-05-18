<?php
//Template Name: Works
?>
<?php get_header('dark'); ?>

<nav class="menu-mobile">

			<div class="menu-mobile__content">

				<ul class="menu-mobile__links">
					<li class="menu-mobile__links-title">Меню:</li>
					<li><a class="menu-mobile__link" href="<?php echo get_home_url() ?>/#description">О нас</a></li>
					<li><a class="menu-mobile__link" href="<?php echo get_home_url() ?>/#services">Услуги</a></li>
					<li><a class="menu-mobile__link" href="<?php echo get_home_url() ?>/#description_places">Преимущества</a></li>
					<li><a class="menu-mobile__link" href="#">Работы</a></li>
					<li><a class="menu-mobile__link" href="<?php echo get_home_url() ?>/#form-block">Как заказать?</a></li>
				</ul>

				<div class="menu-mobile__contacts">
					<p class="menu-mobile__contacts-title">Контакты:</p>
					<div class="menu-mobile__number-con">
						<img src="<?php bloginfo('template_url');?>/assets/image/footer__number-min.svg" alt="" 	class="menu-mobile__number-logo">
						<a href="<?php the_field('phone-number'); ?>" class="menu-mobile__number"><?php the_field('phone'); ?></a>
					</div>
					<div class="menu-mobile__email-con">
						<img src="<?php bloginfo('template_url');?>/assets/image/footer__email-min.svg" alt="" 	class="menu-mobile__email-logo">
						<a href="<?php the_field('email'); ?>" class="menu-mobile__email"><?php the_field('email'); ?></a>
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

<section class="works-page__body">

<div class="works-page__title-con">
	<h3 class="works-page__title">Работы</h3>
</div>

<div class="works-page__contain">

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
<div class="slider__card_works-page">
	 <img class="slider__card-img_works-page" src="<?php the_post_thumbnail_url() ?>">
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
<?php get_footer('dark'); ?>