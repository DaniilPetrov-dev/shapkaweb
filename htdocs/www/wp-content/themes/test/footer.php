<footer class="footer">

<img src="<?php bloginfo('template_url');?>/assets/image/shapks-logo-dark-min.svg" class="footer__logo">
<div class="footer__con">
	<ul class="footer__links">
		<li class="footer__links-title">Меню:</li>
		<li><a class="footer__link" href="<?php echo home_url('#description'); ?>">О нас</a></li>
		<li><a class="footer__link" href="<?php echo home_url( '#services' ); ?>">Услуги</a></li>
		<li><a class="footer__link" href="<?php echo home_url( '#description_places' ); ?>">Преимущества</a></li>
		<li><a class="footer__link" href="./works">Работы</a></li>
		<li><a class="footer__link" href="<?php echo home_url( '#form-block' ); ?>">Как заказать?</a></li>
	</ul>
	<div class="footer__contacts">
		<p class="footer__contacts-title">Контакты:</p>
		<div class="footer__number-con">
			<img src="<?php bloginfo('template_url');?>/assets/image/footer__number-min.svg" alt="" 	class="footer__number-logo">
			<a href="tel:<?php the_field('phone-number'); ?>" class="footer__number"><?php the_field('phone'); ?></a>
		</div>
		<div class="footer__email-con">
			<img src="<?php bloginfo('template_url');?>/assets/image/footer__email-min.svg" alt="" 	class="footer__email-logo">
			<a href="mailto:<?php the_field('email'); ?>" class="footer__email"><?php the_field('email'); ?></a>
		</div>
	</div>
	<div class="footer__social">
		<p class="footer__social-title">Мы в соцсетях:</p>
		<a target="_blank"  href="<?php the_field('social__logo-link'); ?>">
			<img src="<?php the_field('social__logo_one'); ?>" alt="" 	class="footer__social-img">
		</a>
	</div>
</div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>