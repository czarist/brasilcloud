/* Autor: | Lucas Cezar Trentin */

jQuery(document).ready(function($) {

    // faz aparecer e desaparecer os blocos da home;
    // "body.contains" verifica se os elementos existem, para não conflitar em outras páginas;

    //Breakpoints do swipper não estavam funcionando
    let slidersCounter;
    let slidersCounter2;

    //elementos selecionados pelas classes
    let menus_itens = document.getElementsByClassName('menu-item');
    let servicos_bloco = document.getElementsByClassName('servicos-bloco');
    let the_rangers = document.getElementsByClassName('the-rangers');
    let the_ranged = document.getElementsByClassName('the_ranged');

    //elementos selecionados pelos ID's
    let mais_servicos = document.getElementById('mais_servicos');
    let menos_servicos = document.getElementById('menos_servicos');
    let ajaxLoad = document.getElementById('ajaxLoad');
    let myparticles = document.getElementById('my-particles-1');
    let open_menu = document.getElementById("open-menu");
    let close_menu = document.getElementById("close-menu");
    let menu_mobile = document.getElementById("menu-mobile");
    let imgLogo = document.getElementById('imgLogo');
    let header = document.getElementById("header");
    let the_outside = document.getElementById('the_outside');
    let hidden_menu = document.getElementById('hidden-menu');
    let close_the_main_menu = document.getElementById('close-desktop-menu');
    let InstitucionalMenu = document.getElementById('Institucional-menu');
    let duvidas_select = document.getElementById('duvidas-select');

    // links fixos 
    const home_url = document.getElementById('home_url').value;
    const get_template_directory_uri = document.getElementById('get_template_directory_uri').value;

    // constante para widht máximo
    const maxWidth = 800;

    // FUNÇÕES

    // funções scroll do header
    function mudaHeader() {
        header.classList.remove("header-menor");
        header.classList.add("header-maior");
        imgLogo.src = `${get_template_directory_uri}/library/images/logo.svg`;
    }

    function voltaHeader() {
        header.classList.add("header-menor");
        header.classList.remove("header-maior");
        imgLogo.src = `${get_template_directory_uri}/library/images/logo2.svg`;
    }

    //direciona para o link de categoria
    function handleSelect(elm) {
        window.location = elm.value;
    }

    // funcões que abrem e fecham menu do mobile
    function openmenu() {
        close_menu.classList.remove("d-none");
        close_menu.classList.add("d-flex");
        open_menu.classList.add("d-none");
        open_menu.classList.remove("d-flex");
        menu_mobile.classList.remove("d-none");
        menu_mobile.classList.add("d-flex");
    }

    function closemenu() {
        open_menu.classList.remove("d-none");
        open_menu.classList.add("d-flex");
        close_menu.classList.add("d-none");
        close_menu.classList.remove("d-flex");
        menu_mobile.classList.add("d-none");
        menu_mobile.classList.remove("d-flex");
    }

    //abre e fecha menu principal
    function fechaMenus() {
        if (!the_outside.classList.contains('d-none')) {
            the_outside.classList.add('d-none');
        }

        if (!hidden_menu.classList.contains('d-none')) {
            hidden_menu.classList.add('d-none');
            hidden_menu.classList.remove('d-flex');
        }

        if (hidden_menu.classList.contains('sup-nav')) {
            hidden_menu.classList.remove('sup-nav')
        }

        if (InstitucionalMenu.classList.contains('triangulo-menu')) {
            InstitucionalMenu.classList.remove('triangulo-menu')
        }

        for (let j = 0; j < menus_itens.length; j++) {

            if (menus_itens[j].classList.contains('triangulo-menu')) {
                menus_itens[j].classList.remove('triangulo-menu');
            }

        }

        document.body.classList.remove('overflow-hidden');
    }

    function mostraMenus(id) {
        if (the_outside.classList.contains('d-none')) {
            the_outside.classList.remove('d-none');
        }
        if (hidden_menu.classList.contains('d-none')) {
            hidden_menu.classList.remove('d-none');
            hidden_menu.classList.add('d-flex');
        }
        for (let j = 0; j < menus_itens.length; j++) {
            if (menus_itens[j].classList.contains('triangulo-menu')) {
                menus_itens[j].classList.remove('triangulo-menu');
            }
        }
        for (let q = 0; q < hidden_menu.querySelectorAll('.row').length; q++) {
            let hidden_row = hidden_menu.querySelectorAll('.row')[q];
            hidden_row.classList.add('d-none')
            if (hidden_row.classList.contains(id)) {
                hidden_row.classList.remove('d-none');
            }
        }

        document.body.classList.add('overflow-hidden');
    }

    // FIM DAS FUNÇÕES

    // EVENTOS 

    //evento scroll do header
    document.addEventListener("scroll", () => {

        if (window.pageYOffset === 0) {
            mudaHeader();
        } else {
            voltaHeader()
        }

    });

    if (window.outerWidth > maxWidth) {
        slidersCounter = 4;
        slidersCounter2 = 3;
    } else {
        slidersCounter = 1;
        slidersCounter2 = 1;
    }

    // open menu mobile
    open_menu.onclick = function() {
        openmenu();
    };

    // close menu mobile
    close_menu.onclick = function() {
        closemenu()
    };

    //abre o menu do header
    for (let k = 0; k < menus_itens.length; k++) {
        menus_itens[k].onclick = function() {
            mostraMenus(this.id);
            this.classList.add('triangulo-menu')
        }
    }

    the_outside.onclick = function() {
        fechaMenus();
    }

    close_the_main_menu.onclick = function() {
        fechaMenus();
    }

    InstitucionalMenu.onclick = function() {
        mostraMenus(this.id);
        this.classList.add('triangulo-menu');
        this.classList.add('position-relative');
        hidden_menu.classList.add('sup-nav');
    }

    // esconde os ultimos blocos

    if (servicos_bloco.length <= 6) {
        for (let a = 0; a < servicos_bloco.length; a++) {
            servicos_bloco[a].classList.remove('d-none');
        }
    } else {
        for (let a = 0; a < 6; a++) {
            servicos_bloco[a].classList.remove('d-none');
        }
    }

    if (document.body.contains(duvidas_select)) {
        duvidas_select.onchange = function() {
            handleSelect(this);
        }
    }

    // FIM DOS EVENTOS 


    //mostra mais publicações

    if (document.body.contains(mais_servicos)) {

        mais_servicos.onclick = function() {

            // remove o botão de ver mais
            mais_servicos.classList.add('d-none');
            mais_servicos.classList.remove('d-flex');

            // mostra botão do ajax
            ajaxLoad.classList.remove('d-none');

            //funcao do setTimeOut
            function mostrar() {

                // mostra todos os blocos
                for (let a = 0; a < servicos_bloco.length; a++) {
                    servicos_bloco[a].classList.remove('d-none');
                }

                // mostra o botão de ver menos
                menos_servicos.classList.add('d-flex');
                menos_servicos.classList.remove('d-none');

                //esconde botão do ajax
                ajaxLoad.classList.add('d-none')
            }

            setTimeout(function() { mostrar() }, 2000);
        }
    }
    if (document.body.contains(menos_servicos)) {

        menos_servicos.onclick = function() {

            // mostra o botão de ver mais
            mais_servicos.classList.add('d-flex');
            mais_servicos.classList.remove('d-none');

            // esconder o botão de ver menos
            menos_servicos.classList.add('d-none');
            menos_servicos.classList.remove('d-flex');

            // esconde os ultimos blocos
            for (let a = 6; a < servicos_bloco.length; a++) {
                servicos_bloco[a].classList.add('d-none');
            }
        }
    }

    // fim da parte dos serviços da home

    // abas dos planos
    if (document.body.contains(the_rangers[0])) {

        for (let a = 0; a < the_rangers.length; a++) {
            the_rangers[a].onclick = function() {

                for (let i = 0; i < the_rangers.length; i++) {
                    the_rangers[i].classList.remove('activated');
                }

                for (let q = 0; q < the_ranged.length; q++) {

                    if (the_ranged[q].classList.contains(this.id)) {
                        the_ranged[q].classList.add('d-flex')
                        the_ranged[q].classList.remove('d-none')
                    } else if (!the_ranged[q].classList.contains(this.id)) {
                        the_ranged[q].classList.remove('d-flex')
                        the_ranged[q].classList.add('d-none')
                    }

                }

                this.classList.add('activated');
            }
        }
    }
    // fim abas dos planos

    // inicia bilbioteca do AOS

    AOS.init({
        disable: function() {
            return window.innerWidth < maxWidth;
        },
    });

    const swiper = new Swiper('.swiper', {
        slidesPerView: 'auto',
        centeredSlides: true,
        paginationClickable: true,
        autoplay: {
            delay: 8000,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        loop: true,

    });

    const swiper2 = new Swiper('.swiper2', {
        slidesPerView: slidersCounter,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination2',
            clickable: true,
        }
    });

    const swiper3 = new Swiper('.swiper3', {
        slidesPerView: slidersCounter2,
        spaceBetween: 40,
        pagination: {
            el: '.swiper-pagination3',
            clickable: true,
        }
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

    // particles home 
    if (document.body.contains(myparticles)) {
        // carrega somente em resoluções horizontais maiores que 800px
        if (window.outerWidth > maxWidth) {
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

        }
    }

});