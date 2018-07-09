<?php
get_header(); ?>

    <div id="bgndVideo" class="player"
         data-property="{
        videoURL:'https://youtu.be/eiWrR-nrqDU',
        containment:'header',
        autoPlay:true,
        mute:true,
        startAt:0,
        opacity:1,
        showControls : false,
        showYTLogo: false,
        addRaster: false,
        stopMovieOnBlur: false
    }"></div>

    <div id="catalog" class="catalog wrapper clearfix" >
        <h2
                data-aos="fade-up"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
        >Что вы можете у нас заказать</h2>

        <div class="catalog-links">
            <ul class="catalog-list nav-tabs"

            >
                <?php
                global $post;
                $args = array('post_type' => 'products', 'order' => 'ASC','numberposts' => 1);
                $myposts = get_posts( $args );
                foreach( $myposts as $post ){
                    $list_cat =  get_field_object('products-cat')['choices'];
                    foreach ($list_cat as $item_cat_key=>$item_cat) {?>
                        <li class="catalog-el ">
                            <a data-toggle="tab" href="#<?=$item_cat_key?>"><?=$item_cat?></a>
                        </li>
                    <?}
                }wp_reset_postdata();?>
            </ul>
            <div class="beware-fakes">
                <p>Остерегайтесь подделок. Оригинальная бутыль 20 л только со специальной пленкой с надписью «Красногорское» на крышке бутылки.</p>
            </div>
        </div>

        <div class="catalog-slider tab-content"
        >
            <?
            foreach ($list_cat as $item_cat_key=>$item_cat) {?>

                <ul id="<?=$item_cat_key?>" class="tab-pane fade products-slider">
                    <?php
                    global $post;
                    $args = array('post_type' => 'products', 'order' => 'ASC','numberposts' => -1);
                    $myposts = get_posts( $args );
                    foreach( $myposts as $post ){
                        setup_postdata($post);?>
                        <?
                        $products_cat = get_field('products-cat');
                        if($products_cat==$item_cat_key):
                            ?>
                            <li class="product-el">
                                <div class="product-img" style="background-image: url(<?=get_field('products-img'); ?>);"></div>
                                <div class="product-title"><?the_title()?></div>
                                <div class="product-sum"><?=get_field('products-price'); ?> руб.</div>
                                <div class="product-desc"><?=get_field('products-desc'); ?></div>
                                <div class="btn-order"><a href="#" class="button-bubble" data-id="<?=$post->ID?>" data-toggle="modal" data-target="#modal-order">Заказать</a></div>
                            </li>
                        <?endif;?>
                    <?}wp_reset_postdata();?>
                </ul>

            <?}?>
        </div>
    </div>

    <div class="get-catalog wrapper clearfix"
         data-aos="fade-up"
         data-aos-easing="ease-in-out"
         data-aos-duration="1000"
         data-aos-offset="-200"
    >
        <div class="get-catalog-title">
            <p>Получить полный каталог на почту в 1 клик</p>
        </div>

        <form action="#" class="get-catalog-form clearfix">
            <input type="email" placeholder="E-mail">
            <input type="submit" value="Получить">
            <div class="form-personal">Нажимая на кнопку, вы даете <a href="#" data-toggle="modal" data-target="#modal-personal-information">согласие на обработку персональных данных</a></div>
        </form>
    </div>

    <div id="where-buy" class="where-buy" >
        <canvas id="bubble"></canvas>
        <h2
                data-aos="fade-up"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
        >Где вы можете купить</h2>
        <div id="accordion" class="where-buy-list"
             data-aos="fade-up"
             data-aos-delay="300"
             data-aos-easing="ease-in-out"
             data-aos-duration="1000"

        >
            <?php
            global $post;
            $args = array('post_type' => 'where_buy', 'order' => 'ASC','numberposts' => -1);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){
                setup_postdata($post);?>

                <div class="where-buy-title">
                    <? the_title() ?>
                </div>
                <div class="where-buy-content">
                    <? echo get_field('where-buy-text'); ?>
                </div>
            <?}wp_reset_postdata();?>
        </div>
    </div>

    <div id="about" class="about wrapper">
        <h2
                data-aos="fade-up"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
        >О нас</h2>
        <ul class="about-list about-list-slider">
            <li class="about-item"
                data-aos="fade-in"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="500"
            >
                <div class="about-img" style="background-image: url(<?=get_field('about-ico1-img', 37);?>)"></div>
                <?=get_field('about-ico1-text', 37);?>
            </li>
            <li class="about-item"
                data-aos="fade-in"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="500"
                data-aos-delay="250"
            >
                <div class="about-img" style="background-image: url(<?=get_field('about-ico2-img', 37);?>)"></div>
                <?=get_field('about-ico2-text', 37);?>
            </li>
            <li class="about-item"
                data-aos="fade-in"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="500"
                data-aos-delay="500">
                <div class="about-img" style="background-image: url(<?=get_field('about-ico3-img', 37);?>)"></div>
                <?=get_field('about-ico3-text', 37);?>
            </li>
            <li class="about-item"
                data-aos="fade-in"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="500"
                data-aos-delay="750">
                <div class="about-img" style="background-image: url(<?=get_field('about-ico4-img', 37);?>)"></div>
                <?=get_field('about-ico4-text', 37);?>
            </li>
        </ul>
    </div>

    <div class="company wrapper">

        <div class="company-left">
            <h1
                data-aos="fade-up"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="750"
            >Компания «КРАСНОГОРСКОЕ»</h1>
            <div class="company-desc"
                 data-aos="fade-up"
                 data-aos-offset="-100"
                 data-aos-easing="ease-in-out"
                 data-aos-duration="750"
                 data-aos-delay="250"
            >Зарегистрирована 17 августа 2007 года.</div>

            <div class="company-text"
                 data-aos="fade-up"
                 data-aos-offset="-100"
                 data-aos-easing="ease-in-out"
                 data-aos-duration="750"
                 data-aos-delay="500"
            >
                <?=get_field('about-desc', 37);?>
            </div>
        </div>

        <div class="company-right"
             data-aos="fade-up"
             data-aos-offset="-100"
             data-aos-easing="ease-in-out"
             data-aos-duration="750"
        >
            <div class="company-img" style="background-image: url(<?=get_field('about-img', 37);?>);"></div>
        </div>

    </div>

    <div class="certificates wrapper"
         data-aos="fade-in"
         data-aos-offset="-200"
         data-aos-easing="ease-in-out"
         data-aos-duration="1000"
    >
        <ul class="certificates-slider">
            <?php
            global $post;
            $args = array('post_type' => 'sertification', 'order' => 'ASC','numberposts' => -1);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){
                setup_postdata($post);?>
                <?foreach (get_field('sertification') as $item_sertification) {?>
                    <li class="certificates-item">
                        <a data-fancybox="certificates" href="<?=$item_sertification['url']; ?>" class="certificates-img-wrap">
                            <img src="<?print_r($item_sertification['sizes']['certificates'])?>" alt="">
                        </a>
                    </li>
                <?}?>
            <?}wp_reset_postdata();?>
        </ul>
    </div>

    <div class="production">
        <div class="bubbles"></div>
        <div class="wrapper">

            <h2
                data-aos="fade-up"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
            >Как производится наша вода</h2>
            <ul class="production-list"
                data-aos="fade-in"
                data-aos-offset="-200"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
            >
                <?php
                global $post;
                $args = array('post_type' => 'video', 'order' => 'ASC','numberposts' => 4);
                $myposts = get_posts( $args );
                foreach( $myposts as $post ){
                    setup_postdata($post);?>
                    <li class="production-element">
                        <a data-link="<?=get_field('video-link');?>" data-toggle="modal" data-target="#modal-video" href="#" class="production-img" style="background-image: url(<?=get_field('video-img');?>)"></a>
                        <p><?the_title()?></p>
                    </li>
                <?}wp_reset_postdata();?>
            </ul>

            <div class="production-desc"
                data-aos="fade-in"
                data-aos-offset="-200"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
            >
                Хотите убедиться в том, что мы действительно выполняем свою работу качественно?
            </div>
            <div class="production-desc-next"
                data-aos="fade-in"
                data-aos-offset="-200"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
            >
                Посмотрите виртуальную экскурсию по нашему производству!
            </div>

            <?php
            global $post;
            $args = array('post_type' => 'video', 'order' => 'ASC','numberposts' => 5);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){
                setup_postdata($post);?>
                <?
                if (!get_field('video-img')):?>
                    <a data-link="<?=get_field('video-link');?>" class="watch-video" data-toggle="modal" data-target="#modal-video" href="#"
                    data-aos="fade-in"
                    data-aos-offset="-200"
                    data-aos-easing="ease-in-out"
                    data-aos-duration="1000"
                    >
                        <span class="watch-video-icon"></span>
                        <span class="watch-video-text">Смотреть видео</span>
                    </a>
                <?endif;?>
            <?}wp_reset_postdata();?>



        </div>
    </div>

    <div class="cooperation">
        <div class="wrapper">
            <h2  data-aos="fade-up"
                 data-aos-offset="-100"
                 data-aos-easing="ease-in-out"
                 data-aos-duration="1000">Приглашаем к сотрудничеству</h2>
            <div
                    data-aos="fade-in"
                    data-aos-offset="-200"
                    data-aos-easing="ease-in-out"
                    data-aos-duration="1000"
                    class="cooperation-ico" style="background-image: url(<?=get_template_directory_uri();?>/img/cooperation-ico.png);"></div>
            <div
                    data-aos="fade-up"
                    data-aos-offset="-100"
                    data-aos-easing="ease-in-out"
                    data-aos-duration="750"
                    data-aos-delay="300"
                    class="cooperation-text">
                <?=get_field('cooperation-text', 84);?>
            </div>
        </div>
    </div>

    <div class="calc wrapper" id="calc">
        <h2
                data-aos="fade-up"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
        >Сколько воды необходимо выпивать каждый день</h2>

        <div  data-aos="fade-in"
                data-aos-offset="-200"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000" class="calc-form">

            <div class="calc-row">
                <p class="calc-title sex-title">Пол</p>
                <input class="sex" name="sex" type="radio" id="man" value="man" checked><label for="man">муж</label>
                <input class="sex" name="sex" type="radio" id="woman" value="woman"><label for="woman">жен</label>
            </div>

            <div class="calc-row">
                <p class="calc-title wight-title">Вес</p>
                <p class="calc-res wight-res">50 кг</p>
                <input type="text" class="weight" name="weight">
            </div>

            <div class="calc-row">
                <p class="calc-title age-title">Возраст</p>
                <p class="calc-res age-res">20 лет</p>
                <input type="text" class="age" name="age">
            </div>

            <div class="calc-row ">
                <p class="calc-title lifestyle-title row-fix-width">Образ жизни</p>
                <select class="lifestyle" name="lifestyle[lifestyleName]">
                    <option value="none">Без физической нагрузки (сидячая работа)</option>
                    <option value="3-week">Физическая нагрузка 3 раза в неделю</option>
                    <option value="5-week">Физическая нагрузка 5 раза в неделю</option>
                    <option value="daily">Ежедневная физическая нагрузка</option>
                    <option value="heavy">Тяжелая физическая работа</option>
                    <option value="daily-heavy">Ежедневная физ. нагрузка + тяжелая физ. работа</option>
                </select>
            </div>

            <div class="calc-row ">
                <p class="calc-title season-title row-fix-width">Время года</p>
                <select class="season" name="season[seasonName]">
                    <option value="spring">Весна</option>
                    <option value="summer">Лето</option>
                    <option value="fall">Осень</option>
                    <option value="winter">Зима</option>
                </select>
            </div>

        </div>

        <div  data-aos="fade-in"
                data-aos-offset="-200"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000" class="calc-bottle">
            <div class="bottle">
                <div class="water"><span>6 литров</span></div>
            </div>
        </div>

        <div  data-aos="fade-in"
                data-aos-offset="-200"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000" class="calc-info">
            <div class="min-calc-info-wrap">
                <div class="calc-info-title">Рекомендованная дневная норма:</div>
                <div class="calc-info-res"><span>6</span> литров</div>
                <div class="calc-info-desc-two min-calc-info-desc-two">*Данный расчет носит рекомендательный характер.</div>
                <div class="calc-info-desc">Одной бутылки воды вам хватит на 3 дня</div>
            </div>

            <div class="min-calc-info-wrap">
                <div class="calc-btn" data-toggle="modal" data-target="#modal-order">Заказать</div>
                <div class="calc-info-desc min-calc-info-desc">Одной бутылки воды вам хватит на 3 дня</div>
            </div>
            <div class="calc-info-desc-two">*Данный расчет носит рекомендательный характер.</div>
            <div class="calc-info-family-member">Рассчитать на еще одного члена семьи</div>
            <ul class="calc-info-family-call nav-tabs">
                <li class="vis">
                    <a data-toggle="tab" href="#1">1</a>
                </li>
                <li class="active vis">
                    <a data-toggle="tab" href="#2">2</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#3">3</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#4">4</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#5">5</a>
                </li>
                <li class="plus-tab ">
                    <a href="#">+</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="contacts" id="contacts">
        <div class="wrapper">
            <h2
                    data-aos="fade-up"
                    data-aos-offset="-100"
                    data-aos-easing="ease-in-out"
                    data-aos-duration="1000"
            >Контакты</h2>

            <div class="contacts-wrap">
                <ul class="contacts-phone"
                    data-aos="fade-in"
                    data-aos-offset="-100"
                    data-aos-easing="ease-in-out"
                    data-aos-duration="750"
                    data-aos-delay="250">
                    <?
                    $phones = get_field('contacts-phones', 12);
                    $phones = explode(";", $phones);
                    foreach ($phones as $phone):
                        ?>
                        <li><a href="tel:+<?=$phone?></a>"><?=$phone?></a></li>
                        <?
                    endforeach;
                    ?>
                </ul>
                <div class="contacts-address"
                     data-aos="fade-in"
                     data-aos-offset="-100"
                     data-aos-easing="ease-in-out"
                     data-aos-duration="750"
                     data-aos-delay="250">
                    <?=get_field('contacts-address', 12);?>
                </div>
            </div>

            <h2
                    data-aos="fade-up"
                    data-aos-offset="-100"
                    data-aos-easing="ease-in-out"
                    data-aos-duration="1000"
            >Остались вопросы</h2>


            <form action="#" class="callback"
                  data-aos="fade-in"
                  data-aos-offset="-100"
                  data-aos-easing="ease-in-out"
                  data-aos-duration="750"
                  data-aos-delay="250"
            >
                <div class="callback-desc">Заполните форму ниже, наши менеджеры перезвонят вам в ближайшее время</div>
                <input type="name" placeholder="Имя">
                <input type="phone" placeholder="Телефон">
                <input type="submit" value="Заказать звонок">
                <div class="form-personal">Нажимая на кнопку, вы даете <a href="#" data-toggle="modal" data-target="#modal-personal-information">согласие на обработку персональных данных</a></div>
            </form>
        </div>
    </div>

    <div class="reviews wrapper">
        <h2
                data-aos="fade-up"
                data-aos-offset="-100"
                data-aos-easing="ease-in-out"
                data-aos-duration="1000"
        >Отзывы о нашей работе</h2>

        <ul class="reviews-slider"

        >
            <?php
            global $post;
            $args = array('post_type' => 'reviews', 'order' => 'ASC','numberposts' => -1);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){
                setup_postdata($post);?>
                <li class="reviews-slide"
                    data-aos="fade-in"
                    data-aos-offset="-100"
                    data-aos-easing="ease-in-out"
                    data-aos-duration="750"
                    data-aos-delay="250"
                >
                    <div class="reviews-wrap">
                        <div class="reviews-photo" style="background-image: url(<?=get_field('reviews-photo');?>)"></div>
                        <div class="reviews-wrap-text">
                            <div class="reviews-name"><? the_title() ?></div>
                            <div class="reviews-text">
                                <?=get_field('reviews-text');?>
                            </div>
                        </div>
                    </div>
                </li>
            <?}wp_reset_postdata();?>
        </ul>



        <a data-toggle="modal" data-target="#modal-reviews" href="#" class="button-bubble btn-reviews">Оставить отзыв</a>
    </div>

<?php
get_footer();
