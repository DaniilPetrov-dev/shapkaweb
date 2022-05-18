<?php
//Template Name: Service
?>

<?php get_header('dark'); ?>

<nav class="menu-mobile">

			<div class="menu-mobile__content">

				<ul class="menu-mobile__links">
					<li class="menu-mobile__links-title">Меню:</li>
					<li><a class="menu-mobile__link" href="<?php echo get_home_url() ?>/#description">О нас</a></li>
					<li><a class="menu-mobile__link" href="<?php echo get_home_url() ?>/#services">Услуги</a></li>
					<li><a class="menu-mobile__link" href="<?php echo get_home_url() ?>/#description_places">Преимущества</a></li>
					<li><a class="menu-mobile__link" href="./works">Работы</a></li>
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

<main class="services-page">
	<section class="services-page__con">
		<img src="<?php the_field('services-img'); ?>" class="services-page-intro__img">
		<div class="services-page-intro">
			<div class="services-page-intro__title-con">
				<h1 class="services-page-intro__title"><?php the_field('services-title'); ?></h1>
				<p class="services-page-intro__text"><?php the_field('services-description'); ?></p>
			</div>
			<div class="services-page-intro__button-con">
				<p class="services-page-intro__content"><?php the_field('services-button-con'); ?></p>
				<a href="#form__popap">
					<button class="services-page-intro__button popap">Заказать</button>
				</a>
				
			</div>
		</div>
		<div class="services-page-main__contain">
			<h2 class="services-page-main__title"><?php the_field('services-main-title'); ?></h2>
			<p class="services-page-main__subtitle"><?php the_field('services-main-subtitle'); ?></p>
			<p class="services-page-main__text"><?php the_field('services-main-text'); ?></p>
			<p class="services-page-main__subtitle"><?php the_field('services-main-subtitle-two'); ?></p>
			<p class="services-page-main__text"><?php the_field('services-page-main__text-two'); ?></p>
		</div>

		<div class="services-page-main__slider">
				<p class="services-page-main__slider-title">Примеры работ:</p>
				<div class="services-page-main__slider-con">
					<div class="services-page-main__slider-track">

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
		</div>

	</section>

	<section id="form__popap" class="form__popap">
		<a href="#header" class="form__popap-area"></a>
		<div class="form__popap-body">
			<div class="form__popap-content">
				<?php echo do_shortcode(art_feedback()); ?>
			</div>
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