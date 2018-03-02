(function() {
	'use strict';

	/*----------------------------------------
		Detect Mobile
	----------------------------------------*/
	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	// for megamenu purpose
	jQuery(document).on('click', '.probootstrap-megamenu .dropdown-menu', function(e) {
	  e.stopPropagation()
	});

	/*----------------------------------------
		Menu Hover
	----------------------------------------*/
	var menuHover = function() {
		if (!isMobile.any()) {
			jQuery('.probootstrap-navbar .navbar-nav li.dropdown').hover(function() {
			  jQuery(this).find('> .dropdown-menu').stop(true, true).delay(200).fadeIn(500).addClass('animated-fast fadeInUp');
			}, function() {
				jQuery(this).find('> .dropdown-menu').stop(true, true).fadeOut(200).removeClass('animated-fast fadeInUp')
			});
		}
	}
	/*----------------------------------------
		Carousel
	----------------------------------------*/
	var owlCarousel = function(){

		var owl = jQuery('.owl-carousel-carousel');
		owl.owlCarousel({
			items: 3,
			loop: true,
			margin: 20,
			nav: true,
			dots: true,
			smartSpeed: 800,
			autoHeight: true,
			navText: [
		      "<i class='icon-keyboard_arrow_left owl-direction'></i>",
		      "<i class='icon-keyboard_arrow_right owl-direction'></i>"
	     	],
	     	responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:2
	        },
	        1000:{
	            items:3
	        }
	    	}
		});

		var owl = jQuery('.owl-carousel-fullwidth');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 20,
			nav: false,
			dots: true,
			smartSpeed: 800,
			autoHeight: true,
			autoplay: true,
			navText: [
		      "<i class='icon-keyboard_arrow_left owl-direction'></i>",
		      "<i class='icon-keyboard_arrow_right owl-direction'></i>"
	     	]
		});

		var owl = jQuery('.owl-work');
		owl.owlCarousel({
			stagePadding: 150,
			loop: true,
			margin: 20,
			nav: true,
			dots: false,
			mouseDrag: false,
			autoWidth: true,
			autoHeight: true,
	    autoplay: true,
	    autoplayTimeout:2000,
	    autoplayHoverPause:true,
			navText: [	
				"<i class='icon-chevron-thin-left'></i>",
				"<i class='icon-chevron-thin-right'></i>"
			],
			responsive:{
			  0:{
		      items:1,
		      stagePadding: 10
			  },
			  500:{
			  	items:2,
		      stagePadding: 20
			  },
			  600:{
		      items:2,
		      stagePadding: 40
			  },
			  800: {
			  	items:2,
			  	stagePadding: 100
			  },
			  1100:{
		      items:3
			  },
			  1400:{
		      items:4
			  },
			}
		});
	};

	/*----------------------------------------
		Slider
	----------------------------------------*/
	var flexSlider = function() {
	  jQuery('.flexslider').flexslider({
	    animation: "fade",
	    prevText: "",
	    nextText: "",
	    slideshow: true
	  });
	}

	/*----------------------------------------
		Feature Showcase
	----------------------------------------*/
	var showcase = function() {

		jQuery('.probootstrap-showcase-nav ul li a').on('click', function(e){

			var $this = jQuery(this),
					index = $this.closest('li').index();
							
			$this.closest('.probootstrap-feature-showcase').find('.probootstrap-showcase-nav ul li').removeClass('active');
			$this.closest('li').addClass('active');

			$this.closest('.probootstrap-feature-showcase').find('.probootstrap-images-list li').removeClass('active');
			$this.closest('.probootstrap-feature-showcase').find('.probootstrap-images-list li').eq(index).addClass('active');

			e.preventDefault();

		});

	};

	var contentWayPoint = function() {
		var i = 0;
		jQuery('.probootstrap-animate').waypoint( function( direction ) {

			if( direction === 'down' && !jQuery(this.element).hasClass('probootstrap-animated') ) {
				
				i++;

				jQuery(this.element).addClass('item-animate');
				//setTimeout(function(){

					jQuery('body .probootstrap-animate.item-animate').each(function(k){
						var el = jQuery(this);
						//setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn probootstrap-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft probootstrap-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight probootstrap-animated');
							} else {
								el.addClass('fadeInUp probootstrap-animated');
							}
							el.removeClass('item-animate');
						//},  k * 30, 'easeInOutExpo' );
					});
					
				//}, 100);
				
			}

		} , { offset: '95%' } );
	};

	var navbarState = function() {

		jQuery(window).scroll(function(){

			var $this = jQuery(this),
				 	st = $this.scrollTop();

			if ( st > 5 ) {
				jQuery('.probootstrap-navbar').addClass('scrolled');
			} else {
				jQuery('.probootstrap-navbar').removeClass('scrolled');
			}

		});
	};

	
	var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes 
            if(figureEl.nodeType !== 1) {
                continue;
            }

            linkEl = figureEl.children[0]; // <a> element
           // console.log(figureEl);
            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
            };



            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
            }

            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            } 

            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }

        return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
            return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) { 
                continue; 
            }

            if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};

        if(hash.length < 5) {
            return params;
        }

        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');  
            if(pair.length < 2) {
                continue;
            }           
            params[pair[0]] = pair[1];
        }

        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }

        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
		  var pswpElement = document.querySelectorAll('.pswp')[0],
		      gallery,
		      options,
		      items;

		  items = parseThumbnailElements(galleryElement);

		  // define options (if needed)
		  options = {

		      // define gallery index (for URL)
		      galleryUID: galleryElement.getAttribute('data-pswp-uid'),

		      getThumbBoundsFn: function(index) {
		          // See Options -> getThumbBoundsFn section of documentation for more info
		          var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
		              pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
		              rect = thumbnail.getBoundingClientRect(); 

		          return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
		      }

		  };

		  // PhotoSwipe opened from URL
		  if(fromURL) {
		      if(options.galleryPIDs) {
		          // parse real index when custom PIDs are used 
		          // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
		          for(var j = 0; j < items.length; j++) {
		              if(items[j].pid == index) {
		                  options.index = j;
		                  break;
		              }
		          }
		      } else {
		          // in URL indexes start from 1
		          options.index = parseInt(index, 10) - 1;
		      }
		  } else {
		      options.index = parseInt(index, 10);
		  }

		  // exit if index not found
		  if( isNaN(options.index) ) {
		      return;
		  }

		  if(disableAnimation) {
		      options.showAnimationDuration = 0;
		  }

		  // Pass data to PhotoSwipe and initialize it
		  gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
		  gallery.init();
		};

		// loop through all gallery elements and bind events
		var galleryElements = document.querySelectorAll( gallerySelector );

		for(var i = 0, l = galleryElements.length; i < l; i++) {
		  galleryElements[i].setAttribute('data-pswp-uid', i+1);
		  galleryElements[i].onclick = onThumbnailsClick;
		}

		// Parse URL and open gallery if it contains #&pid=3&gid=1
		var hashData = photoswipeParseHash();
		if(hashData.pid && hashData.gid) {
		  openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
		}
	};

	var galleryMasonry = function() {
		// isotope 
		if ($('.portfolio-feed').length > 0 ) {
			var $container = $('.portfolio-feed');
			$container.imagesLoaded(function() {
				$container.isotope({
				  itemSelector: '.grid-item',
				  percentPosition: true,
				  masonry: {
				    columnWidth: '.grid-sizer',
				    gutter: '.gutter-sizer'
				  }
				});
			});
		}

	//показать форму отправки отзыва
	$(document).on('click', '#review_button', function(){
		$(this).hide('slow');
		$('#review').removeClass('hide').show('slow');
	});

	//Обработка формы отправки отзыва
	$(document).on('submit', '#review_form', function(){
		event.preventDefault();

		$.ajax({
			url: '/api/review/send',
			type: 'post',
			data: $(this).serialize(),

			beforeSend: function (){
				$('#submit').html('<span class="glyphicon glyphicon-refresh rotate"></span> Отправка ...');
			},

            success: function (response) {
                //console.log(response);
                $('.form-group').removeClass('has-error');
                $('.help-block').remove();
                $('#review').hide('slow').html(response);
                setTimeout(function(){
                    $('#review').fadeIn('slow');
                }, 2000);

            },
            error: function (error, status) {

                $('.form-group').removeClass('has-error');
                $('.help-block').remove();

                var errors = error.responseJSON.errors;
                $.each(errors, function(key, value){
                    //console.log(key +' '+value);
                    $('#review_form #'+key).parents('.form-group').addClass('has-error');

                    var span = '<span class="help-block"><i>'+ value +'</i></span>';
                    $('#review_form #'+key).after(span);

                });
                $('#submit').html('Отправить еще раз');
            }

		});
	});

        //Обработка формы отправки сообщения обратной связи
        $(document).on('submit', '#feedback_form', function(){
            event.preventDefault();

            $.ajax({
                url: '/api/feedback/send',
                type: 'post',
                data: $(this).serialize(),

                beforeSend: function (){
                    $('#feedback_form #submit').html('<span class="glyphicon glyphicon-refresh rotate"></span> Отправка ...');
                },

                success: function (response) {
                    //console.log(response);
                    $('.form-group').removeClass('has-error');
                    $('.help-block').remove();
                    $('#feedback').hide('slow');
                    setTimeout(function(){
                        $('#feedback').html(response).fadeIn('slow');
                    }, 2000);

                },
                error: function (error, status) {

                    $('.form-group').removeClass('has-error');
                    $('.help-block').remove();

                    var errors = error.responseJSON.errors;
                    $.each(errors, function(key, value){
                        //console.log(key +' '+value);
                        $('#feedback_form #'+key).parents('.form-group').addClass('has-error');

                        var span = '<span class="help-block"><i>'+ value +'</i></span>';
                        $('#feedback_form #'+key).after(span);

                    });
                    $('#feedback_form #submit').html('Отправить еще раз');
                }

            });
        });

		// $('.portfolio-filter a').click(function(event){
			
		// 	$('.portfolio-filter .current').removeClass('current');
		// 	$(this).addClass('current');

		// 	var selector = $(this).attr('data-filter');
			
		// 	$container.isotope({
		// 		filter: selector,
		// 	});

		// 	event.preventDefault();
		// 	return false;

		// });
	};
        
        /*
        Set Active Item Menu
        */
        

        function setActiveItemMenu(uri){

            $(".nav").find('li').removeClass('active');
            $(".nav a[href='"+uri+"']").parents('li').addClass('active');
        }

        /**
         * Получение текущего Uri (для главной страницы обрезаем слэш) 
         * @param {string} uri
         * @returns {string}
         */
        function getUri (uri){
            if (uri.endsWith('/')){
                return uri.substring(0, uri.lastIndexOf('/'));
            } 

            return uri;
        }



	jQuery(function(){
		menuHover();
		showcase();
		contentWayPoint();
		navbarState();
		if ($('.probootstrap-gallery').length > 0) {
			initPhotoSwipeFromDOM('.probootstrap-gallery');
		}
		galleryMasonry();
                var uri = getUri(document.location.href);
                setActiveItemMenu(uri);
	});

	jQuery(window).load(function(){
		owlCarousel();
		flexSlider();

	});



})();