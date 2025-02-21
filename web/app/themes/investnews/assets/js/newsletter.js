jQuery(document).ready(function ($) {
    $('.newsletter-form').on('submit', function (event) {
        event.preventDefault(); 

        var form = $(this).closest('form');
        var parent = $(this ).closest('.newsletter-content ');
        var isPageNewsletter =  $('body').hasClass('page-template-page-newsletter'); 
        var isPageSingle =  $('body').hasClass('single'); 
        var isPageHome =  $('body').hasClass('home'); 
        var emailInput = $("#emailnews").val();
        console.log(emailInput);
        if (!emailInput) {
            return;
        }

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
                    if (isPageNewsletter) {
                        $(".container-conteudo__busca > h1").html('<span>Erro ao cadastrar e-mail</span>');
                        $(".page_newsletter_subtitle").html(response.data);
                    } else if (isPageSingle) {
                        jQuery('body').addClass('newsletter-false');
                        jQuery('h2.title-news').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m p').html(response.data);
                        jQuery('p.descrip-news').html(response.data);
                    } else {
                        jQuery('body').addClass('newsletter-false');
                        jQuery('h2.title-news').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m p').html(response.data);
                        jQuery('p.descrip-news').html(response.data);
                    }
                    form_disabled = false;
                } else {
                    console.log(response);
                    if (isPageNewsletter) {
                        jQuery(parent).find(".container-conteudo__busca > h1").html('<span>E-mail cadastrado com sucesso</span>');
                        jQuery(parent).find(".container-conteudo__busca > .page_newsletter_subtitle").html("Agora, você receberá em primeira mão todas as novidades do mundo dos negócios diretamente no seu e-mail");
                        jQuery(parent).find(".carteiras__newsletter__email").val('');
                        var formEventHome = jQuery(".page_newsletter input[name='form_event']").val();
                        var formPositionHome = jQuery(".page_newsletter input[name='form_position']").val();
                        dataLayer.push({
                            'event': formEventHome,
                            'event_type': 'clique',
                            'event_category': 'newsletter',
                            'posicao': formPositionHome,
                            'origem': newsletterOrigin
                        });
                            window.dataLayer = window.dataLayer || [];
                            window.dataLayer.push({
                                'event': 'form_submit_newsletter',
                                'posicao': 'page_newsletter',
                            });
                    }else if (isPageSingle) {
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');
                        window.dataLayer = window.dataLayer || [];
                        window.dataLayer.push({
                            'event': 'form_submit_newsletter',
                            'posicao': 'box_materia',
                        });
                    }else if(isPageHome){
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');
                        window.dataLayer = window.dataLayer || [];
                        window.dataLayer.push({
                            'event': 'form_submit_newsletter',
                            'posicao': 'box_home',
                        });
                    } else {
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');

                        // dataLayer.push({
                        //     'event': formEvent,
                        //     'event_type': 'clique',
                        //     'event_category': 'newsletter',
                        //     'posicao': formPosition,
                        //     'origem': newsletterOrigin
                        // });
                    }
                }
            },
            error: function () {
                form_disabled = false;
            },
            complete: function () {
            }
        });
    });
    $('.newsletter-form2').on('submit', function (event) {
        event.preventDefault(); 

        var form = $(this).closest('form');
        var parent = $(this ).closest('.newsletter-content ');
        var isPageNewsletter =  $('body').hasClass('page-template-page-newsletter'); 
        var isPageSingle =  $('body').hasClass('single'); 
        var isPageHome =  $('body').hasClass('home'); 
        var emailInput2 = $("#emailnews2").val();
        console.log(emailInput2);
        if (!emailInput2) {
            return;
        }

        form_disabled = true;

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'save_contato',
                email: emailInput2,
            },
            success: function (response) {
                if (!response.success) {
                    if (isPageNewsletter) {
                        $(".container-conteudo__busca > h1").html('<span>Erro ao cadastrar e-mail</span>');
                        $(".page_newsletter_subtitle").html(response.data);
                    } else if (isPageSingle) {
                        jQuery('body').addClass('newsletter-false');
                        jQuery('h2.title-news').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m p').html(response.data);
                        jQuery('p.descrip-news').html(response.data);
                    } else {
                        jQuery('body').addClass('newsletter-false');
                        jQuery('h2.title-news').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m p').html(response.data);
                        jQuery('p.descrip-news').html(response.data);
                    }
                    form_disabled = false;
                } else {
                    console.log(response);
                    if (isPageNewsletter) {
                        jQuery(parent).find(".container-conteudo__busca > h1").html('<span>E-mail cadastrado com sucesso</span>');
                        jQuery(parent).find(".container-conteudo__busca > .page_newsletter_subtitle").html("Agora, você receberá em primeira mão todas as novidades do mundo dos negócios diretamente no seu e-mail");
                        jQuery(parent).find(".carteiras__newsletter__email").val('');
                        var formEventHome = jQuery(".page_newsletter input[name='form_event']").val();
                        var formPositionHome = jQuery(".page_newsletter input[name='form_position']").val();
                        dataLayer.push({
                            'event': formEventHome,
                            'event_type': 'clique',
                            'event_category': 'newsletter',
                            'posicao': formPositionHome,
                            'origem': newsletterOrigin
                        });
                            window.dataLayer = window.dataLayer || [];
                            window.dataLayer.push({
                                'event': 'form_submit_newsletter',
                                'posicao': 'page_newsletter',
                            });
                    }else if (isPageSingle) {
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');
                        window.dataLayer = window.dataLayer || [];
                        window.dataLayer.push({
                            'event': 'form_submit_newsletter',
                            'posicao': 'box_materia',
                        });
                    }else if(isPageHome){
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');
                        window.dataLayer = window.dataLayer || [];
                        window.dataLayer.push({
                            'event': 'form_submit_newsletter',
                            'posicao': 'box_home',
                        });
                    } else {
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');

                        // dataLayer.push({
                        //     'event': formEvent,
                        //     'event_type': 'clique',
                        //     'event_category': 'newsletter',
                        //     'posicao': formPosition,
                        //     'origem': newsletterOrigin
                        // });
                    }
                }
            },
            error: function () {
                form_disabled = false;
            },
            complete: function () {
            }
        });
    });
    $('.newsletter-form3').on('submit', function (event) {
        event.preventDefault(); 

        var form = $(this).closest('form');
        var parent = $(this ).closest('.newsletter-content ');
        var isPageNewsletter =  $('body').hasClass('page-template-page-newsletter'); 
        var isPageSingle =  $('body').hasClass('single'); 
        var isPageHome =  $('body').hasClass('home'); 
        var emailInput3 = $("#emailnews3").val();;
        console.log(emailInput3);
        if (!emailInput3) {
            return;
        }

        form_disabled = true;

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'save_contato',
                email: emailInput3,
            },
            success: function (response) {
                if (!response.success) {
                    if (isPageNewsletter) {
                        $(".container-conteudo__busca > h1").html('<span>Erro ao cadastrar e-mail</span>');
                        $(".page_newsletter_subtitle").html(response.data);
                    } else if (isPageSingle) {
                        jQuery('body').addClass('newsletter-false');
                        jQuery('h2.title-news').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m p').html(response.data);
                        jQuery('p.descrip-news').html(response.data);
                    } else {
                        jQuery('body').addClass('newsletter-false');
                        jQuery('h2.title-news').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Erro ao cadastrar e-mail');
                        jQuery('.newsletter.new-m p').html(response.data);
                        jQuery('p.descrip-news').html(response.data);
                    }
                    form_disabled = false;
                } else {
                    console.log(response);
                    if (isPageNewsletter) {
                        jQuery(parent).find(".container-conteudo__busca > h1").html('<span>E-mail cadastrado com sucesso</span>');
                        jQuery(parent).find(".container-conteudo__busca > .page_newsletter_subtitle").html("Agora, você receberá em primeira mão todas as novidades do mundo dos negócios diretamente no seu e-mail");
                        jQuery(parent).find(".carteiras__newsletter__email").val('');
                        var formEventHome = jQuery(".page_newsletter input[name='form_event']").val();
                        var formPositionHome = jQuery(".page_newsletter input[name='form_position']").val();
                        dataLayer.push({
                            'event': formEventHome,
                            'event_type': 'clique',
                            'event_category': 'newsletter',
                            'posicao': formPositionHome,
                            'origem': newsletterOrigin
                        });
                            window.dataLayer = window.dataLayer || [];
                            window.dataLayer.push({
                                'event': 'form_submit_newsletter',
                                'posicao': 'page_newsletter',
                            });
                    }else if (isPageSingle) {
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');
                        window.dataLayer = window.dataLayer || [];
                        window.dataLayer.push({
                            'event': 'form_submit_newsletter',
                            'posicao': 'box_materia',
                        });
                    }else if(isPageHome){
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');
                        window.dataLayer = window.dataLayer || [];
                        window.dataLayer.push({
                            'event': 'form_submit_newsletter',
                            'posicao': 'box_home',
                        });
                    } else {
                        jQuery('body').removeClass('newsletter-false');
                        jQuery(parent).removeClass('.red');
                        jQuery('body').addClass('newsletter-true');
                        jQuery('h2.title-news').html('Daily InvestNews');
                        jQuery('.newsletter.new-m .top-new-mb h2').html('Daily InvestNews');
                        jQuery('p.descrip-news').html('A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail');

                        // dataLayer.push({
                        //     'event': formEvent,
                        //     'event_type': 'clique',
                        //     'event_category': 'newsletter',
                        //     'posicao': formPosition,
                        //     'origem': newsletterOrigin
                        // });
                    }
                }
            },
            error: function () {
                form_disabled = false;
            },
            complete: function () {
            }
        });
    });

    jQuery('.back-news').click(function() {
        jQuery('body').removeClass('newsletter-true');
        jQuery(".shortcode__newsletter__email").val('');
    }); 
});