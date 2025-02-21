jQuery(document).ready(function ($) {
    $('.singular-post .top .share .share-button').on('click', function() {
        $('body').toggleClass('share-active');
        $(this).parent().toggleClass('active');
    })
    $('#copy-link-button').on('click', function(e) {

        // Copy to clipboard
        e.preventDefault();
        var copyText = $(this).attr('href');
        
        document.addEventListener('copy', function(e) {
            e.clipboardData.setData('text/plain', copyText);
            e.preventDefault();
        }, true);
        
        document.execCommand('copy');  
        console.log('copied text : ', copyText);

        // Create alert box
        $('.singular-post').after('<div class="link-copy-alert"><div class="container"><div>Link copiado</div></div></div>')
        setTimeout(function() {
            $('.link-copy-alert').toggleClass('show');
        }, 500);
        setTimeout(function() {
            $('.link-copy-alert').toggleClass('show');
        }, 5000);
        setTimeout(function() {
            $('.single-post').find('.link-copy-alert').remove();
        }, 6000);
    })
    $('#print-button').on('click', function() {
        $('.singular-post .top .share').removeClass('active');
    })
});