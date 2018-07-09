<footer>
    <div class="wrapper">
        <ul class="footer-list">
            <li>
                <div class="site-title">©<?php echo date("Y"); ?> ООО «Красногорское»</div>
            </li>
            <li><a target="_blank" class="copyright" data-toggle="modal" data-target="#modal-copyright" href="#">Информация для правообладателей</a></li>
            <li><a target="_blank" class="copyright" data-toggle="modal" data-target="#modal-privacy-policy" href="#">Политика конфиденциальности</a></li>
            <li>
                <a class="logo-axi" rel="nofollow" title="Создание, продвижение и администрирование сайтов" target="_blank" href="https://www.web-axioma.ru">
                    <img src="<?=get_template_directory_uri();?>/img/logo-axi.png" alt="Логотип-AXI">
                </a>
            </li>
        </ul>
    </div>
</footer>



<div class="modal fade" id="modal-order" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </div>
        <div class="content-modal">

            <h3>Оформить заказ</h3>
            <div class="order-desc">
                Наш менеджер свяжется с вами в ближайшее время
            </div>

            <div class="order-list">Состав заказа</div>
            <div class="order-list-col-mobile" style="visibility: hidden;height: 0;margin: 0;">
                Минимальный заказ 1 уп. (6 шт.)
            </div>
            <div class="order-list-row order-list-name">
                <div class="order-list-col" style="visibility: hidden">
                     Минимальный заказ 1 уп. (6 шт.) 
                </div>
                <div class="order-list-col">
                    Цена
                </div>
                <div class="order-list-col">
                    Кол-во
                </div>
                <div class="order-list-col">
                    Итого
                </div>
            </div>
            <div class="order-list-row-wrap">
                <script>
                        var ordersArray = [];
                        $('.btn-order>div').on('click', function(){
                            var name = $(this).parents('.product-el').find('.product-title').text();
                            var price = $(this).parents('.product-el').find('.product-sum').text();
                            var img = $(this).parents('.product-el').find('.product-img').css('background-image');
                            var desc = $(this).parents('.product-el').find('.product-desc').text();
                            var productId = $(this).data('id');

                            ordersArray[productId] = ({
                                'name':name,
                                'price':price,
                                'img':img,
                                'desc':desc
                            });


                            $('.order-list-row-wrap').html('');

                            ordersArray.forEach(function(ordersItem, i, ordersArray) {

                                $('.order-list-row-wrap').append('<div style="display: block;height: 100%;" data-id="'+i+'" class="animated fadeInLeft order-list-row order-list-row-active">\n' +
                                    '                        <div class="order-list-title order-list-col">\n' +
                                    '                            <div class="order-list-img order-list-col" style=\'background-image: '+ordersItem['img']+';\'></div>\n' +
                                    '                            <p>'+ordersItem['name']+'</p>\n' +
                                    '                        </div>\n' +
                                    '\n' +
                                    '                        <div class="order-list-col-mobile order-list-col-mobile-inner">\n' +
                                    '                            <div class="order-list-col">\n' +
                                    '                                Цена\n' +
                                    '                            </div>\n' +
                                    '                            <div class="order-list-col">\n' +
                                    '                                Кол-во\n' +
                                    '                            </div>\n' +
                                    '                            <div class="order-list-col">\n' +
                                    '                                Итого\n' +
                                    '                            </div>\n' +
                                    '                        </div>\n' +
                                    '\n' +
                                    '                        <div class="order-list-price order-list-col">\n' +
                                    '                            '+ordersItem['price']+'\n' +
                                    '                        </div>\n' +
                                    '                        <div class="order-list-quantity order-list-col">\n' +
                                    '                            <span class="minus"></span>\n' +
                                    '                            <span class="order-list-quantity-res">1</span>\n' +
                                    '                            <span class="plus"></span>\n' +
                                    '                        </div>\n' +
                                    '                        <div class="order-list-sum order-list-col">\n' +
                                    '                           '+ordersItem['price']+'\n' +
                                    '                        </div>\n' +
                                    '                        <div class="order-list-col">\n' +
                                    '                            <div class="remove-word">Удалить</div>\n' +
                                    '                            <div class="remove">\n' +
                                    '                                <span class="top"></span>\n' +
                                    '                                <span class="middle"></span>\n' +
                                    '                                <span class="bottom"></span>\n' +
                                    '                            </div>\n' +
                                    '                        </div>\n' +

                                    '                        <div class="order-list-desc ">\n' +
                                    '                            <p>'+ordersItem['desc']+'</p>\n' +
                                    '                        </div>\n' +


                                    '                    </div>');
                            });

                            editListOrders();
                        });
                </script>
            </div>
            <div class="order-list order-list-cat">Каталог</div>
            <?php
            global $post;
            $args = array('post_type' => 'products', 'order' => 'ASC','numberposts' => -1);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){
                setup_postdata($post);?>
                   
                        <?if (get_field('products-display') == "yes"):?>
                    
                <div data-id="<?=$post->ID?>" class="order-list-row order-list-row-notactive">
                    <div class="order-list-title order-list-col">
                        <div class="order-list-img order-list-col" style="background-image: url(<? echo get_field('products-img'); ?>);"></div>
                        <p><?the_title()?></p>
                    </div>

                    <div class="order-list-col-mobile order-list-col-mobile-inner">
                        <div class="order-list-col">
                            Цена
                        </div>
                        <div class="order-list-col">
                            Кол-во
                        </div>
                        <div class="order-list-col">
                            Итого
                        </div>
                    </div>

                    <div class="order-list-price order-list-col">
                        <? echo get_field('products-price'); ?> руб
                    </div>
                    <div class="order-list-quantity order-list-col">
                        <span class="minus"></span>
                        <span class="order-list-quantity-res">1</span>
                        <span class="plus"></span>
                    </div>
                    <div class="order-list-sum order-list-col">
                        <? echo get_field('products-price'); ?> руб
                    </div>
                    <div class="order-list-col">
                        <div class="remove-word">Удалить</div>
                        <div class="remove">
                            <span class="top"></span>
                            <span class="middle"></span>
                            <span class="bottom"></span>
                        </div>
                    </div>
                    <div class="order-list-desc">
                        <p><? echo get_field('products-desc'); ?></p>
                    </div>
                </div>
            <?endif;?>
            <?}wp_reset_postdata();?>
            <div class="add-product">добавить товары</div>
        </div>
        <div class="bot-line">

            <div class="content-modal">

                <?echo do_shortcode("[contact-form-7 id=\"197\" title=\"Оформить заказ\"]");?>


<!--                <form action="">-->
<!--                    <div class="content-modal-left">-->
<!--                        <div class="datepicker-title">Выберите день и время доставки</div>-->
<!--                        <div id="datepicker" class="date">-->
<!--                            <input class="form-control my-date" type="text" readonly >-->
<!--                        </div>-->
<!--                        <input type="text" class="my-time" placeholder="Время доставки">-->
<!--                    </div>-->
<!--                    <div class="content-modal-right">-->
<!--                        <div class="datepicker-title">Оформите свой заказ</div>-->
<!--                        <input type="hidden" class="orders-list" name="orders-list" value="">-->
<!--                        <input type="text" class="my-name" placeholder="Имя">-->
<!--                        <input type="text" class="my-phone" placeholder="Телефон">-->
<!--                        <input type="text" class="my-address" placeholder="Адрес">-->
<!--                        <div class="total-sum">Итого:<span> 0 руб.</span></div>-->
<!--                        <div class="form-personal">Нажимая на кнопку, вы даете <a href="#" data-toggle="modal" data-target="#modal-personal-information">согласие на обработку персональных данных</a></div>-->
<!--                        <input type="submit" value="Оформить заказ">-->
<!--                    </div>-->
<!--                </form>-->


            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-reviews" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </div>
        <div class="content-modal">
            <h3>Оставить отзыв</h3>
            <?echo do_shortcode("[contact-form-7 id=\"222\" title=\"Оставить отзыв\"]");?>

<!--            <form action="#">-->
<!--                <input type="text" class="name" name="name" placeholder="Имя">-->
<!--                <textarea name="Text" placeholder="Текст отзыва"></textarea>-->
<!--                <div class="photo-title">Загрузить фото</div>-->
<!---->
<!--                <div class="select-photo">-->
<!--                    <input type="file" class="select-photo-input" name="ANSWER_FILE" value="">-->
<!--                    <span class="select-photo-input-button ">-->
<!--                        <span>Выберите файл</span>-->
<!--                    </span>-->
<!--                    <span class="select-photo-input-filename"></span><span class="select-photo-input-filename-title">Файл не выбран</span>-->
<!--                    <span class="select-photo-input-filesize"></span>-->
<!--                    <span class="select-photo-input-remove"></span>-->
<!--                    <span class="select-photo-input-error"></span>-->
<!--                </div>-->
<!---->
<!--                <input type="submit" class="submit" placeholder="Отправить">-->
<!--            </form>-->


        </div>
    </div>
</div>

<div class="modal fade" id="modal-video" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="content-modal">
            <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>

            <div class="modal-wrap-video" style="position:relative;height:0;padding-bottom:56.25%">
                <div class="text-block"></div>
                <iframe class="my-iframe" src="" width="640" height="360" frameborder="0" gesture="media" allow="encrypted-media" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modal-copyright" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </div>
        <div class="content-modal">
            <h3>Информация для правообладателей</h3>
            <div class="content-copyright">
                <? dynamic_sidebar( 'copyright' );?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-privacy-policy" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </div>
        <div class="content-modal">
            <h3>Политика конфиденциальности</h3>
            <div class="content-copyright">
                <? dynamic_sidebar( 'privacy-policy' );?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-personal-information" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </div>
        <div class="content-modal">
            <h3>Согласие на обработку персональных данных</h3>
            <div class="content-copyright">
                <? dynamic_sidebar( 'personal-information' );?>
            </div>
        </div>
    </div>
</div>

<div id="scroll-top"></div>






<?php wp_footer(); ?>

</body>
</html>
