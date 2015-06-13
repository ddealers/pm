var isLogin = false;
$( document ).ready(function() {

    // INICIO en ESC Key y Fuera del Modal
    $(document).click(function (e) {
        if (e.target === $('#modal-login')[0] && $('body').hasClass('modal-open')) {
            console.log('backdrop click  modal');
            $('.actions-form.log-in').removeClass('hidden').addClass('active');
            $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
            $('.actions-form.sing-up').removeClass('active').addClass('hidden');
            $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
            $('.actions-form.register-login').removeClass('active').addClass('hidden');
            $('.modal-content').css('height','547');
        }
    });
    $(document).keyup(function (e) {
        if (e.which == 27 && $('body').hasClass('modal-open')) {
            console.log('esc')
            console.log('backdrop esc modal');
            $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
            $('.actions-form.sing-up').removeClass('active').addClass('hidden');
            $('.actions-form.log-in').removeClass('hidden').addClass('active');
            $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
            $('.actions-form.register-login').removeClass('active').addClass('hidden');
            $('.modal-content').css('height','547');
        }
    });

    //setOvers('');
    //changeHeader();
    //////////////////////
    ////////////////////// Login Modal
    $('.changemodal').on('click', function () {
        var LogModal = $('.actions-form.log-in').hasClass('active');
        var SUModal = $('.actions-form.sing-up').hasClass('active');
        var PassModal = $(this).hasClass('forget-pass');
        var TwitterModal = $(this).hasClass('twitter2');
        var CloseAll = $(this).hasClass('close');
        var SUModal2 = $(this).hasClass('initia');
        var Create = $(this).hasClass('pm-button');




        $('.modal-content').css('height','547');


        if (PassModal) {
            console.log('Password modal');
            $('.actions-form.forget-pass').removeClass('hidden').addClass('active');
            $('.actions-form.sing-up').removeClass('active').addClass('hidden');
            $('.actions-form.log-in').removeClass('active').addClass('hidden');
            $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
            $('.actions-form.register-login').removeClass('active').addClass('hidden');
            $('.modal-content').css('height','345');
        }
            else {
            PassModal = $('.actions-form.forget-pass').hasClass('active');

            if (LogModal) {
                console.log('Crear Cuenta modal');
                $('.actions-form.register-login').removeClass('hidden').addClass('active');
                $('.actions-form.log-in').removeClass('active').addClass('hidden');
                $('.actions-form.sing-up').removeClass('active').addClass('hidden');
                $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
                $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
                $('.modal-content').css('height','360');

            }
            if (Create) {
                console.log('Crear Cuenta modal');
                $('.actions-form.register-login').removeClass('active').addClass('hidden');
                $('.actions-form.log-in').removeClass('active').addClass('hidden');
                $('.actions-form.sing-up').removeClass('hidden').addClass('active');
                $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
                $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
                $('.modal-content').css('height','547');

            }
            if (SUModal) {
                console.log('Inicia modal modal');
                $('.actions-form.sing-up').removeClass('active').addClass('hidden');
                $('.actions-form.log-in').removeClass('hidden').addClass('active');
                $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
                $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
                $('.actions-form.register-login').removeClass('active').addClass('hidden');
                $('.modal-content').css('height','547');
            }
            if (SUModal2) {
                console.log('INITIA modal modal');
                $('.actions-form.sing-up').removeClass('active').addClass('hidden');
                $('.actions-form.log-in').removeClass('hidden').addClass('active');
                $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
                $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
                $('.actions-form.register-login').removeClass('active').addClass('hidden');
                $('.modal-content').css('height','547');
            }
            if (PassModal) {
                console.log('login modal');
                $('.actions-form.sing-up').removeClass('active').addClass('hidden');
                $('.actions-form.log-in').removeClass('hidden').addClass('active');
                $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
                $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
                $('.actions-form.register-login').removeClass('active').addClass('hidden');
                $('.modal-content').css('height','547');
            }
            if (TwitterModal) {
                console.log('Twitt modal');
                $('.actions-form.twitter-login').removeClass('hidden').addClass('active');
                $('.actions-form.sing-up').removeClass('active').addClass('hidden');
                $('.actions-form.log-in').removeClass('active').addClass('hidden');
                $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
                $('.actions-form.register-login').removeClass('active').addClass('hidden');

                $('.modal-content').css('height','345');
            }
            if (CloseAll) {
                console.log('close modal');
                $('.actions-form.twitter-login').removeClass('active').addClass('hidden');
                $('.actions-form.sing-up').removeClass('active').addClass('hidden');
                $('.actions-form.log-in').removeClass('hidden').addClass('active');
                $('.actions-form.forget-pass').removeClass('active').addClass('hidden');
                $('.actions-form.register-login').removeClass('active').addClass('hidden');

                $('.modal-content').css('height','547');
            }



        }
    });
});
/******************************
 ******************/



function changeHeader() {
    ///////////// FIXED MENU
    var menu = $('#header .navbar-nav');
    var contenedor = $('#header');
    var menu_offset = menu.offset();
    $(window).on('scroll', function() {
        if( $(window).width() > 767 ) {
            if($(window).scrollTop() > menu_offset.top + 65) {
                $('#header-min').addClass('opened');
                $('#menus').addClass('min-version');
            }else {
                $('#header-min').removeClass('opened');
                $('#menus').removeClass('min-version');
            }
        }
    });
}

function registroOk(){
    $('#modal-alert .modal-body .alert-header').html("¡Ya eres parte de PM!");
    $('#modal-alert .modal-body .alert-body').html("Ahora puedes ver videos, coleccionar insinias, crear grupos, calificar contenidos, competir, diviertete con tus amigos, navegar, interactuar y canjear tokes.");
    $('#modal-alert .modal-body .alert-button').html(" <a> Ir a INSIDER PM! </a>");

}
