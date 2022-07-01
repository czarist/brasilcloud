/* Autor: Ondaweb | Comunicação Digital | Lucas Cezar Trentin */
function updateViewportDimensions() {
    var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;
    return { width: x, height: y };
}
var viewport = updateViewportDimensions();
var waitForFinalEvent = (function() {
    var timers = {};
    return function(callback, ms, uniqueId) {
        if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
        if (timers[uniqueId]) { clearTimeout(timers[uniqueId]); }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();
var timeToWaitForLast = 100;

function loadGravatars() {
    viewport = updateViewportDimensions();
    if (viewport.width >= 768) {
        jQuery('.comment img[data-gravatar]').each(function() {
            jQuery(this).attr('src', jQuery(this).attr('data-gravatar'));
        });
    }
} // end function
/* Ondaweb regular jQuery */
jQuery(document).ready(function($) {

    AOS.init({
        disable: function() {
            var maxWidth = 800;
            return window.innerWidth < maxWidth;
        },
    });


    $('a[href^="#"]').on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr("href"),
            targetOffset = $(id).offset().top;

        $("html, body").animate({
                scrollTop: targetOffset - 100,
            },
            500
        );
    });

    // open menu
    document.getElementById("open-menu").onclick = function openmenu() {
        document.getElementById("close-menu").classList.remove("d-none");
        document.getElementById("close-menu").classList.add("d-flex");
        document.getElementById("open-menu").classList.add("d-none");
        document.getElementById("open-menu").classList.remove("d-flex");
        document.getElementById("menu-mobile").classList.remove("d-none");
        document.getElementById("menu-mobile").classList.add("d-flex");
    };

    // close menu
    document.getElementById("close-menu").onclick = function closemenu() {
        document.getElementById("open-menu").classList.remove("d-none");
        document.getElementById("open-menu").classList.add("d-flex");
        document.getElementById("close-menu").classList.add("d-none");
        document.getElementById("close-menu").classList.remove("d-flex");
        document.getElementById("menu-mobile").classList.add("d-none");
        document.getElementById("menu-mobile").classList.remove("d-flex");
    };

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        centeredSlides: true,
        paginationClickable: true,
        //spaceBetween: 5000,
        autoplay: {
            delay: 8000,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        //loop: true,
        // breakpoints: {
        //     // when window width is <= 320px
        //     1024: {
        //       slidesPerView: 2,
        //     },
        //     // when window width is <= 480px
        //     768: {
        //       slidesPerView: 1,
        //       spaceBetween: 20
        //     }
        //   }
    });



    loadGravatars();

});