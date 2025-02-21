jQuery(document).ready(function($) {
    // Header
    $('#header-investnews .logo-button').on('click', function () {
        dataLayer.push({
            'event': 'header_cta_newsletter',
            'event_type': 'clique',
            'event_category': 'newsletter',
            'posicao': 'header'
        });
    });
    // New menu | centered menu open
    $('#header-investnews .mid .header-menu .menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
        $('#header-investnews .mid .header-menu .menu-item-has-children').removeClass('open');
        $(this).parent().addClass('open');
    });

    $('#header-investnews').on('mouseleave', function () {
        $('#header-investnews .mid .header-menu .menu-item-has-children').removeClass('open');
    })

    $('#header-investnews .side-menu-button, #header-investnews side-menu-button.mobile').on('click', function() {
        $('#header-investnews .side-menu-button, #header-investnews side-menu-button.mobile').toggleClass('clicked')
        $('#header-investnews, #header-investnews .side-menu').toggleClass('open');
        $('body').toggleClass('menu-open');
    })

    // Side menu mobile
    $('#side-menu-header-mobile .menu-item-has-children > a').on('click', function (e) {
        e.preventDefault(); // Impede o comportamento padrão do link
        const parent = $(this).parent('.menu-item-has-children');
        
        parent.toggleClass('open');
        parent.find('> .sub-menu').toggleClass('open');
    });

    $(window).scroll(function(){
        var menuHeight = $('#header-investnews').height();
        if($(this).scrollTop()>=(menuHeight)){
            $('#header-investnews:not(.slim)').addClass('scrolled');
        }
        if($(this).scrollTop()>=(menuHeight + (menuHeight / 3))){
            $('#header-investnews:not(.slim)').addClass('short');
        }
        if($(this).scrollTop() == 0) {
            $('#header-investnews:not(.slim)').removeClass('short scrolled');
        }
    })    
})