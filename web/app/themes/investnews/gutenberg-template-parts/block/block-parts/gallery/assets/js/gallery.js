jQuery(document).ready(function($){

    var swiperItens = [];
    $('.gallery-slider').each(function(i) {
        var this_ID = $(this).attr('id');

        console.log("#" + this_ID);
        console.log($("#" + this_ID));
        if($("#" + this_ID + " .swiper-wrapper .gallery-item").length == 1) {
            $("#" + this_ID + " .slider-prev").addClass( "disabled" );
            $("#" + this_ID + " .slider-next").addClass( "disabled" );
        }
   
        swiperItens[i] = new Swiper('#'+this_ID, {
            // Optional parameters
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        
            // If we need pagination
            pagination: {
                el: '.slider-count',
                type: 'fraction',
            },
        
            // Navigation arrows
            navigation: {
            nextEl: '.slider-next',
            prevEl: '.slider-prev',
            },
        });
    
        swiperItens[i].on('slideChange', function () {
            console.log('slide '+i+' changed');
        });
    });

})