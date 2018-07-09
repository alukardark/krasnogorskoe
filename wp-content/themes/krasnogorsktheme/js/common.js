var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

jQuery(document).ready(function($) {



    var $bubbles = $('.bubbles');
    function bubbles() {

        // Settings
        var min_bubble_count = 20, // Minimum number of bubbles
            max_bubble_count = 60, // Maximum number of bubbles
            min_bubble_size = 9, // Smallest possible bubble diameter (px)
            max_bubble_size = 35; // Maximum bubble blur amount (px)

        // Calculate a random number of bubbles based on our min/max
        var bubbleCount = min_bubble_count + Math.floor(Math.random() * (max_bubble_count + 1));

        // Create the bubbles
        for (var i = 0; i < bubbleCount; i++) {
            $bubbles.append('<div class="bubble-container"><div class="bubble"></div></div>');
        }

        // Now randomise the various bubble elements
        $bubbles.find('.bubble-container').each(function(){

            // Randomise the bubble positions (0 - 100%)
            var pos_rand = Math.floor(Math.random() * 101);

            // Randomise their size
            var size_rand = min_bubble_size + Math.floor(Math.random() * (max_bubble_size + 1));

            // Randomise the time they start rising (0-15s)
            var delay_rand = Math.floor(Math.random() * 16);

            // Randomise their speed (3-8s)
            var speed_rand = 3 + Math.floor(Math.random() * 9);

            // Random blur
            var blur_rand = Math.floor(Math.random() * 3);

            // Cache the this selector
            var $this = $(this);

            // Apply the new styles
            $this.css({
                'left' : pos_rand + '%',

                '-webkit-animation-duration' : speed_rand + 's',
                '-moz-animation-duration' : speed_rand + 's',
                '-ms-animation-duration' : speed_rand + 's',
                'animation-duration' : speed_rand + 's',

                '-webkit-animation-delay' : delay_rand + 's',
                '-moz-animation-delay' : delay_rand + 's',
                '-ms-animation-delay' : delay_rand + 's',
                'animation-delay' : delay_rand + 's',

                '-webkit-filter' : 'blur(' + blur_rand  + 'px)',
                '-moz-filter' : 'blur(' + blur_rand  + 'px)',
                '-ms-filter' : 'blur(' + blur_rand  + 'px)',
                'filter' : 'blur(' + blur_rand  + 'px)',
            });

            $this.children('.bubble').css({
                'width' : size_rand + 'px',
                'height' : size_rand + 'px'
            });

        });
    }
    if(!isMobile){
        bubbles();
    }

    $('#datepicker').datepicker({
        format: 'dd.mm.yyyy',
        language: 'ru',
        startDate: new Date()
    });

    
  if(isMobile){
        $('.order-list-row-notactive').css({'transition':'none'})
        $('#animate-css-css').remove();
        $('header .video-class').remove();
    }

    // $(window).on('load', function() {
      
    // });

    $('#scroll-top').click(function(e){
        $('html,body').animate({scrollTop: 0}, 'slow');
        return false;
    });
    if($(window).scrollTop()<750){
            $('#scroll-top').css('opacity', '0');
            $('#scroll-top').css('visibility', 'hidden');
    }else{
            $('#scroll-top').css('opacity', '1');
            $('#scroll-top').css('visibility', 'visible');
    }

    $(window).on('scroll resize orienationchange', function() {

        //Вверху - скрываем кнопку scrollTop
        var wScroll = $(this).scrollTop();
        if(wScroll<750){
            $('#scroll-top').css('opacity', '0');
            $('#scroll-top').css('visibility', 'hidden');
        }else{
            $('#scroll-top').css('opacity', '1');
            $('#scroll-top').css('visibility', 'visible');
        }
    });
   
    

    $('.header-slider').slick({
        dots: true,
        swipe: false,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    swipe: true,
                }
            }
        ]

    });

    setTimeout(function(){
        $('body').css({
            'opacity':'1',
            'visibility':'visible',
        });
    },100);
    AOS.init();
    setTimeout(function() {
        $('.header-slider').css({
            'opacity':'1',
            'visibility':'visible',
        });
    }, 100);

    $('.certificates-slider').slick({
        dots: false,
        swipe: false,
        slidesToShow: 7,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1601,
                settings: {
                    slidesToShow: 6,
                }
            },
            {
                breakpoint: 1201,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 993,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    swipe: true,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 577,
                settings: {
                    swipe: true,
                    slidesToShow: 1,
                }
            }
        ]

    });
    setTimeout(function() {
        $('.certificates-slider').css({
            'opacity':'1',
            'visibility':'visible',
        });
    }, 100);



    $('.products-slider').slick({
        dots: false,
        swipe: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1601,
                settings: {
                    slidesToShow: 2,
                }
            }, {
                breakpoint: 993,
                settings: {
                    slidesToShow: 1,
                }
            },{
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    swipe: true
                }
            }
        ]
    });
    setTimeout(function() {
        $('.catalog-slider').css({
            'opacity':'1',
            'visibility':'visible',
        });
    }, 100);



    $('.reviews-slider').slick({
        dots: false,
        swipe: false,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    swipe: true,
                }
            }
        ]
    });
    setTimeout(function() {
        $('.reviews-slider').css({
            'opacity':'1',
            'visibility':'visible',
        });
    }, 100);

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        e.target // newly activated tab
        e.relatedTarget // previous active tab
        $('.products-slider').slick('setPosition');
    });


    $( "#accordion" ).accordion({
        heightStyle: "content",
        collapsible: true,
        active: false,
        activate: function( event, ui ) {
            AOS.refresh();
        }
        
    });



    $('.about-list-slider').slick({
        dots: false,
        swipe: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                }
            }, {
                breakpoint: 577,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });



    if(!isMobile){
        bubble();
    }



    $('.production a.watch-video').click(function(){
        $('#modal-video').on('hidden.bs.modal', function () {
            $('#modal-video').find('iframe').attr('src', '');
        });
        $('#modal-video').find('.text-block').hide();
        $('.modal-wrap-video').css({'position':'relative','height':0, 'padding-bottom':'56.25%', 'background':'rgba(0,0,0,0)'});
        $('#modal-video').find('iframe').show().attr('src', 'https://www.youtube.com/embed/SNE2oCZH_4k?rel=0&autoplay=1&amp;showinfo=0?ecver=2');
    });

    $('.production a.production-img').click(function(){
        var $text = $(this).data('text');
        $('#modal-video').on('hidden.bs.modal', function () {
            $('#modal-video').find('iframe').attr('src', '');
        });
        $('.modal-wrap-video').css({'position':'static','height':'auto', 'padding-bottom':'0', 'background':'#fff'});
        $('#modal-video').find('iframe').hide();
        $('#modal-video').find('.text-block').show().html($text);
    });




    $('#modal-video.modal').on('shown.bs.modal', function () {
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var div = $(".modal .content-modal iframe"); // тут указываем ID элемента
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0) { // и не по его дочерним элементам
                $('#modal-video.modal .modal__close').click();
            }
        });
    });


    $('.burger').on('click', function(e){
        if(window.matchMedia('(min-width: 769px)').matches){
            e.preventDefault();
            $(this).toggleClass("selected");
            $('header .header-top .burger p').toggleClass('min-menu');
            $('header .header-top .phone').toggleClass('min-menu');
            $('header .header-top .nav').toggleClass('min-menu');
        }
    });

    $('.burger, .mini-burger').on('click', function(e){
        if(window.matchMedia('(max-width: 768px)').matches){
            e.preventDefault();
            $('header .header-top .nav').toggleClass('max-min-menu');
        }

    });


    $(document).on("scroll", onScroll);

    $('header .nav a[href^="#"]:not(.burger)').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        $('a').each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');

        var target = this.hash,
            menu = target,
            $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            //window.location.hash = target;
            $(document).on("scroll", onScroll);
        });

        $('.nav.max-min-menu').removeClass('max-min-menu');
    });

    function onScroll(event){
        var scrollPos = $(document).scrollTop();
        $('#menu-center a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('#menu-center ul li a').removeClass("active");
                currLink.addClass("active");
            }
            else{
                currLink.removeClass("active");
            }
        });
    }




    function Rescoefficient() {
        var coefficients={
            "sex":{
                'man':'0.035',
                'woman':'0.03'
            },
            "age":{
                '1-5':'0.25',
                '6-12':'0.6',
                '13-18':'1',
                '19-30':'1',
                '31-50':'0.9',
                '51-80':'0.8'
            },
            "lifestyle":{
                'none':'0.9',
                '3-week':'1.1',
                '5-week':'1.25',
                'daily':'1.35',
                'heavy':'1.5',
                'daily-heavy':'1.7'
            },
            "season":{
                'spring':'1',
                'summer':'1.15',
                'fall':'1',
                'winter':'0.8'
            }
        };

        var $bottle = {
            'sex': $(".sex:checked").val(),
            'age': $(".age").val(),
            'weight': $(".weight").val(),
            'lifestyle': $(".lifestyle").val(),
            'season': $(".season").val()
        };

        var $age = $bottle['age'];
        var $ageCoefficients="";
        if($age<=5){
            $ageCoefficients = 0.25;
        }else if($age>=6 && $age<=12){
            $ageCoefficients = 0.6;
        }else if($age>=13 && $age<=18){
            $ageCoefficients = 1;
        }else if($age>=19 && $age<=30){
            $ageCoefficients = 1;
        }else if($age>=31 && $age<=50){
            $ageCoefficients = 0.9;
        }else if($age>=51){
            $ageCoefficients = 0.8;
        }

        var coefficientsRes =
            $bottle['weight']
            *
            $ageCoefficients
            *
            coefficients["sex"][$bottle['sex']]
            *
            coefficients["lifestyle"][$bottle['lifestyle']]
            *
            coefficients["season"][$bottle['season']]
        ;
        $('.calc-info-res span').text(coefficientsRes.toFixed(1));
        $('.water span').text(coefficientsRes.toFixed(1)+" литров");
        $('.calc-info-desc span').text( (18.9/coefficientsRes.toFixed(1)).toFixed(0) );

        var resAmountWater = coefficientsRes.toFixed(2);
        // var maxAmountWater = 2920;
        var maxAmountWater = 8200;
        var maxHeightWater = 350;
        var minHeightWater = 50;

        var resHeightWater = maxAmountWater/(maxHeightWater-minHeightWater)/1000;
        resHeightWater = resHeightWater.toFixed(2);
        resHeightWater = resAmountWater/resHeightWater+minHeightWater;

        $('.calc .calc-bottle .bottle .water').css({
            'height': resHeightWater+'px'
        });
    }


    $(".weight").ionRangeSlider({
        "min":0,
        "max":120,
        "from":50,
        "step":10,
        "grid":true,
        "grid_num":12,
        "hide_min_max":true,

        onStart: function (data) {
            $('.wight-res').text(data['from_pretty']+" кг");
        },
        onChange: function (data) {
            $('.wight-res').text(data['from_pretty']+" кг");
            Rescoefficient();
        },
        onFinish: function (data) {
            $('.wight-res').text(data['from_pretty']+" кг");
        },
        onUpdate: function (data) {
            $('.wight-res').text(data['from_pretty']+" кг");
        }

    });




    $(".age").ionRangeSlider({
        "min":0,
        "max":100,
        "from":30,
        "step":10,
        "grid":true,
        "grid_num":10,
        "hide_min_max":true,
        onStart: function (data) {
            $('.age-res').text(data['from_pretty']+" лет");
        },
        onChange: function (data) {
            $('.age-res').text(data['from_pretty']+" лет");
            Rescoefficient();
        },
        onFinish: function (data) {
            $('.age-res').text(data['from_pretty']+" лет");
        },
        onUpdate: function (data) {
            $('.age-res').text(data['from_pretty']+" лет");
        }
    });
    $('select.season, select.lifestyle').multipleSelect({
        placeholder: "Время года",
        allSelected: false,
        selectAllText: 'Выбрать все',
        selectAll: false,
        single: true,
        selectAllDelimiter: ['',''],
        countSelected: '|# of % selected|',
        ellipsis: true,
        maxHeight: '',
         width: '64%'
    });
    Rescoefficient();
    Cookies.set('bottle_1', '');
    Cookies.set('bottle_2', '');
    Cookies.set('bottle_3', '');
    Cookies.set('bottle_4', '');
    Cookies.set('bottle_5', '');

    $('input.sex, .ms-parent.lifestyle, .ms-parent.season').on('click', function(){
        Rescoefficient();
    });


    $(".calc-info-family-call li:not('.plus-tab') a").on('click', function(e){
        e.preventDefault();
        var $num = parseInt($(".calc li.active").text());
        var $bottle = {
            'sex': $(".sex:checked").val(),
            'age': $(".age").val(),
            'weight': $(".weight").val(),
            'lifestyle': $(".lifestyle").val(),
            'season': $(".season").val()
        };
        Cookies.set('bottle_'+$num, JSON.stringify($bottle));
        $num = parseInt($(this).parent('li').text());

        if(Cookies.get('bottle_'+$num)){
            $bottle = JSON.parse(Cookies.get('bottle_'+$num));
        }else{
            $bottle = {
                'sex': 'man',
                'age': 30,
                'weight': 50,
                'lifestyle': 'none',
                'season': 'spring'
            };
        }

        $(".weight").data("ionRangeSlider").update({
            "from":$bottle['weight']
        });
        $(".age").data("ionRangeSlider").update({
            "from":$bottle['age']
        });
        $("#"+$bottle['sex']).click();
        $("select.lifestyle").val($bottle['lifestyle']).multipleSelect('refresh');
        $("select.season").val($bottle['season']).multipleSelect('refresh');

        Rescoefficient();

        $('.irs-bar').css('transition', 'none');
        setTimeout(function(){
            $('.irs-bar').css('transition', '.1s ease-in-out all');
        },300)


    });


    $('.calc-info-family-call li.plus-tab').on('click', function(e){
        e.preventDefault();
        $('.calc-info-family-call .vis').last().next('li').addClass('vis');
        if($('.calc-info-family-call li.vis').length==5){
            $('.calc-info-family-call li.plus-tab').css('display', 'none');
        }
    });


    $(window).on('load resize orienationchange', function() {
        $('.logo+.burger').removeClass('selected');
        $('header .header-top .burger p').removeClass('min-menu');
        $('header .header-top .phone').removeClass('min-menu');
        $('header .header-top .nav').removeClass('min-menu');

        if(!isMobile){
            $('header .header-top .nav').removeClass('max-min-menu');
        }
    });

    function bubble(){
        "use strict";
        var lava0;
        var ge1doot = {
            screen: {
                elem:     4,
                callback: null,
                ctx:      null,
                width:    0,
                height:   0,
                left:     0,
                top:      0,
                init: function (id, callback, initRes) {
                    this.elem = document.getElementById(id);
                    this.callback = callback || null;
                    if (this.elem.tagName == "CANVAS") this.ctx = this.elem.getContext("2d");
                    window.addEventListener('resize', function () {
                        this.resize();
                    }.bind(this), false);
                    this.elem.onselectstart = function () { return false; }
                    this.elem.ondrag        = function () { return false; }
                    initRes && this.resize();
                    return this;
                },
                resize: function () {
                    var o = this.elem;
                    this.width  = o.offsetWidth;
                    this.height = o.offsetHeight;
                    for (this.left = 0, this.top = 0; o != null; o = o.offsetParent) {
                        this.left += o.offsetLeft;
                        this.top  += o.offsetTop;
                    }
                    if (this.ctx) {
                        this.elem.width  = this.width;
                        this.elem.height = this.height;
                    }
                    this.callback && this.callback();
                }
            }
        }

        // Point constructor
        var Point = function(x, y) {
            this.x = x;
            this.y = y;
            this.magnitude = x * x + y * y;
            this.computed = 0;
            this.force = 0;
        };
        Point.prototype.add = function(p) {
            return new Point(this.x + p.x, this.y + p.y);
        };

        // Ball constructor
        var Ball = function(parent) {
            var min = .1;
            var max = 1.5;
            this.vel = new Point(
                (Math.random() > 0.5 ? 1 : -1) * (0.2 + Math.random() * 0.25), (Math.random() > 0.5 ? 1 : -1) * (0.2 + Math.random())
            );
            this.pos = new Point(
                parent.width * 0.2 + Math.random() * parent.width * 0.6,
                parent.height * 0.2 + Math.random() * parent.height * 0.6
            );
            // this.size = (parent.wh / 15) + ( Math.random() * (max - min) + min ) * (parent.wh / 15);
            this.size = (parent.wh / 15) + ( Math.random() * (max - min) + min ) * (parent.wh / 50);
            this.width = parent.width;
            this.height = parent.height;
        };

        // move balls
        Ball.prototype.move = function() {

            // bounce borders
            if (this.pos.x >= this.width - this.size) {
                if (this.vel.x > 0) this.vel.x = -this.vel.x;
                this.pos.x = this.width - this.size;
            } else if (this.pos.x <= this.size) {
                if (this.vel.x < 0) this.vel.x = -this.vel.x;
                this.pos.x = this.size;
            }

            if (this.pos.y >= this.height - this.size) {
                if (this.vel.y > 0) this.vel.y = -this.vel.y;
                this.pos.y = this.height - this.size;
            } else if (this.pos.y <= this.size) {
                if (this.vel.y < 0) this.vel.y = -this.vel.y;
                this.pos.y = this.size;
            }

            // velocity
            this.pos = this.pos.add(this.vel);

        };

        // lavalamp constructor
        var LavaLamp = function(width, height, numBalls, c0, c1) {
            this.step = 5;
            this.width = width;
            this.height = height;
            this.wh = Math.min(width, height);
            this.sx = Math.floor(this.width / this.step);
            this.sy = Math.floor(this.height / this.step);
            this.paint = false;
            this.metaFill = createRadialGradient(width, height, width, c0, c1);
            this.plx = [0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0];
            this.ply = [0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1, 0, 1];
            this.mscases = [0, 3, 0, 3, 1, 3, 0, 3, 2, 2, 0, 2, 1, 1, 0];
            this.ix = [1, 0, -1, 0, 0, 1, 0, -1, -1, 0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1];
            this.grid = [];
            this.balls = [];
            this.iter = 0;
            this.sign = 1;

            // init grid
            for (var i = 0; i < (this.sx + 2) * (this.sy + 2); i++) {
                this.grid[i] = new Point(
                    (i % (this.sx + 2)) * this.step, (Math.floor(i / (this.sx + 2))) * this.step
                )
            }

            // create metaballs
            for (var k = 0; k < numBalls; k++) {
                this.balls[k] = new Ball(this);
            }
        };
        // compute cell force
        LavaLamp.prototype.computeForce = function(x, y, idx) {

            var force;
            var id = idx || x + y * (this.sx + 2);

            if (x === 0 || y === 0 || x === this.sx || y === this.sy) {
                force = 0.6 * this.sign;
            } else {
                force = 0;
                var cell = this.grid[id];
                var i = 0;
                var ball;
                while (ball = this.balls[i++]) {
                    force += ball.size * ball.size / (-2 * cell.x * ball.pos.x - 2 * cell.y * ball.pos.y + ball.pos.magnitude + cell.magnitude);
                }
                force *= this.sign
            }
            this.grid[id].force = force;
            return force;
        };
        // compute cell
        LavaLamp.prototype.marchingSquares = function(next) {
            var x = next[0];
            var y = next[1];
            var pdir = next[2];
            var id = x + y * (this.sx + 2);
            if (this.grid[id].computed === this.iter) {
                return false;
            }
            var dir, mscase = 0;

            // neighbors force
            for (var i = 0; i < 4; i++) {
                var idn = (x + this.ix[i + 12]) + (y + this.ix[i + 16]) * (this.sx + 2);
                var force = this.grid[idn].force;
                if ((force > 0 && this.sign < 0) || (force < 0 && this.sign > 0) || !force) {
                    // compute force if not in buffer
                    force = this.computeForce(
                        x + this.ix[i + 12],
                        y + this.ix[i + 16],
                        idn
                    );
                }
                if (Math.abs(force) > 1) mscase += Math.pow(2, i);
            }
            if (mscase === 15) {
                // inside
                return [x, y - 1, false];
            } else {
                // ambiguous cases
                if (mscase === 5) dir = (pdir === 2) ? 3 : 1;
                else if (mscase === 10) dir = (pdir === 3) ? 0 : 2;
                else {
                    // lookup
                    dir = this.mscases[mscase];
                    this.grid[id].computed = this.iter;
                }
                // draw line
                var ix = this.step / (
                    Math.abs(Math.abs(this.grid[(x + this.plx[4 * dir + 2]) + (y + this.ply[4 * dir + 2]) * (this.sx + 2)].force) - 1) /
                    Math.abs(Math.abs(this.grid[(x + this.plx[4 * dir + 3]) + (y + this.ply[4 * dir + 3]) * (this.sx + 2)].force) - 1) + 1
                );
                ctx.lineTo(
                    this.grid[(x + this.plx[4 * dir]) + (y + this.ply[4 * dir]) * (this.sx + 2)].x + this.ix[dir] * ix,
                    this.grid[(x + this.plx[4 * dir + 1]) + (y + this.ply[4 * dir + 1]) * (this.sx + 2)].y + this.ix[dir + 4] * ix
                );
                this.paint = true;
                // next
                return [
                    x + this.ix[dir + 4],
                    y + this.ix[dir + 8],
                    dir
                ];
            }
        };

        LavaLamp.prototype.renderMetaballs = function() {
            var i = 0, ball;
            while (ball = this.balls[i++]) ball.move();
            // reset grid
            this.iter++;
            this.sign = -this.sign;
            this.paint = false;
            ctx.fillStyle = this.metaFill;
            ctx.beginPath();
            // compute metaballs
            i = 0;
            //ctx.shadowBlur = 50;
            //ctx.shadowColor = "green";
            while (ball = this.balls[i++]) {
                // first cell
                var next = [
                    Math.round(ball.pos.x / this.step),
                    Math.round(ball.pos.y / this.step), false
                ];
                // marching squares
                do {
                    next = this.marchingSquares(next);
                } while (next);
                // fill and close path
                if (this.paint) {
                    ctx.fill();
                    ctx.closePath();
                    ctx.beginPath();
                    this.paint = false;
                }
            }
        };

        // gradients
        var createRadialGradient = function(w, h, r, c0, c1) {
            var gradient = ctx.createRadialGradient(
                w / 1, h / 1, 0,
                w / 1, h / 1, r
            );
            gradient.addColorStop(0, c0);
            gradient.addColorStop(1, c1);
            return gradient;
        };

        // main loop
        var run = function() {
            requestAnimationFrame(run);
            ctx.clearRect(0, 0, screen.width, screen.height);
            lava0.renderMetaballs();
        };
        // canvas
        var screen = ge1doot.screen.init("bubble", null, true),
            ctx = screen.ctx;
        screen.resize();
        // create LavaLamps
        lava0 = new LavaLamp(screen.width, screen.height, 6, "#5fcdff", "#c6fbff");

        run();
    }
    function resizedw(){
        if(!isMobile){
            bubble();
        }
        

        setTimeout(function(){
            $('#bubble').css({
                'opacity': 1,
            });
        },500);

    }
    var doit;
    window.onresize = function(){
        clearTimeout(doit);
        doit = setTimeout(resizedw, 2000);
    };
    $(window).resize(function(){
        $('#bubble').css({
            'opacity': 0
        });
    });


    $('.catalog-slider>ul.tab-pane').eq(0).addClass('in active');
    $('.catalog-el').eq(0).addClass('active');



    $('#modal-personal-information .close.modal__close').click(function(){
        if($('#modal-order').hasClass('in') || $('#modal-reviews').hasClass('in')){
            setTimeout(function(){
                console.log('!!!!');
                $('body').addClass('modal-open');
            },500);
        }
    });





});

function addListOrders(){

    var resOrders = '';
    var name = $('.order-list-title p');
    var price = $('.order-list-price');
    var qnt = $('.order-list-quantity-res');
    var totalPrice = $('.order-list-sum');
    var thisPrice = 0;
    $('.order-list-row-active').each(function(){
        resOrders += $(this).find(name).text();
        resOrders += "("+$(this).find(price).text().replace(/\s+/g,'')+")";
        resOrders += " "+$(this).find(qnt).text()+"шт";
        resOrders += "-"+$(this).find(totalPrice).text().replace(/\s+/g,'');

        resOrders += "; ";
        resOrders = resOrders.replace(/\s+/g,' ');

        thisPrice += parseInt($(this).find('.order-list-sum').text());
    });

    $('.orders-list').val(resOrders);
    $('.total-sum span').text(" "+thisPrice+" руб.");
}
addListOrders();

function editListOrders(){
    addListOrders();
    $('.order-list-row .minus').off();
    $('.order-list-row .plus').off();
    $('.order-list-row .minus').on('click', function(){
        var resQnt = $(this).next('.order-list-quantity-res').text();
        $(this).next('.order-list-quantity-res').text(parseInt(resQnt)-1);
        resQnt = $(this).next('.order-list-quantity-res').text();
        var price = parseInt($(this).parents('.order-list-row').find('.order-list-price').text());
        var totalPrice = $(this).parents('.order-list-row').find('.order-list-sum').text(resQnt*price+" руб");
        addListOrders();
        if(resQnt<=1){
            $(this).parents('.order-list-row').find('.minus').css({
                'pointer-events': 'none',
                'opacity':'.3'
            });
        }else{
            $(this).parents('.order-list-row').find('.minus').css({
                'pointer-events': 'auto',
                'opacity':'1'
            });
        }


    });

    $('.order-list-row .plus').on('click', function(){
        var resQnt = $(this).prev('.order-list-quantity-res').text();
        $(this).prev('.order-list-quantity-res').text(parseInt(resQnt)+1);
        resQnt = $(this).prev('.order-list-quantity-res').text();
        var price = parseInt($(this).parents('.order-list-row').find('.order-list-price').text());
        var totalPrice = $(this).parents('.order-list-row').find('.order-list-sum').text(resQnt*price+" руб");
        addListOrders();
        if(resQnt<=1){
            $(this).parents('.order-list-row').find('.minus').css({
                'pointer-events': 'none',
                'opacity':'.3'
            });
        }else{
            $(this).parents('.order-list-row').find('.minus').css({
                'pointer-events': 'auto',
                'opacity':'1'
            });
        }


    });

    $('.order-list-row .remove, .order-list-row .remove-word').on('click', function(){

        var $this = $(this);
        var rowId= $this.parents('.order-list-row').data('id');
        delete ordersArray[rowId];

        selectedProduct();
        $(".order-list-cat").after($this.parents('.order-list-row-active').removeClass('order-list-row-active').addClass('order-list-row-notactive'));
        addListOrders();
        hideBtnAddProduct();
        if(!$('.add-product').hasClass('remove-product') ){
            $this.parents('.order-list-row').removeClass('fadeInLeft').addClass('fadeOutLeft').css({'display':'none'}).animate({'height':'0'});
        }
    });
}
editListOrders();

function selectedProduct(){
    $(function(){
        $('.order-list-row-notactive').off();
        $('.order-list-row-notactive').on('click', function(){
            $(this).remove().clone().appendTo( ".order-list-row-wrap" ).removeClass('order-list-row-notactive').addClass('order-list-row-active');

            var name = $(this).find('.order-list-title p').text();
            var price = $(this).find('.order-list-price').text();
            var img = $(this).find('.order-list-img').css('background-image');
            var desc = $(this).find('.order-list-desc').text();
            var productId = $(this).data('id');
            ordersArray[productId] = ({
                'name':name,
                'price':price,
                'img':img,
                'desc':desc
            });
            hideBtnAddProduct();
            editListOrders();
        });
        $('.btn-order>div').on('click', function(e){
            e.preventDefault();
            $('.order-list-row-notactive[data-id="'+$(this).data('id')+'"]').remove();
            hideBtnAddProduct();
        });
    });
}
selectedProduct();

$(function(){
    var flag=0;
    $('.add-product').on('click', function(){
        if (flag==0){
            $('.order-list-cat').show();
            $(this).addClass('remove-product').text('скрыть товары');
            $('.order-list-row-notactive').removeClass('fadeOutRight fadeOutLeft').addClass('animated fadeInLeft').css({'display':'block'}).animate({'height':'100%'});
            flag=1;
        }
        else {
            $('.order-list-cat').hide();
            $(this).removeClass('remove-product').text('добавить товар');
            $('.order-list-row-notactive').removeClass('fadeInLeft').addClass('animated fadeOutRight').css({'display':'none'}).animate({'height':'0'});
            flag=0;
        }

        $('.modal#modal-order .modal__close').click(function(){
            $('.order-list-cat').hide();
            if($('.add-product').has('remove-product')){
                setTimeout(function(){
                    $('.add-product').removeClass('remove-product').text('добавить товар');
                    $('.order-list-row-notactive').removeClass('fadeInLeft').addClass('animated fadeOutRight').css({'display':'none'}).animate({'height':'0'});
                    flag=0;
                }, 500)
            }
        });

    });

    $('.order-list-row-notactive .remove').click(function(e){
        e.preventDefault();
    });
});

function hideBtnAddProduct(){
    if( $('.order-list-row-notactive').length==0 ){
        $('.add-product').addClass('btn-opacity');
    }else{
        $('.add-product').removeClass('btn-opacity');
    }

    if( ($('.order-list-row-notactive').length==0) || (!($('.add-product').hasClass('remove-product'))) ){
        $('.order-list-cat').hide();
    }else{
        $('.order-list-cat').show();
    }

    if(  $('.add-product').hasClass('btn-opacity')){
        $('.order-list-cat').hide();
    }

    if( $('.order-list-row-wrap').find('div').length==0 && $('.add-product').hasClass('remove-product')){
        $('.order-list-cat').show();
    }

    $('.order-list-row-notactive').find('.remove-word').text('Добавить');
    $('.order-list-row-active').find('.remove-word').text('Удалить');

}

$(function(){
    $('.btn-order>div').click(function(){
        setTimeout(function(){
            $('.order-list-cat').hide();
        }, 300);
    });

    $('div[data-recommended-id]').on('click', function(){
        var recommendedId = $(this).data('recommended-id');
        $('.btn-order .button-bubble[data-id="'+recommendedId+'"]').eq(0).click();
    });

    $(document).ajaxComplete(function() {
        setTimeout(
            function(){
                $('.wpcf7-mail-sent-ok, .wpcf7-validation-errors').css(
                    {'opacity':'0'}
                );
            }, 2000);

         setTimeout(
            function(){
                $('.wpcf7-mail-sent-ok, .wpcf7-validation-errors').css(
                    {
                        'opacity':'1',
                        'display':'none'
                    }
                );
            }, 2500);
    });



    

});








$(function(){


    "use strict";

    var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

    function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

    function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

    function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

    var Randomizer = function Randomizer(props) {
        return React.createElement(
            "div",
            null,
            React.createElement(
                "svg",
                { xmlns: "http://www.w3.org/2000/svg", version: "1.1", className: "goo" },
                React.createElement(
                    "defs",
                    null,
                    React.createElement(
                        "filter",
                        { id: "goo" },
                        React.createElement("feGaussianBlur", { "in": "SourceGraphic", stdDeviation: "10", result: "blur" }),
                        React.createElement("feColorMatrix", { "in": "blur", mode: "matrix", values: "1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9", result: "goo" }),
                        React.createElement("feComposite", { "in": "SourceGraphic", in2: "goo" })
                    )
                )
            ),
            React.createElement(
                "span",
                { className: "button--bubble__container" },
                React.createElement(
                    "a",
                    { href: "#", className: "button button--bubble", target: "_blank" },
                    "\u0417\u0430\u043A\u0430\u0437\u0430\u0442\u044C"
                ),
                React.createElement(
                    "span",
                    { className: "button--bubble__effect-container" },
                    React.createElement("span", { className: "circle top-left" }),
                    React.createElement("span", { className: "circle top-left" }),
                    React.createElement("span", { className: "circle top-left" }),
                    React.createElement("span", { className: "button effect-button" }),
                    React.createElement("span", { className: "circle bottom-right" }),
                    React.createElement("span", { className: "circle bottom-right" }),
                    React.createElement("span", { className: "circle bottom-right" })
                )
            )
        );
    };

    /*Container component*/

    var WikipediaViewer = function (_React$Component) {
        _inherits(WikipediaViewer, _React$Component);

        function WikipediaViewer() {
            _classCallCheck(this, WikipediaViewer);

            var _this = _possibleConstructorReturn(this, (WikipediaViewer.__proto__ || Object.getPrototypeOf(WikipediaViewer)).call(this));

            _this.state = {
                searchText: '',
                isRandom: false,
                //initialize state of results here
                results: ['', [], [], []]
            };

            _this.handleSearchInput = _this.handleSearchInput.bind(_this);
            _this.handleRandomInput = _this.handleRandomInput.bind(_this);

            return _this;
        }

        _createClass(WikipediaViewer, [{
            key: "handleSearchInput",


            //Callback function from Search Bar component which sets state of search text
            value: function handleSearchInput(searchText) {
                var _this2 = this;

                //Place Wiki API here - using superAgent
                superagent.get('https://en.wikipedia.org/w/api.php').query({
                    search: searchText, // The search keyword passed by SearchBar
                    action: 'opensearch', //you can use the any search here provided?
                    format: 'json' // We want JSON back
                }).use(jsonp) //use the json plugin
                    .end(function (error, response) {
                        if (error) {
                            console.log(error);
                        } else {
                            //set the state once results are back to send us props to ResultList component
                            _this2.setState({ results: response.body });
                        }
                    });
            }
        }, {
            key: "handleRandomInput",
            value: function handleRandomInput(isRandom) {
                this.setState({});
            }
        }, {
            key: "render",
            value: function render() {
                return React.createElement(Randomizer, null);
            }
        }]);

        return WikipediaViewer;
    }(React.Component);

// ========================================

       for (var i = 0; i < document.getElementsByClassName('button-bubble').length; i++) {
            ReactDOM.render(React.createElement(WikipediaViewer, null), document.getElementsByClassName('button-bubble')[i]);
        } 

// ========================================


    /*--Animations for Bubble Button--*/

        $('.button--bubble').each(function () {
            var $circlesTopLeft = $(this).parent().find('.circle.top-left');
            var $circlesBottomRight = $(this).parent().find('.circle.bottom-right');

            var tl = new TimelineLite();
            var tl2 = new TimelineLite();

            var btTl = new TimelineLite({ paused: true });

            tl.to($circlesTopLeft, 1.2, { x: -25, y: -25, scaleY: 2, ease: SlowMo.ease.config(0.1, 0.7, false) });
            tl.to($circlesTopLeft.eq(0), 0.1, { scale: 0.2, x: '+=6', y: '-=2' });
            tl.to($circlesTopLeft.eq(1), 0.1, { scaleX: 1, scaleY: 0.8, x: '-=10', y: '-=7' }, '-=0.1');
            tl.to($circlesTopLeft.eq(2), 0.1, { scale: 0.2, x: '-=15', y: '+=6' }, '-=0.1');
            tl.to($circlesTopLeft.eq(0), 1, { scale: 0, x: '-=5', y: '-=15', opacity: 0 });
            tl.to($circlesTopLeft.eq(1), 1, { scaleX: 0.4, scaleY: 0.4, x: '-=10', y: '-=10', opacity: 0 }, '-=1');
            tl.to($circlesTopLeft.eq(2), 1, { scale: 0, x: '-=15', y: '+=5', opacity: 0 }, '-=1');

            var tlBt1 = new TimelineLite();
            var tlBt2 = new TimelineLite();

            tlBt1.set($circlesTopLeft, { x: 0, y: 0, rotation: -45 });
            tlBt1.add(tl);

            tl2.set($circlesBottomRight, { x: 0, y: 0 });
            tl2.to($circlesBottomRight, 1.1, { x: 30, y: 30, ease: SlowMo.ease.config(0.1, 0.7, false) });
            tl2.to($circlesBottomRight.eq(0), 0.1, { scale: 0.2, x: '-=6', y: '+=3' });
            tl2.to($circlesBottomRight.eq(1), 0.1, { scale: 0.8, x: '+=7', y: '+=3' }, '-=0.1');
            tl2.to($circlesBottomRight.eq(2), 0.1, { scale: 0.2, x: '+=15', y: '-=6' }, '-=0.2');
            tl2.to($circlesBottomRight.eq(0), 1, { scale: 0, x: '+=5', y: '+=15', opacity: 0 });
            tl2.to($circlesBottomRight.eq(1), 1, { scale: 0.4, x: '+=7', y: '+=7', opacity: 0 }, '-=1');
            tl2.to($circlesBottomRight.eq(2), 1, { scale: 0, x: '+=15', y: '-=5', opacity: 0 }, '-=1');

            tlBt2.set($circlesBottomRight, { x: 0, y: 0, rotation: 45 });
            tlBt2.add(tl2);

            btTl.add(tlBt1);
            btTl.to($(this).parent().find('.button.effect-button'), 0.8, { scaleY: 1.1 }, 0.1);
            btTl.add(tlBt2, 0.2);
            btTl.to($(this).parent().find('.button.effect-button'), 1.8, { scale: 1, ease: Elastic.easeOut.config(1.2, 0.4) }, 1.2);

            btTl.timeScale(2.6);
            
            $(this).on('mouseover', function () {
                btTl.restart();
            });
        });



    $('.button-bubble').each(function(){
        if( $(this).hasClass('btn-reviews') ){
            $(this).find('.button.button--bubble').text('Оставить отзыв');
           
        }else if( $(this).find('btn-order') ){
            $(this).find('.button.button--bubble').text('Заказать');
        }
    });

    if(isMobile){
        $('.button--bubble__effect-container').css({
            'display':'none',
        });
    }



    if(!Cookies.get('confform-submit')){
        $('body').append("<div class='confform'><p>Сайт использует cookie и аналогичные технологии для удобного и корректного отображения информации. Пользуясь нашим сервисом, вы соглашаетесь с их использованием.</p><div><a class='confform-podr' href='/privacy-policy' target='_blank'>Подробнее</a><span class='confform-submit'>Хорошо</span></div></div>");
    }

    $('.confform-submit').on('click', function(){
        Cookies.set('confform-submit', 'confform-submit', {expires :  365  });
        $('.confform').fadeOut(300);
    });


    var FileInputInfo = function() {
        var fileField = $('.select-photo');

        fileField.each(function(index, el) {

            $(el).find('.select-photo-input').uploadedFileInfo({
                elements: {
                    browse: '.select-photo-input-button',
                    filename: '.select-photo-input-filename',
                    filesize: '.select-photo-input-filesize',
                    remove: '.select-photo-input-remove',
                    error: '.select-photo-input-error'
                }
            });
        });
    };
    FileInputInfo();

    $('.select-photo-input').change(function(){
        $('.select-photo-input-filename-title').hide();
    });


    $('input[name="you-phone"]').mask('+7(999)-999-99-99', { 'placeholder': '+7(___)-___-__-__' });

});