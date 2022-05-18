<?php


add_action( 'wp_enqueue_scripts', 'test_scripts' );

function test_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri().'/assets/pages/main.css' );
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-1.11.2.min.js');
	wp_enqueue_script( 'jquery' );
	// Подключаются файлы скриптов отправки обратной формы
	wp_enqueue_script( 'jquery-form' );
	wp_enqueue_script( 'feedback', get_template_directory_uri().'/assets/scripts/common.js', array('jquery'), 'null', true );
	// Задаются данные объекта ajax
	wp_localize_script(
		'feedback',
		'feedback_object',
		array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'feedback-nonce' ),
		)
	);
	wp_enqueue_script( 'cross_brws', get_template_directory_uri().'/assets/scripts/cross_brws.js', array('jquery'), 'null', false );
	wp_enqueue_script( 'show_header', get_template_directory_uri().'/assets/scripts/show_header.js', array('jquery'), 'null', false );
	wp_enqueue_script( 'menu_mobile', get_template_directory_uri().'/assets/scripts/menu_mobile.js', array('jquery'), 'null', false );
	wp_enqueue_script( 'opasity_button', get_template_directory_uri().'/assets/scripts/opasity_button.js', array('jquery'), 'null', false );
}

add_action( 'wp_ajax_feedback_action', 'ajax_action_callback' );
add_action( 'wp_ajax_nopriv_feedback_action', 'ajax_action_callback' );

function ajax_action_callback() {

	// Массив ошибок
	$err_message = array();

	// Проверяем nonce. Если проверка не прошла, то блокируем отправку
	if ( ! wp_verify_nonce( $_POST['nonce'], 'feedback-nonce' ) ) {
		wp_die( 'Данные отправлены с неправильного адреса' );
	}

	// Проверяем на спам. Если скрытое поле заполнено или снят чек, то блокируем отправку
	if ( false === $_POST['art_anticheck'] || ! empty( $_POST['art_submitted'] ) ) {
		wp_die( 'Это спам' );
	}

	// Проверяем полей имени, если пустое, то пишем сообщение в массив ошибок
	if ( empty( $_POST['art_name'] ) || ! isset( $_POST['art_name'] ) ) {
		$err_message['name'] = 'Пожалуйста, введите ваше имя.';
	} else {
		$art_name = sanitize_text_field( $_POST['art_name'] );
	}

	// Проверяем полей почты, если пустое, то пишем сообщение в массив ошибок
	if ( empty( $_POST['art_email'] ) || ! isset( $_POST['art_email'] ) ) {
		$err_message['email'] = 'Пожалуйста, введите адрес вашей электронной почты.';
	} elseif ( ! preg_match( '/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i', $_POST['art_email'] ) ) {
		$err_message['email'] = 'Адрес электронной почты некорректный.';
	} else {
		$art_email = sanitize_email( $_POST['art_email'] );

	}
	// Проверяем полей темы письма, если пустое, то пишем сообщение по умолчанию
	if ( empty( $_POST['art_number'] ) || ! isset( $_POST['art_number'] ) ) {
		$err_message['number'] = 'Пожалуйста, введите номер вашего телефона.';
	} else {
		$art_number = sanitize_text_field( $_POST['art_number'] );
	}

	// Проверяем полей сообщения, если пустое, то пишем сообщение в массив ошибок
	if ( empty( $_POST['art_comments'] ) || ! isset( $_POST['art_comments'] ) ) {
		$err_message['comments'] = 'Пожалуйста, введите ваше сообщение.';
	} else {
		$art_comments = sanitize_textarea_field( $_POST['art_comments'] );
	}

	// Проверяем массив ошибок, если не пустой, то передаем сообщение. Иначе отправляем письмо
	if ( $err_message ) {

		wp_send_json_error( $err_message );

	} else {

		// Указываем адресата
		$email_to = 'wsshapka@gmail.com';

		// Если адресат не указан, то берем данные из настроек сайта
		if ( ! $email_to ) {
			$email_to = get_option( 'admin_email' );
		}

		$body    = "Имя: $art_name \nНомер телефона: $art_number \nEmail: $art_email \n\nСообщение: $art_comments";
		$headers = 'From: ' . $art_name . ' <' . $email_to . '>' . "\r\n" . 'Reply-To: ' . $email_to;

		// Отправляем письмо
		wp_mail( $email_to, $art_number, $body, $headers );

        $message_success = 'Сообщение отправлено.';
		wp_send_json_success( $message_success );
	}

	// На всякий случай убиваем еще раз процесс ajax
	wp_die();

}

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');


# Хук ниже добавляет SVG в список разрешенных для загрузки файлов.
add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	return $mimes;
}


# Исправление MIME типа для SVG файлов.
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

#Добавление шорткода с формой обратной связи
add_shortcode( 'art_feedback', 'art_feedback' );
function art_feedback() {

	ob_start();
	?>
	<form id="add_feedback" class="form">
		<div class="form__modal">
			<p class="form__modal-text">Спасибо! Скоро мы с вами свяжемся.</p>
		</div>
		<div class="form__contain">
			<input type="text" name="art_name" id="art_name" class="form__input required" placeholder="Ваше имя" value=""/>
			<input type="Почта" name="art_email" id="art_email" class="form__input required" placeholder="Почта" value=""/>
			<input type="text" name="art_number" id="art_number" class="form__input required" placeholder="Номер телефона" value=""/>
			<textarea name="art_comments" id="art_comments" placeholder="Ваши пожелания" class="form__input form__message"></textarea>
			<input type="checkbox" name="art_anticheck" id="art_anticheck" class="art_anticheck required" style="display: none !important;" value="true" checked="checked"/>
			<input type="text" name="art_submitted" id="art_submitted" value="" style="display: none !important;"/>
		</div>
		<input type="submit" id="submit-feedback" class="form__button" value="Отправить"/>
	</form>
	<?php
	return ob_get_clean();
}

?>