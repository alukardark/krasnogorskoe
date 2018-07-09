<?php
/**
 * krasnogorsktheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package krasnogorsktheme
 */

if ( ! function_exists( 'krasnogorsktheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function krasnogorsktheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on krasnogorsktheme, use a find and replace
		 * to change 'krasnogorsktheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'krasnogorsktheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'krasnogorsktheme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'krasnogorsktheme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'krasnogorsktheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function krasnogorsktheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'krasnogorsktheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'krasnogorsktheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function krasnogorsktheme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Информация для правообладателей', 'krasnogorsktheme' ),
        'id'            => 'copyright',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Политика конфиденциальности', 'krasnogorsktheme' ),
        'id'            => 'privacy-policy',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Согласие на обработку персональных данных', 'krasnogorsktheme' ),
        'id'            => 'personal-information',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
    ) );
}
add_action( 'widgets_init', 'krasnogorsktheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function krasnogorsktheme_scripts() {
    wp_enqueue_style( 'slick-css', get_template_directory_uri().'/lib/slick/slick.css');
    wp_enqueue_style( 'slick-theme-css', get_template_directory_uri().'/lib/slick/slick-theme.css');
    wp_enqueue_style( 'aos-css', get_template_directory_uri().'/lib/aos/aos.css');
    wp_enqueue_style( 'fancybox-css', get_template_directory_uri().'/lib/fancybox/jquery.fancybox.min.css');
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/lib/bootstrap/css/bootstrap.css');
    wp_enqueue_style( 'YTPlayer-css', get_template_directory_uri().'/lib/jquery.mb.YTPlayer-3.1.5/dist/css/jquery.mb.YTPlayer.min.css');
    // wp_enqueue_style( 'YTPlayer-css', get_template_directory_uri().'/lib/jquery.mb.YTPlayer-3.0.10/dist/css/jquery.mb.YTPlayer.min.css');
    wp_enqueue_style( 'rangeSlider-css', get_template_directory_uri().'/lib/ion.rangeSlider-2.2.0/css/ion.rangeSlider.css');
    wp_enqueue_style( 'rangeSlider.skinHTML5-css', get_template_directory_uri().'/lib/ion.rangeSlider-2.2.0/css/ion.rangeSlider.skinHTML5.css');
    wp_enqueue_style( 'multiple-select-css', get_template_directory_uri().'/lib/multiple-select/multiple-select.css');
    wp_enqueue_style( 'datepicker-css', get_template_directory_uri().'/lib/bootstrap-datepicker.css');
    wp_enqueue_style( 'animate-css', get_template_directory_uri().'/lib/animate.min.css');
	wp_enqueue_style( 'krasnogorsktheme-style', get_stylesheet_uri() );


    wp_enqueue_script( 'jquery.min.js', get_template_directory_uri() . '/lib/jquery.min.js', '', '', false);
    wp_enqueue_script( 'serialize-object-js', get_template_directory_uri() . '/lib/jquery.serialize-object.js', '', '', false);
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/lib/slick/slick.min.js', '', '', false);
    wp_enqueue_script( 'maskedinput', get_template_directory_uri() . '/lib/jquery.maskedinput.min.js', '', '', false);
    wp_enqueue_script( 'cookie-js', get_template_directory_uri() . '/lib/js.cookie.js', '', '', false);
    wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/lib/aos/aos.js', '', '', false);
    wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/lib/fancybox/jquery.fancybox.min.js', '', '', false);
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js', '', '', false);
    wp_enqueue_script( 'YTPlayer-js', get_template_directory_uri() . '/lib/jquery.mb.YTPlayer-3.1.5/dist/jquery.mb.YTPlayer.min.js', '', '', false);
    // wp_enqueue_script( 'YTPlayer-js', get_template_directory_uri() . '/lib/jquery.mb.YTPlayer-3.0.10/dist/jquery.mb.YTPlayer.min.js', '', '', false);
    wp_enqueue_script( 'rangeSlider-js', get_template_directory_uri() . '/lib/ion.rangeSlider-2.2.0/js/ion-rangeSlider/ion.rangeSlider.min.js', '', '', false);
    wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/lib/jquery-ui.js', '', '', false);
    wp_enqueue_script( 'multiple-select-js', get_template_directory_uri() . '/lib/multiple-select/multiple-select.js', '', '', false);
    wp_enqueue_script( 'datepicker-js', get_template_directory_uri() . '/lib/bootstrap-datepicker.min.js', '', '', false);
    wp_enqueue_script( 'datepicker-ru-js', get_template_directory_uri() . '/lib/bootstrap-datepicker.ru.min.js', '', '', false);
    wp_enqueue_script( 'list-libs', get_template_directory_uri() . '/lib/list-libs.js', '', '', false);
    wp_enqueue_script( 'uploadedFileInfo', get_template_directory_uri() . '/lib/jquery.uploadedFileInfo.js ', '', '', false);

    wp_enqueue_script( 'common.js', get_template_directory_uri() . '/js/common.js', '', '', false);



	wp_enqueue_script( 'krasnogorsktheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'krasnogorsktheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'krasnogorsktheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'certificates', 135, 189, true );
}
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


function register_post_type_settings() {
    $labels = array(
        'name' => 'Контактные данные и прочее',
        'singular_name' => 'Контактные данные и прочее', // админ панель Добавить->Функцию
        'add_new' => 'Добавить настройки',
        'add_new_item' => 'Добавить новые настройки',
        'edit_item' => 'Редактировать настройки',
        'new_item' => 'Новые настройки',
        'all_items' => 'Все настройки',
        'view_item' => 'Просмотр настроек',
        'search_items' => 'Искать настройки',
        'not_found' =>  'Настроек не найдено.',
        'not_found_in_trash' => 'В корзине нет Настроек.',
        'menu_name' => 'Контактные данные и прочее' // ссылка в меню в админке
    );
    $args = array(
        'exclude_from_search' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-wordpress-alt', // иконка в меню
        'menu_position' => 29 // порядок в меню
    ,'supports' => array( '' )
    );
    register_post_type('settings', $args);
}

add_action( 'init', 'register_post_type_settings' ); // Использовать функцию только внутри хука init

function register_post_type_slider() {
    $labels = array(
        'name' => 'Слайдер в шапке',
        'singular_name' => 'Слайдер в шапке', // админ панель Добавить->Функцию
        'add_new' => 'Добавить слайд',
        'add_new_item' => 'Добавить новые слайд',
        'edit_item' => 'Редактировать слайд',
        'new_item' => 'Новый слайд',
        'all_items' => 'Все слайды',
        'view_item' => 'Просмотр слайда',
        'search_items' => 'Искать слайд',
        'not_found' =>  'Слайда не найдено.',
        'not_found_in_trash' => 'В корзине нет слайда.',
        'menu_name' => 'Слайдер в шапке' // ссылка в меню в админке
    );
    $args = array(
        'exclude_from_search' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-images-alt2', // иконка в меню
        'menu_position' => 29 // порядок в меню
    ,'supports' => array( 'title' )
    );
    register_post_type('slider', $args);
}

add_action( 'init', 'register_post_type_slider' ); // Использовать функцию только внутри хука init

function register_post_type_products() {
    $labels = array(
        'name' => 'Продукция',
        'singular_name' => 'Продукция', // админ панель Добавить->Функцию
        'add_new' => 'Добавить товар',
        'add_new_item' => 'Добавить новые товар',
        'edit_item' => 'Редактировать товар',
        'new_item' => 'Новый товар',
        'all_items' => 'Все товары',
        'view_item' => 'Просмотр товара',
        'search_items' => 'Искать товар',
        'not_found' =>  'Товаров не найдено.',
        'not_found_in_trash' => 'В корзине нет товара.',
        'menu_name' => 'Продукция' // ссылка в меню в админке
    );
    $args = array(
        'exclude_from_search' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-products', // иконка в меню
        'menu_position' => 29 // порядок в меню
    ,'supports' => array( 'title' )
    );
    register_post_type('products', $args);
}

add_action( 'init', 'register_post_type_products' ); // Использовать функцию только внутри хука init

function register_post_type_where_buy() {
    $labels = array(
        'name' => 'Где купить?',
        'singular_name' => 'Где купить?', // админ панель Добавить->Функцию
        'add_new' => 'Добавить блок',
        'add_new_item' => 'Добавить новый блок',
        'edit_item' => 'Редактировать блок',
        'new_item' => 'Новый блок',
        'all_items' => 'Все блоки',
        'view_item' => 'Просмотр блок',
        'search_items' => 'Искать блок',
        'not_found' =>  'Блоков не найдено.',
        'not_found_in_trash' => 'В корзине нет блоков.',
        'menu_name' => 'Где купить?' // ссылка в меню в админке
    );
    $args = array(
        'exclude_from_search' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-cart', // иконка в меню
        'menu_position' => 29 // порядок в меню
    ,'supports' => array( 'title' )
    );
    register_post_type('where_buy', $args);
}

add_action( 'init', 'register_post_type_where_buy' ); // Использовать функцию только внутри хука init


function register_post_type_about() {
    $labels = array(
        'name' => 'О нас',
        'singular_name' => 'О нас', // админ панель Добавить->Функцию
        'add_new' => 'Добавить блок',
        'add_new_item' => 'Добавить новый блок',
        'edit_item' => 'Редактировать блок',
        'new_item' => 'Новый блок',
        'all_items' => 'Все блоки',
        'view_item' => 'Просмотр блок',
        'search_items' => 'Искать блок',
        'not_found' =>  'Блоков не найдено.',
        'not_found_in_trash' => 'В корзине нет блоков.',
        'menu_name' => 'О нас' // ссылка в меню в админке
    );
    $args = array(
        'exclude_from_search' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-format-quote', // иконка в меню
        'menu_position' => 29 // порядок в меню
    ,'supports' => array( '' )
    );
    register_post_type('about', $args);
}

add_action( 'init', 'register_post_type_about' ); // Использовать функцию только внутри хука init

function register_post_type_sertification() {
    $labels = array(
        'name' => 'Сертификаты',
        'singular_name' => 'Сертификаты', // админ панель Добавить->Функцию
        'add_new' => 'Добавить сертификат',
        'add_new_item' => 'Добавить новый сертификат',
        'edit_item' => 'Редактировать сертификат',
        'new_item' => 'Новый сертификат',
        'all_items' => 'Все сертификаты',
        'view_item' => 'Просмотреть сертификат',
        'search_items' => 'Искать сертификаты',
        'not_found' =>  'Сертификатов не найдено.',
        'not_found_in_trash' => 'В корзине нет сертификатов.',
        'menu_name' => 'Сертификаты' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-clipboard', // иконка в меню
        'menu_position' => 29 // порядок в меню
    ,'supports' => array('')
    );
    register_post_type('sertification', $args);
}

add_action( 'init', 'register_post_type_sertification' ); // Использовать функцию только внутри хука init

function register_post_type_video() {
    $labels = array(
        'name' => 'Как производится наша вода',
        'singular_name' => 'Как производится наша вода', // админ панель Добавить->Функцию
        'add_new' => 'Добавить блок',
        'add_new_item' => 'Добавить новый блок',
        'edit_item' => 'Редактировать блок',
        'new_item' => 'Новый блок',
        'all_items' => 'Все блоки',
        'view_item' => 'Просмотреть блок',
        'search_items' => 'Искать блок',
        'not_found' =>  'Блоков не найдено.',
        'not_found_in_trash' => 'В корзине нет блоков.',
        'menu_name' => 'Как производится наша вода' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-video-alt3', // иконка в меню
        'menu_position' => 29 // порядок в меню
    ,'supports' => array('title')
    );
    register_post_type('video', $args);
}

add_action( 'init', 'register_post_type_video' ); // Использовать функцию только внутри хука init

function register_post_type_cooperation() {
    $labels = array(
        'name' => 'Приглашаем к сотрудничеству',
        'singular_name' => 'Приглашаем к сотрудничеству', // админ панель Добавить->Функцию
        'add_new' => 'Добавить блок',
        'add_new_item' => 'Добавить новый блок',
        'edit_item' => 'Редактировать блок',
        'new_item' => 'Новый блок',
        'all_items' => 'Все блоки',
        'view_item' => 'Просмотреть блок',
        'search_items' => 'Искать блок',
        'not_found' =>  'Блоков не найдено.',
        'not_found_in_trash' => 'В корзине нет блоков.',
        'menu_name' => 'Приглашаем к сотрудничеству' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-groups', // иконка в меню
        'menu_position' => 29 // порядок в меню
    ,'supports' => array('')
    );
    register_post_type('cooperation', $args);
}

add_action( 'init', 'register_post_type_cooperation' ); // Использовать функцию только внутри хука init

function register_post_type_reviews() {
    $labels = array(
        'name' => 'Отзывы',
        'singular_name' => 'Отзывы', // админ панель Добавить->Функцию
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавить новый отзыв',
        'edit_item' => 'Редактировать отзыв',
        'new_item' => 'Новый отзыв',
        'all_items' => 'Все отзывы',
        'view_item' => 'Просмотреть отзыв',
        'search_items' => 'Искать отзывы',
        'not_found' =>  'Отзывов не найдено.',
        'not_found_in_trash' => 'В корзине нет отзывов.',
        'menu_name' => 'Отзывы' // ссылка в меню в админке
    );
    $args = array(
        'rewrite' => array( 'slug'=>'about-company/reviews', 'with_front' => false ),
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_icon' => 'dashicons-format-status', // иконка в меню
        'menu_position' => 30 // порядок в меню
    ,'supports' => array('title')
    );
    register_post_type('reviews', $args);
}

add_action( 'init', 'register_post_type_reviews' ); // Использовать функцию только внутри хука init

function IE(){
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (stripos($user_agent, 'MSIE 6.0') !== false) {
        header("Location: /ie67/ie6.html");
        exit;
    }
    if (stripos($user_agent, 'MSIE 7.0') !== false) {
        header("Location: /ie67/ie7.html");
        exit;
    }
    if (stripos($user_agent, 'MSIE 8.0') !== false) {
        header("Location: /ie67/ie8.html");
        exit;
    }
    if (stripos($user_agent, 'MSIE 9.0') !== false) {
        header("Location: /ie67/ie9.html");
        exit;
    }
}
IE();