jQuery(document).ready(function ($) {

    'use strict';

    var templateUrl = themename.templateUrl;

    // Casino Item Slider Start

    $('.casino_item_slider').slick({
        variableWidth: true,

        slidesToShow: 5,
        slidesToScroll: 2,
        dots: true,
        //autoplay: true,
        arrows: false,
        autoplaySpeed: 4000,
        autoplay: true
        //infinite: false

        // slidesToShow: 3,
        // //verticalSwiping: true,
        // draggable: true,
        // infinite: true,
        // adaptiveHeight: true,
        // centerMode: true,
        // //vertical: true,
        // nextArrow: '.bottom_slide',
        // prevArrow: '.top_slide'
    });

    // Casino Item Slider End


    // Best Casino Slider

    $('.best_casino_slider').slick({
        variableWidth: true,
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        infinite: true,
        autoplaySpeed: 5000,

    });

    // Best Casino Slider End

    // Bonuses Slider Start

    $('.bonuses_list_first').slick({
        variableWidth: true,
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        infinite: true,
        //autoplay: true,
        autoplaySpeed: 20000,
        //infinite: true
    });

    // Bonuses Slider End

    // Bonuses Slider with arrows Start

    $('.bonuses_list').slick({
        variableWidth: true,
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        infinite: true,
        nextArrow: '<img class="bonuses_slider_right" src="'+ templateUrl +'/layouts/img/slider/arrow_next.svg" alt="next">',
        prevArrow: '<img class="bonuses_slider_left" src="'+ templateUrl +'/layouts/img/slider/arrow_prev.svg" alt="prev">'
        //autoplay: true,
        //autoplaySpeed: 2000,
        //infinite: true
    });

    // Bonuses Slider with arrows End

    // More Casinos Slider Start

    $('.more_casinos_slider_list').slick({
        variableWidth: true,
        centerMode: false,
        //centerPadding: '60px',
        slidesToShow: 1,
        slidesToScroll: 1,
        //autoplay: true,
        arrows: true,
        nextArrow: '<img class="bonuses_slider_right" src="'+ templateUrl +'/layouts/img/slider/arrow_next.svg" alt="next">',
        prevArrow: '<img class="bonuses_slider_left" src="'+ templateUrl +'/layouts/img/slider/arrow_prev.svg" alt="prev">',
        infinite: true,
        autoplaySpeed: 1000,

    });

    // More Casinos Slider End

    // Mobile Menu Open Start

    $('.space-mobile-menu-icon').on('click', function () {
        'use strict';
        $('.space-mobile-menu').addClass('active');
    });

    $('.space-mobile-menu-close-button').on('click', function () {
        'use strict';
        $('.space-mobile-menu').removeClass('active');
    });

    // Mobile Menu Open End


    // Mobile Children Start

    $(".menu-item-has-children a").on('click', function (event) {
        'use strict';
        event.stopPropagation();
        location.href = this.href;
    });

    $(".menu-item-has-children").on('click', function () {
        'use strict';
        $(this).addClass("toggled");
        if ($(".menu-item-has-children").hasClass("toggled")) {
            $(this).children("ul").toggle();
        }
        $(this).toggleClass("space-up");
        return false;
    });

    // Mobile Children End


    //Toggle text Start


    $('.content_toggle').click(function () {

        $('.content_block').toggleClass('hide', 2000);

        if ($('.content_block').hasClass('hide')) {
            $('.content_toggle').html('<a class="content_toggle " href="#">EXPLORE ALL CASINOS</a>');
        } else {
            $('.content_toggle').html('<a class="content_toggle " href="#">Hide</a>');
        }
        return false;

    });

    $('.content_toggle_second').click(function () {

        $('.content_block_second').toggleClass('hide', 2000);

        if ($('.content_block_second').hasClass('hide')) {
            $('.content_toggle_second').html('Read More');
        } else {
            $('.content_toggle_second').html('Hide');
        }
        return false;

    });


    //Toggle text End

    // Search Block Start

    $('.desktop-search-button').on('click', function () {
        'use strict';
        $('.space-header-search-block').addClass('active');
        setTimeout(function () {
            'use strict';
            $('.space-header-search-block input').focus();
        }, 500);
    });

    $('.desktop-search-close-button').on('click', function () {
        'use strict';
        $('.space-header-search-block').removeClass('active');
    });

    // Search Block End


    // Flexslider Start

    if ($('#slider').length) {
        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            nextText: "",
            prevText: ""
        });
    }

    // Flexslider End

    //Faq accordion Start

        class Spoilers {
            constructor({ spoilerBlock, oneToShow = false }) {
                this.spoilerBlock = spoilerBlock;
                this.triggers = spoilerBlock.querySelectorAll('.spoilerButton');
                this.oneToShow = oneToShow;
            }

            openByClickOnButton() {
                this.triggers.forEach((trigger) => {
                    trigger.addEventListener('click', () => {
                    if (this.oneToShow === true) {
                    this._removeAnotherClasses();
                }

                trigger.parentNode.classList.toggle('_opened');
            });
            });
            }

            _removeAnotherClasses() {
                this.triggers.forEach((trigger) => {
                    trigger.parentNode.classList.remove('_opened');
            });
            }
        }

        const spoilerBlocks = document.querySelectorAll('[data-spoilers]');

        spoilerBlocks.forEach((block) => {
            const spoilers = new Spoilers({
                spoilerBlock: block,
                oneToShow: block.dataset['oneToShow'] === 'yes',
            });

        spoilers.openByClickOnButton();
    })

    //Faq accordion End

    //Anchor animation Start

    $(document).ready(function(){

        $("anchor_menu").on("click","a", function (event) {
            event.preventDefault();
            var id  = $(this).attr('href'),
                top = $(id).offset().top;
            $('body,html').animate({srollTop: top }, 3000);

        });
    });

    //Anchor animation End


    // Range Slider

        var rangeSlider = document.getElementById('slider-range');

        noUiSlider.create(rangeSlider, {
            start: [3],
            range: {
                'min': [1],
                'max': [10]
            },
            connect: 'lower',
        });

        var rangeSliderValueElement = document.getElementById('slider-range-value');

        rangeSlider.noUiSlider.on('update', function (values, handle) {
            rangeSliderValueElement.innerHTML = values[handle] >= 10 ? values[handle].slice(0, 2) : values[handle].slice(0, 3);
        });

    // Inputs with counter

        const inputElementsNeededCounter = document.querySelectorAll('.elementWithCounter')

        inputElementsNeededCounter.forEach(input => {
            input.addEventListener('input', function() {
            const counterElement = document.querySelector(this.dataset['counterElement']).querySelector('span')

            counterElement.innerHTML = 70 - this.value.length

            if(this.value.length === 70) {
                counterElement.parentNode.classList.add('_full')
            } else {
                counterElement.parentNode.classList.remove('_full')
            }
        })
    })


// initiateParallax(parallaxItems)

    // var scene = document.getElementById('scene');
    // var parallaxInstance = new Parallax(scene);
    //
    // parallaxInstance.friction(0.2, 0.2)


});