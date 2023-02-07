$(document).ready(function(){

$(".cat-more").on("click", function(){
    $(this).parent().toggleClass("open");
    $(this).parent().find(".child_ul").slideToggle();
})


$(".header__cart").on("click", function(){
    $("body").toggleClass("cart-open");
})

$(".cart-aside .head .list-close").on("click", function(){
    $("body").removeClass("cart-open");
})
$("#overlay").on("click", function(){
    $("body").removeClass("cart-open");
})

 $('.JS__main__slider').owlCarousel({
        items:1,
        lazyLoad:true,
        loop:true,
        margin:0,
        nav: true,
        mouseDrag: false,
        autoplay: true,
        dots: false,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        navText: ['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
        responsive : {
            0 : {
                mouseDrag: true,
            },
            768 : {
                mouseDrag: false,
            }
        }
    });


});




// lazyload
(function (w, d, n) {
    'use strict';

    var BeLazy;

    if (!BeLazy) {
        var windowHeight = w.innerHeight || d.documentElement.clientHeight,
            // When resizing or scrolling, hundreds to thousands events can be send.
            // Instead of executing the listeners on every single event, we only
            // execute the logic every X miliseconds the configured values are
            // determined based on the research results from Ph.D. Steven C. Seow.
            resizeTimeout    = null,
            scrollTimeout    = null,
            resizeHandlerSet = false,
            scrollHandlerSet = false,
            listeners = {},
            listenersDone = 0,
            listenerCount = 0,

            addEventListener = (function () {
                var overwrite;
                if (w.addEventListener) {
                    overwrite = function(type, listener, element) {
                        element.addEventListener(type, listener, false);
                    };
                } else if (w.attachEvent) {
                    overwrite = function(type, listener, element) {
                        element.attachEvent('on' + type, listener);
                    };
                }

                return overwrite;
            })(),

            removeEventListener = (function () {
                var overwrite;
                if (w.removeEventListener) {
                    overwrite = function(type, listener, element) {
                        element.removeEventListener(type, listener, false);
                    };
                } else if (w.detachEvent) {
                    overwrite = function(type, listener, element) {
                        element.detachEvent('on' + type, listener);
                    };
                }

                return overwrite;
            })(),

            getTopOffset = function(element) {
                var offset = 0;
                if (typeof element.offsetParent === 'object') {
                    while (element && typeof element.offsetParent === 'object') {
                        offset += element.offsetTop;
                        element = element.offsetParent;
                    }
                } else {
                    offset = element.offsetTop;
                }

                return offset;
            },

            updateListeners = function () {
                if (listenerCount < 1) {
                    return;
                }

                var scrollTop = w.pageYOffset || d.documentElement.scrollTop,
                    listenerIndex,
                    listener;

                for (listenerIndex in listeners) {
                    if (listeners.hasOwnProperty(listenerIndex)) {
                        listener = listeners[listenerIndex];
                        listener.offset = getTopOffset(listener.elem);

                        if (!listener.handled && scrollTop >= (listener.offset - windowHeight)) {
                            listenersDone += 1;
                            listener.handled = true;

                            listener.onready(listener.elem);
                        }
                    }
                }

                if (listenersDone === listenerCount) {
                    removeEventListener('scroll', onScrollHandler, w);
                    removeEventListener('resize', resetWindowHeight, w);
                    scrollHandlerSet = false;
                    resizeHandlerSet = false;
                }

                scrollTimeout = null;
            },

            onScrollHandler = function () {
                // Prevent massive js execution on fast/long scrolling.
                if (null === scrollTimeout) {
                    scrollTimeout = w.setTimeout(function () {
                        updateListeners();
                    }, 50);// Fairly unnoticable number.
                }
            },

            resetWindowHeight = function () {
                if (null === resizeTimeout) {
                    resizeTimeout = w.setTimeout(function () {
                        windowHeight = w.innerHeight || d.documentElement.clientHeight;
                        resizeTimeout = null;
                        // Check if something became visible after the resize.
                        onScrollHandler();
                    }, 100);
                }
            },

            addScrollListener = function (element, listener) {
                listenerCount += 1;
                listeners[listenerCount] = {
                    elem: element,
                    onready: listener,
                    offset: getTopOffset(element)
                };

                if (false === resizeHandlerSet) {
                    addEventListener('resize', resetWindowHeight, w);
                    resizeHandlerSet = true;
                }

                if (false === scrollHandlerSet) {
                    if (n.userAgent.match(/webkit/i) && n.userAgent.match(/mobile/i)) {
                        // iPad, iPhone, Android etc.
                        addEventListener('touchmove', onScrollHandler, w);
                    } else {
                        addEventListener('scroll', onScrollHandler, w);
                    }

                    scrollHandlerSet = true;
                }

                // Directly check if the element is visible once added.
                onScrollHandler();

                return element;
            };

        BeLazy = {
            until: function(action, element, listener) {
                if (action === 'visible') {
                    return addScrollListener(element, listener);
                }

                // Remove event after execution.
                var destructor = function () {
                    removeEventListener(action, destructor, element);
                    listener.call();
                };

                // Set the event listener.
                addEventListener(action, destructor, element);

                return element;
            }
        };
    }

    if (typeof define === 'function' && define.amd) {
        // AMD support.
        define(function () { return BeLazy; });
    } else if (typeof exports !== 'undefined') {
        // CommonJS support.
        exports.BeLazy = BeLazy;
    } else {
        w.BeLazy = BeLazy;
    }
})(window, window.document, window.navigator);


// Implementation of the BeLazy module.
(function(d) {
    'use strict';

    var i,
        images = d.getElementsByTagName('img'),
        regEx = /(^|\s+)lazyload(\s+|$)/;

    for (i = 0; i < images.length; i++) {
        // Check for `lazyload` class.
        if (regEx.test(images[i].className)) {
            (function(image) {
                image.onload = function() {
                    // Remove `lazyload` class.
                    image.className = image.className.replace(regEx, ' ');
                };

                // Add the BeLazy lazyloading.
                BeLazy.until('visible', image, function(image) {
                    image.src = [
                        image.getAttribute('data-src'),
                        //'http://lorempixel.com/640/400?'    // unique images for demonstration
                        //Math.random().toString(16).substr(2) // cache busting unique string
                    ].join('');
                });
            })(images[i]);
        }
    }
})(window.document);

