jQuery(document).ready(function ($) {
    $('#newsletter-form').on('submit', function (event) {
        event.preventDefault(); 

        var form = $(this).closest('form');
        var parent = $(this ).closest('.newsletter-content ');
        var isPageNewsletter =  $('body').hasClass('page-template-page-newsletter'); 
        var isPageSingle =  $('body').hasClass('single'); 
        var emailInput = $("#emailnews").val();
      
        form_disabled = true;

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'save_contato',
                email: emailInput,
            },
            success: function (response) {
                if (!response.success) {
                    $(".news-conteudo h1").html('<span>Erro ao cadastrar e-mail</span>');
                    $(".page_newsletter_subtitle").html(response.data);
             
                    form_disabled = false;
                } else {
                    $(".news-conteudo h1").html('<span>E-mail cadastrado com sucesso</span>');
                    $(".page_newsletter_subtitle").html("Agora, você receberá em primeira mão todas as novidades do mundo dos negócios diretamente no seu e-mail");
                }
            },
            error: function () {
                form_disabled = false;
            },
            complete: function () {
            }
        });
    });
});