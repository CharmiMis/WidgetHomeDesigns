$(document).ready(function () {
    $('.top-menu-bar-second').css('display', 'none');
    $('.searched_product_result').css('display', 'none');
    $('.image-mask-container').css('display', 'none');
    $('.segment-masking-container').css('display', 'none');
    $('.top-menu-bar-third').css('display', 'none');
    $('.image-container').css('display', 'none');
    $('.category-container').css('display', 'none');

    $(".gs-pro-dot-right > img").click(function () {
        $(".gs-pro-dot-right").removeClass("gs-active");
        $(this).parent().toggleClass("gs-active");
    });
    $(".gs-dashboard-wrpper").click(function () {
        $(".gs-pro-dot-right").removeClass("gs-active");
    });
    $('.gs-pro-dot-right').click(function (event) {
        event.stopPropagation();
    });

    // $(".gs-select-automatically-inner li, .interior-list li").click(function () {
    //     $(this).toggleClass("active");
    // });
    // $(".materials-textures-cat li").click(function () {
    //     $(".select-more-details").slideDown();
    // });
    $(".gs-select-category-list-inner").click(function (event) {
        $(this).siblings('.gs-select-category-list-inner').removeClass("active");
        $(this).addClass("active");
    });

    $(".category-tabs").click(function (event) {
        var sec = $(this).data('sec')
        $(".gs-option-flex li").removeClass("active");
        $(".gs-option-flex li").eq(sec).addClass("active");
    });

    // $(".gs-our-preset-color li").click(function () {
    //     $('.gs-our-preset-color li').removeClass("active");
    //     $(this).addClass("active");
    // });

    $(".gs-refine-manually-single a").click(function () {
        $(this).siblings('.gs-refine-manually-single a').removeClass("active");
        $(this).addClass("active");
    });


    $(".gs-select-room-style-single").click(function () {
        $('#view_all_interior_room_type').modal('hide');
        $('#view_all_interior_choose_design').modal('hide');
        $('#view_all_garden_type').modal('hide');
        $('#view_all_garden_style').modal('hide');
        $('#view_all_exterior_choose_design').modal('hide');

        $(this).siblings('.gs-select-room-style-single').removeClass("active");
        $(this).addClass("active");
    });

    $(".menu-icon").click(function () {
        $(".gs-dashboard-leftbar").addClass("active");
    });
    $(".close-icon").click(function () {
        $(".gs-dashboard-leftbar").removeClass("active");
    });

    $(".gs-continue-btn-similar").click(function () {
        $(".gs-simlar-products-list-wrapper").slideToggle();
    });
    $(".gs-dashboard-cross img").click(function () {
        $(this).parents(".gs-dashboard-notice").fadeOut();
    });

    if ($(window).width() < 991) {
        $(".ai-tool-top h3").click(function () {
            $(".ai-tool-list").slideToggle();
        });
    }

    $(".ai-upload-selection input").click(function () {
        if ($('.ai-upload-selection input[type="checkbox"]').is(':checked')) {
            $('.ai-upload-add-project').fadeIn();
        } else {
            $('.ai-upload-add-project').fadeOut();
        }
    });


    $(".gs-modal-feeback-row").click(function () {
        if ($('input[name=feeback]:checked').length > 0) {
            $('.gs-modal-continue-btn').removeClass('gs-modal-continue-disable');
            // do something here
        }
    });


    // $(".gs-continue-btn").click(function () {
    //     setTimeout(function () {
    //         $('.gs-image-editing-slide').slick('refresh');
    //     }, 500);
    // });





    $(function () {
        // $(".gs-select-range").slider({
        //     //   orientation: "vertical",
        //     range: "min",
        //     min: 0,
        //     max: 70,
        //     value: 70,
        //     slide: function (event, ui) {
        //         $("#amount").val(ui.value);
        //         $("#ip-brush-thickness").val(ui.value);
        //     }
        // });
        // $("#amount").val($(".gs-select-range").slider("value"));
        $(".gs-select-strength-range").slider({
            range: "min",
            min: 1,
            max: 10,
            value: 5,  // Default at 5
            step: 1,   // Increment by whole numbers from 1 to 10
            slide: function (event, ui) {
                var sec = $(this).data('sec');

                // Map the slider value (1–10) to the corresponding thickness value (0.65–0.85)
                var thicknessValue = 0.65 + (ui.value - 1) * 0.02;

                // Update the displayed value with the slider value (1–10)
                $("#aiStrengthAmount" + sec + dataPage).val(ui.value);

                // Update the hidden input with the actual thickness value (0.65–0.85)
                $("#ip-strength-thickness" + sec + dataPage).val(thicknessValue.toFixed(2));
            }
        });

        $(".our-preset-settings-range").slider({
            range: "max",
            min: 1,
            max: 4,
            value: 1,
            slide: function (event, ui) {
                var sec = $(this).data('sec');
                $('#no_of_des' + sec).val(ui.value);
                $('.our-preset-settings-range[data-sec]').each(function () {
                    var currentSec = $(this).data('sec');
                    if (currentSec === sec) {
                        $(this).slider('value', ui.value);
                    }
                });
            }
        });

        $(".ai-intervention").slider({
            range: "max",
            min: 1,
            max: 4,
            value: 3,
            slide: function (event, ui) {
                var sec = $(this).data('sec');
                var valueText;
                switch (ui.value) {
                    case 1:
                        valueText = 'very_low';
                        break;
                    case 2:
                        valueText = 'low';
                        break;
                    case 3:
                        valueText = 'mid';
                        break;
                    case 4:
                        valueText = 'extreme';
                        break;
                    default:
                        valueText = '';
                        break;
                }
                $('#strength' + sec).val(valueText);
                $('.ai-intervention[data-sec]').each(function () {
                    var currentSec = $(this).data('sec');
                    if (currentSec === sec) {
                        $(this).slider('value', ui.value);
                    }
                });
            }
        });

        $(".ai-intervention-room-composer").slider({
            range: "max",
            min: 1,
            max: 2,
            value: 1,
            slide: function (event, ui) {
                var sec = $(this).data('sec');
                var valueText;
                switch (ui.value) {
                    case 1:
                        valueText = 'mid';
                        break;
                    case 2:
                        valueText = 'extreme';
                        break;
                    default:
                        valueText = '';
                        break;
                }
                $('#strength' + sec).val(valueText);
            }
        });
        // $( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
    });



    const marqueeContainer = $('#marqueeContainer');
    const marqueeWrapper = $('#marqueeWrapper');
    marqueeWrapper.append(marqueeWrapper.html());

    function scrollMarquee() {
        marqueeWrapper.animate({
            top: '-=' + marqueeWrapper.height() / 2 + 'px'
        }, {
            duration: 45000,
            easing: 'linear',
            complete: function () {
                marqueeWrapper.css('top', '0px');
                scrollMarquee();
            }
        });
    }
    scrollMarquee();



    // $(".ai-upload-input").on('change', function () {

    //     $('.image-mask-container').css('display', 'block');
    //     inPaintStageContainer = document.querySelector('#inpainting-stag-outer');

    //     paintingStagOriginalWidth = inPaintStageContainer.clientWidth;
    //     paintingStagOriginalHeight = inPaintStageContainer.clientHeight;

    //     if ($('.ai-upload-input').val() != '') {

    //         // $('#uploading_instruction').modal('show');
    //     } else {

    //     }
    // });


    $(".gs-image-editing-slide").slick({
        slidesToShow: 1,
        arrows: false,
        draggable:false,
        infinite:true,
        draggable: false,
        swipe: false,
        swipeToSlide: false,
        touchMove: false,
        draggable: false,
        accessibility: false,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000
       });


    // $(".gs-modal-best-btns a").click(function () {
    //     setTimeout(function () {
    //         $('.gs-modal-uploading_instruction_slider')[0].slick.refresh();
    //     }, 400);
    //     setTimeout(function () {
    //         $('.top-menu-bar-first').hide();
    //         $('.upload-image-container').hide();
    //         if ($('.top-menu-bar-second').length) {
    //             $('.redesign-designs-tabs').hide();
    //             $('.top-menu-bar-second').show();
    //             $('.image-mask-container').show();
    //             $('.segment-masking-container').show();
    //         }
    //         else{
    //             $('.top-menu-bar-third').show();
    //             $('.image-container').show();
    //             $('.category-container').show();
    //         }
    //         $('.gs-modal-close').trigger('click');
    //     }, 3000)
    // });
    // $(".gs-modal-uploading_instruction_slider").slick({
    //     slidesToShow: 2,
    //     arrows: false,
    //     dots: true,
    //     infinite: true,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 2000,
    //     responsive: [{
    //             breakpoint: 991,
    //             settings: {
    //                 slidesToShow: 2,
    //             }
    //         },
    //         {
    //             breakpoint: 767,
    //             settings: {
    //                 slidesToShow: 1,
    //             }
    //         }
    //     ]
    // });

    // $(".continue-parameter").click(function () {
    //     $('.top-menu-bar-second').hide();
    //     $('.image-mask-container').hide();
    //     $('.segment-masking-container').hide();
    //     $('.top-menu-bar-third').show();
    //     $('.image-container').show();
    //     $('.category-container').show();
    // });

    // $(".previous_page").click(function () {
    //     if ($('.top-menu-bar-third').is(':visible')) {
    //         $('.top-menu-bar-third').hide();
    //         $('.image-container').hide();
    //         $('.category-container').hide();
    //         $('.top-menu-bar-second').show();
    //         $('.image-mask-container').show();
    //         $('.segment-masking-container').show();
    //     }
    //     else if($('.top-menu-bar-second').is(':visible')){
    //         $('.top-menu-bar-second').hide();
    //         $('.image-mask-container').hide();
    //         $('.segment-masking-container').hide();
    //         $('.top-menu-bar-first').show();
    //         $('.upload-image-container').show();
    //     }
    // });
    
    function showCircleLoaderForDuration(duration) {
        console.log('duration',duration);

        showCircleLoader();

        setTimeout(() => {
            removeCircleLoader();
        }, duration);
    }

    function showSquareLoaderForDuration(duration) {
        console.log('duration',duration);

        showSquareLoader();

        setTimeout(() => {
            removeSquareLoader();
        }, duration);
    }

    function showCircleLoader() {
        const circleLoaderHTML = `
            <div class="circle-loader">
                <span></span>
            </div>
            <style id="circle-loader-style">
                .circle-loader {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    left: 65%;
                    right: 0;
                    transform: translate(-60%, -60%);
                    top: 50%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    pointer-events: none;
                }
                .circle-loader span {
                    border-radius: 100%;
                    display: inline-block;
                    position: relative;
                    border: 1px solid black;
                    animation: spin 3s infinite linear;
                    transform-origin: 50% 125px;
                    margin: 0 auto 0;
                    width: 100px;
                    height: 100px;
                    top: -10%;
                }
                @media only screen and (max-width: 600px) {
                .circle-loader span {

                    width: 40px;
                    height: 40px;
                }
                }
                @keyframes spin {
                    to {
                        transform: rotate(1turn);
                    }
                }
            </style>
        `;

        const container = document.querySelector('.image-mask-'+ dataPage) ;
        const konvajsContent = container.querySelector('.konvajs-content');
        if (konvajsContent) {
            konvajsContent.insertAdjacentHTML('beforeend', circleLoaderHTML);
        }
    }

    function showSquareLoader() {
        const squareLoaderHTML = `
        <div class="square-loader">
            <span></span>
        </div>

        <style>
            .square-loader {
                position: absolute;
                width: 100%;
                height: 100%;
                left: 65%;
                right: 0;
                transform: translate(-60%, -60%);
                top: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                pointer-events: none;
            }

            .square-loader span {
                display: inline-block;
                position: relative;
                border: 1px solid black;
                animation: spin 3s infinite linear;
                margin: 0 auto 0;
                animation: moveInSquare 3s linear infinite;
                margin: 0 auto 0;
                width: 80px;
                height: 80px;
            }

            @media only screen and (max-width: 600px) {
            .square-loader span {

                width: 40px;
                height: 40px;
            }
            }

            @keyframes moveInSquare {
                0% {
                    top: 0;
                    left: 0;
                }

                25% {
                    top: 0;
                    left: 80px;
                }

                50% {
                    top: 80px;
                    left: 80px;
                }

                75% {
                    top: 80px;
                    left: 0;
                }

                100% {
                    top: 0;
                    left: 0;
                }
            }
        </style>
            `;

            const container = document.querySelector('.image-mask-'+ dataPage) ;
            const konvajsContent = container.querySelector('.konvajs-content');
        if (konvajsContent) {
            konvajsContent.insertAdjacentHTML('beforeend', squareLoaderHTML);
        }
    }

    function removeCircleLoader() {
        const circleLoader = document.querySelector('.circle-loader');
        const circleLoaderStyle = document.getElementById('circle-loader-style');
        if (circleLoader) {
            circleLoader.remove();
        }
        if (circleLoaderStyle) {
            circleLoaderStyle.remove();
        }
    }

    function removeSquareLoader() {
        const squareLoader = document.querySelector('.square-loader');
        const squareLoaderStyle = document.getElementById('square-loader-style');
        if (squareLoader) {
            squareLoader.remove();
        }
        if (squareLoaderStyle) {
            squareLoaderStyle.remove();
        }
    }
});
jQuery(document).ready(function(){
    jQuery('a.ip_img_preview.inpainting-preview, .btn-wrap button').on('click', function() {
        new BeforeAfter({
            id: '#one'
        });
        new BeforeAfter({
            id: '#two'
        });
        alert('slider');
});
jQuery('#modalImagePreview').on('shown.bs.modal', function() {
    // Initialize BeforeAfter slider for each instance after modal is shown
    new BeforeAfter({
        id: '#one'
    });
    new BeforeAfter({
        id: '#two'
    });
    alert('slider initialized');
});
});