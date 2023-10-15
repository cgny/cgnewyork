(function ($) {
    'use strict';

    $(window).on('load', function () {

        /* Preloader */
        $('#preloader').fadeOut(400, function () {
            $(this).remove();
        });

        /* Background loading full-size images */
        $('.gallery-item').each(function() {
            var src = $(this).attr('href');
            var img = document.createElement('img');

            img.src = src;
            $('#image-cache').append(img);
        });

        /* Scroll for mobile nav */
        setTimeout (function() {
            if (document.documentElement.clientWidth < 768) {
                var body = $("html, body");
                body.stop().animate({scrollTop:$('#nav').offset().top}, '500', 'swing');
            }
        }, 100);

        // Widgets masonry
        $( '#sidebar-footer' ).masonry( {
            itemSelector: '.widget',
            columnWidth: function( containerWidth ) {
                return containerWidth / 4;
            },
            gutterWidth: 0,
            isResizable: true
        } );

    });

    $(document).ready(function () {
        commonScripts();
        pageScripts();
    });

    /* Set of common scripts */
    function commonScripts() {

        /* Submenu */
        (function () {
            $('#nav>.menuitem').each(function(key, item) {
                var $item = $(item);
                var $submenu = $item.find('.sub-menu');
                if ($submenu.length) {
                    var duration = $submenu.find('li').length * 250;
                    $item.hover( function() {
                        setTimeout(function() {$submenu.slideDown( duration )}, 250);
                    }, function() {
                        $submenu.slideUp( duration );
                    } );
                    $item.on('click', function() {
                        if ($submenu.css('display') == 'none') {
                            setTimeout(function() {$submenu.slideDown( duration )}, 250);
                            return false;
                        } else {
                            $submenu.slideUp( duration );
                        }
                    });
                }
            });
        })();

        /* Animated Title */
        (function () {
            //set animation timing
            var animationDelay = 3500,
            //loading bar effect
                barAnimationDelay = 3800,
                barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
            //letters effect
                lettersDelay = 50,
            //type effect
                typeLettersDelay = 150,
                selectionDuration = 500,
                typeAnimationDelay = selectionDuration + 800,
            //clip effect
                revealDuration = 600,
                revealAnimationDelay = 2500;

            initHeadline();


            function initHeadline() {
                //insert <i> element for each letter of a changing word
                singleLetters($('.cd-headline.letters').find('b'));
                //initialise headline animation
                animateHeadline($('.cd-headline'));
            }

            function singleLetters($words) {
                $words.each(function(){
                    var word = $(this),
                        letters = word.text().split(''),
                        selected = word.hasClass('is-visible');
                    for (var i in letters) {
                        if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
                        letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
                    }
                    var newLetters = letters.join('');
                    word.html(newLetters).css('opacity', 1);
                });
            }

            window.animateHeadline = animateHeadline;

            function animateHeadline($headlines) {
                var duration = animationDelay;
                $headlines.each(function(){
                    var headline = $(this);

                    if(headline.hasClass('loading-bar')) {
                        duration = barAnimationDelay;
                        setTimeout(function(){ headline.find('.cd-words-wrapper').addClass('is-loading') }, barWaiting);
                    } else if (headline.hasClass('clip')){
                        var spanWrapper = headline.find('.cd-words-wrapper'),
                            newWidth = spanWrapper.width() + 10
                        spanWrapper.css('width', newWidth);
                    } else if (!headline.hasClass('type') ) {
                        //assign to .cd-words-wrapper the width of its longest word
                        var words = headline.find('.cd-words-wrapper b'),
                            width = 0;
                        words.each(function(){
                            var wordWidth = $(this).width();
                            if (wordWidth > width) width = wordWidth;
                        });
                        headline.find('.cd-words-wrapper').css('width', width);
                    };

                    //trigger animation
                    setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
                });
            }

            function hideWord($word) {
                var nextWord = takeNext($word);

                if($word.parents('.cd-headline').hasClass('type')) {
                    var parentSpan = $word.parent('.cd-words-wrapper');
                    parentSpan.addClass('selected').removeClass('waiting');
                    setTimeout(function(){
                        parentSpan.removeClass('selected');
                        $word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
                    }, selectionDuration);
                    setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);

                } else if($word.parents('.cd-headline').hasClass('letters')) {
                    var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
                    hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
                    showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

                }  else if($word.parents('.cd-headline').hasClass('clip')) {
                    $word.parents('.cd-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
                        switchWord($word, nextWord);
                        showWord(nextWord);
                    });

                } else if ($word.parents('.cd-headline').hasClass('loading-bar')){
                    $word.parents('.cd-words-wrapper').removeClass('is-loading');
                    switchWord($word, nextWord);
                    setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
                    setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('is-loading') }, barWaiting);

                } else {
                    switchWord($word, nextWord);
                    setTimeout(function(){ hideWord(nextWord) }, animationDelay);
                }
            }

            function showWord($word, $duration) {
                if($word.parents('.cd-headline').hasClass('type')) {
                    showLetter($word.find('i').eq(0), $word, false, $duration);
                    $word.addClass('is-visible').removeClass('is-hidden');

                }  else if($word.parents('.cd-headline').hasClass('clip')) {
                    $word.parents('.cd-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){
                        setTimeout(function(){ hideWord($word) }, revealAnimationDelay);
                    });
                }
            }

            function hideLetter($letter, $word, $bool, $duration) {
                $letter.removeClass('in').addClass('out');

                if(!$letter.is(':last-child')) {
                    setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);
                } else if($bool) {
                    setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
                }

                if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
                    var nextWord = takeNext($word);
                    switchWord($word, nextWord);
                }
            }

            function showLetter($letter, $word, $bool, $duration) {
                $letter.addClass('in').removeClass('out');

                if(!$letter.is(':last-child')) {
                    setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration);
                } else {
                    if($word.parents('.cd-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('waiting'); }, 200);}
                    if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
                }
            }

            function takeNext($word) {
                return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
            }

            function takePrev($word) {
                return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
            }

            function switchWord($oldWord, $newWord) {
                $oldWord.removeClass('is-visible').addClass('is-hidden');
                $newWord.removeClass('is-hidden').addClass('is-visible');
            }

        })();

        /* Back to top */
        (function () {
            $("#back-top").hide();

            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#back-top').fadeIn();
                } else {
                    $('#back-top').fadeOut();
                }
            });

            $('#back-top a').on('click', function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 600);
                return false;
            });
        })();
    }

    /* Set of page scripts */
    function pageScripts() {

        /* Home page blocks */
        (function() {
            if ($('#homesection').length) {
                var resizeHomeBlocks = function() {
                    var rows = $('#homesection').find('>.row');
                    $.each(rows, function(key, row) {
                        var maxHeight = 0;
                        var columns = $(row).find('>div');
                        $.each(columns, function(key, column) {
                            $(column).css("height", "");
                            if ($(columns[0]).css("width") != $('body').css("width")) {
                                if ($(column).height() > maxHeight) {
                                    maxHeight = $(column).height();
                                }
                            }
                        });
                        $.each(columns, function(key, column) {
                            if ($(columns[0]).css("width") != $('body').css("width")) {
                                $(column).height(maxHeight);
                            }
                        });
                    })
                };

                $(window).load(resizeHomeBlocks);
                $(window).on('resize', resizeHomeBlocks);
            }
        })();

        /* Animated Counter */
        $('.count-container span').counterUp({
            delay: 10, // the delay time in ms
            time: 3000 // the speed time in ms
        });


        /* Magnific Popup */
        $('.gallery-item').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        /* Isotope Portfolio */
        (function () {
            if (!$('#portfolio').length) {
                return false;
            }
            var grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.grid-sizer'
                }
            });

            $(window).on('load', function () {
                grid.isotope();
                grid.isotope({filter: '*'});
            });

            // filter items on button click
            $('#isotope-filters').on('click', 'a', function () {
                var filterValue = $(this).attr('data-filter');
                grid.isotope({filter: filterValue});
            });

            // filter items on tag click
            $('.post-tag').on('click', 'a', function () {
                var filterValue = $(this).attr('data-filter');
                grid.isotope({filter: filterValue});
                $('#isotope-filters a[data-filter="' + filterValue + '"]').focus();
            });
        })();

        /* Isotope Blog */
        (function () {
            if (!$('#blog').length) {
                return false;
            }
            var order = $('#posts').data('order');
            var orderby = $('#posts').data('orderby');
            var limit = $('#posts').data('limit');
            var category = $('#posts').data('category');
            var offset = $('#posts').data('offset');

            var $grid = $('#posts').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.grid-sizer'
                }
            });

            window.gridusImgloader = function() {
                $grid.isotope('layout');
            };

            $(window).on('load', function () {
                $grid.isotope('layout');
            });

            $('#isotope-filters').on('focus', 'a', function() {
                $('#isotope-filters a').each(function(key, filter) {
                    $(filter).removeClass('active')
                });
            });

            // filter items on filter
            $('#isotope-filters').on('click', 'a', function () {
                category = $(this).attr('data-filter');
                offset = 0;

                var data = {
                    categories: category,
                    limit: limit,
                    offset: offset,
                    order: order,
                    orderby: orderby,
                    just_items: '1'
                };

                $.get(
                    ajaxConfig.url,
                    {
                        action: 'blog_posts',
                        data: data,
                        nonce: ajaxConfig.nonce
                    },
                    function(response) {
                        $('#posts .grid-item').each(function() {
                            $grid.isotope('remove', this).isotope('layout');
                        });

                        if (response.grid_items) {
                            var $newItems = $(response.grid_items);
                            $grid.append($newItems).isotope('appended', $newItems);
                            $grid.imagesLoaded().progress( function() {
                                $grid.isotope('layout');
                            });
                        }

                        if (response.load_more) {
                            $("input[name='more_posts']").removeClass('hidden');
                        } else {
                            $("input[name='more_posts']").addClass('hidden');
                        }
                    }, 'json'
                );

            });

            // filter items on tag click
            $('#posts').on('click', '.post-tag a', function () {
                category = $(this).attr('data-filter');
                offset = 0;

                var data = {
                    categories: category,
                    limit: limit,
                    offset: offset,
                    order: order,
                    orderby: orderby,
                    just_items: '1'
                };

                $.get(
                    ajaxConfig.url,
                    {
                        action: 'blog_posts',
                        data: data,
                        nonce: ajaxConfig.nonce
                    },
                    function(response) {
                        $('#posts .grid-item').each(function() {
                            $grid.isotope('remove', this).isotope('layout');
                        });

                        if (response.grid_items) {
                            var $newItems = $(response.grid_items);
                            $grid.append($newItems).isotope('appended', $newItems);
                            $grid.imagesLoaded().progress(function () {
                                $grid.isotope('layout');
                            });
                        }

                        if (response.load_more) {
                            $("input[name='more_posts']").removeClass('hidden');
                        } else {
                            $("input[name='more_posts']").addClass('hidden');
                        }
                    }, 'json'
                );
                $('#isotope-filters a[data-filter="' + category + '"]').focus();
            });

            // load items on more button click
            $("input[name='more_posts']").on('click', function() {
                var self = this;
                offset += limit;
                var data = {
                    categories: category,
                    limit: limit,
                    offset: offset,
                    order: order,
                    orderby: orderby,
                    load_more: true,
                    just_items: '1'
                };
                $.get(
                    ajaxConfig.url,
                    {
                        action: 'blog_posts',
                        data: data,
                        nonce: ajaxConfig.nonce
                    },
                    function(response) {
                        if (response.grid_items) {
                            var $newItems = $(response.grid_items);
                            $grid.append($newItems).isotope('appended', $newItems);
                            $grid.imagesLoaded().progress(function () {
                                $grid.isotope('layout');
                            });
                        }

                        if (!response.load_more) {
                            $(self).parent().css('height', 34);
                            $(self).addClass('hidden');
                        }
                    }, 'json'
                );
            });

        })();

        /* Circle Progress */
        (function () {
            function animateElements() {
                $('.progressbar').each(function () {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find('.circle').attr('data-percent');
                    var percentage = parseInt(percent, 10) / parseInt(100, 10);
                    var animate = $(this).data('animate');
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data('animate', true);
                        $(this).find('.circle').circleProgress({
                            startAngle: -Math.PI / 2,
                            value: percent / 100,
                            thickness: 3,
                            fill: {
                                color: '#ffffff'
                            },
                            size: 120
                        }).on('circle-animation-progress', function (event, progress, stepValue) {
                            $(this).find('div').text((stepValue * 100).toFixed(1) + "%");
                        }).stop();
                    }
                });
            }

            // Show animated elements
            animateElements();
            $(window).scroll(animateElements);
        })();

        /* Google map */
        (function () {
            if (!$('#google-map').length) {
                return false;
            }

            initGmap();

            function initGmap() {

                // Create an array of styles.
                var styles = [
                    {
                        stylers: [
                            {saturation: -50}
                        ]
                    }, {
                        featureType: "road",
                        elementType: "geometry",
                        stylers: [
                            {lightness: 100},
                            {visibility: "simplified"}
                        ]
                    }, {
                        featureType: "road",
                        elementType: "labels",
                        stylers: [
                            {visibility: "off"}
                        ]
                    }
                ];

                // Create a new StyledMapType object, passing it the array of styles,
                // as well as the name to be displayed on the map type control.
                var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

                var lat = $('#google-map').data('lat');
                var lng = $('#google-map').data('lng');

                // Create a map object, and include the MapTypeId to add
                // to the map type control.
                var $latlng = new google.maps.LatLng(lat, lng),
                    $mapOptions = {
                        zoom: 13,
                        center: $latlng,
                        panControl: false,
                        zoomControl: true,
                        scaleControl: false,
                        mapTypeControl: false,
                        scrollwheel: false,
                        mapTypeControlOptions: {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                        }
                    };
                var map = new google.maps.Map(document.getElementById('google-map'), $mapOptions);

                google.maps.event.trigger(map, 'resize');

                //Associate the styled map with the MapTypeId and set it to display.
                map.mapTypes.set('map_style', styledMap);
                map.setMapTypeId('map_style');

                var marker = new google.maps.Marker({
                    position: $latlng,
                    map: map,
                    title: ""
                });

            }

        })();

    }

})(jQuery);