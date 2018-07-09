<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <video class="video-class" autoplay loop preload>
        <source src="<?=get_template_directory_uri();?>/video.mp4" type="video/mp4"><!-- MP4 для Safari, IE9, iPhone, iPad, Android, и Windows Phone 7 -->
    </video>
    <div class="header-top">
        <a href="/" class="logo"></a>
        <a href="#" class="burger">
            <span></span>
            <p>Меню</p>
        </a>
        <ul class="nav">
            <li><a href="#" class="burger selected max-min-menu">
                    <span></span>
                </a></li>
            <li><a href="#catalog">Каталог</a></li>
            <li><a href="#where-buy">Пункты обмена</a></li>
            <li><a href="#about">О нас</a></li>
            <li><a href="#calc">Калькулятор воды</a></li>
            <li><a href="#contacts">Контакты</a></li>
        </ul>

        <div class="phone">
            <?
            $phones = get_field('contacts-phones', 12);
            $phones = explode(";", $phones);
            ?>
            <a href="tel:+<?=$phones[0]?></a>"><?=$phones[0]?></a>

        </div>
    </div>

    <ul class="header-slider">
        <?php
        global $post;
        $args = array('post_type' => 'slider', 'order' => 'ASC','numberposts' => -1);
        $myposts = get_posts( $args );
        foreach( $myposts as $post ){
            setup_postdata($post);?>
            <li class="header-slide">
                <div class="header-slide-left" style="background-image: url(<? echo get_field('slider-img'); ?>"></div>
                <div class="header-slide-right">
                    <? echo get_field('slider-text'); ?>
                    <?echo do_shortcode("[contact-form-7 id=\"4\" title=\"Заказать звонок\" html_class=\"callback\"]");?>
<!--                    <form action="#" class="callback">-->
<!--                        <input type="name" placeholder="Имя">-->
<!--                        <input type="phone" placeholder="Телефон">-->
<!--                        <input type="submit" value="Заказать звонок">-->
<!--                        <div class="form-personal">Нажимая на кнопку, вы даете <a href="#" data-toggle="modal" data-target="#modal-personal-information">согласие на обработку персональных данных</a></div>-->
<!--                    </form>-->
                </div>
            </li>
        <?}wp_reset_postdata();?>
    </ul>



</header>

