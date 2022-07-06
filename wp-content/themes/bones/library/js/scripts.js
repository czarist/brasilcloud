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

    // particles home 
    particlesJS(`my-particles-1`, {
        particles: {
            number: {
                value: 100,
                density: {
                    enable: true,
                    value_area: 800,
                },
            },
            color: {
                value: '#eeeeee',
            },
            shape: {
                type: 'circle',
                stroke: {
                    width: 0,
                    color: '#000000',
                },
                polygon: {
                    nb_sides: 5,
                },
                image: {
                    src: 'img/github.svg',
                    width: 100,
                    height: 100,
                },
            },
            opacity: {
                value: 1,
                random: false,
                anim: {
                    enable: false,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false,
                },
            },
            size: {
                value: 3,
                random: true,
                anim: {
                    enable: false,
                    speed: 40,
                    size_min: 0.1,
                    sync: false,
                },
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#eeeeee',
                opacity: 1,
                width: 1,
            },
            move: {
                enable: true,
                speed: 6,
                direction: 'none',
                random: false,
                straight: false,
                out_mode: 'out',
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200,
                },
            },
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: {
                    enable: false,
                    mode: 'repulse',
                },
                onclick: {
                    enable: false,
                    mode: 'push',
                },
                resize: true,
            },
            modes: {
                grab: {
                    distance: 400,
                    line_linked: {
                        opacity: 1,
                    },
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3,
                },
                repulse: {
                    distance: 200,
                    duration: 0.4,
                },
                push: {
                    particles_nb: 4,
                },
                remove: {
                    particles_nb: 2,
                },
            },
        },
        retina_detect: false,
    });


    var swiper = new Swiper('.swiper', {
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
        loop: true,
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


    function consultar_registro() {
        var dominio = $('#dominio').val();
        var extensao = $('#extensao').val();
        if (dominio != '') {
            $('#resultado_registro').show();
            $('#btn_registro').addClass('disabled').html('Aguarde...');
            $('#resultado_registro').prepend('<tr class="consultando_registro"><td colspan="3">Consultando Registro, Pode levar alguns segundos...</td></tr>');
            $.ajax({
                url: "https://brasilcloud.com.br/whois/?dominio[]=" + dominio + extensao,
                dataType: "json",
                error: function() {
                    consultar_registro();
                },
                success: function(dados) {
                    $('#resultado_registro').prepend('<tr><td colspan="3"><hr /></td></tr>');
                    $('#btn_registrar').show();
                    $('#msg_registrar').show();
                    $('.consultando_registro').remove();
                    $.each(dados, function(i, dominio) {
                        var html_input = '';
                        var str_registrado = '<b style="color: #199900;">Disponível para registro</b> - Valor Anual: R$ ' + dominio.valor_formatado;
                        if (dominio.registrado == 1) {
                            str_registrado = 'Domínio já Registrado';
                        } else {
                            html_input = '<input style="margin-bottom: 0px; padding-bottom: 0px;" type="checkbox" name="registrar[' + i + ']" value="' + i + '">';
                        }
                        $('#resultado_registro').prepend('<tr><td class="text-center">' + html_input + '</td><td><b>' + i + '</b></td><td>' + str_registrado + '</td></tr>');
                    });
                    $('#btn_registro').removeClass('disabled').html('<i class="fi-zoom-in"> </i> Pesquisar');
                }
            });
        }
    }


    loadGravatars();

});