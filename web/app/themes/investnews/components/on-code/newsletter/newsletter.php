<?php $ads_option = get_field('ads_option');
if(!$ads_option):   
    /* layout without ads case  */?>
    <div class="newsletter">
        <div class="newsletter-top">
            <?php if(is_singular() && !is_singular('acoes') && !is_page('home') && !is_singular('guias') && !is_page_template('pages/guias/page-guias.php')&& !is_page_template('pages/ultimas.php')): ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/news-single.png" alt="Daily InvestNews" title="Daily InvestNews">
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/large-newsletter.png" alt="Daily InvestNews" title="Daily InvestNews">
            <?php endif; ?>
        </div>
        <div class="newsletter-content">
            <h2 class="title-news">Daily InvestNews</h2>
            <p class="descrip-news">A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail</p>
            <form action="" class="notifyMe newsletter-form" method="POST">
                <!-- <input type="hidden" name="_ri_" value="X0Gzc2X%3DYQpglLjHJlDQGpW6zgC8eqXgeUzaclMSm07n5u2dOkEEpUFIbVwjpnpgHlpgneHmgJoXX0Gzc2X%3DYQpglLjHJlDQGNpskmAIzdKetqBhsyzazdmzgM9qcdRaF543I1G" /> -->
                <input type="hidden" name="form_event" value="form_submit_newsletter">
                <input type="hidden" name="form_position" value="box_materia">
                <input name="origem" value="newsletter_investnews" type="hidden">
                <input type="email" id="emailnews" required name="email_address_" onfocus="this.placeholder = &#39;&#39;" onblur="this.placeholder = &#39;Digite seu e-mail&#39;" class="shortcode__newsletter__email" placeholder="Digite seu e-mail"></input>
                <button type="submit" aria-label="Entrar" id="saveContatoButton" class="shortcode__newsletter__button">Inscreva-se</button>
            </form>
            <span>Ao clicar em "Inscreva-se" você estará concordando com a Política de privacidade.</span>
        </div>
        <div class="newsletter-content news-after">
            <p class="back-news">
                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                    <path d="M6.9985 1.48891C6.9985 1.32803 6.91956 1.17091 6.77447 1.07769C6.54744 0.931849 6.24524 0.997257 6.0994 1.22429C4.70565 3.38934 2.90068 5.19429 0.736384 6.5888C0.595811 6.67975 0.50938 6.83387 0.50938 7.00151C0.50938 7.16991 0.59581 7.32477 0.737131 7.41572C2.89541 8.80497 4.69438 10.6024 6.08512 12.7592C6.23021 12.9847 6.52941 13.0719 6.75944 12.9336C6.997 12.7908 7.0684 12.481 6.91956 12.2495C5.71825 10.3814 4.22678 8.76813 2.47444 7.43827C2.18502 7.21876 2.18502 6.7835 2.47444 6.56399C4.22528 5.23489 5.71826 3.62088 6.92181 1.75202C6.97444 1.67008 7 1.57836 7 1.48815L6.9985 1.48891Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                </svg>
                Voltar
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" width="54" height="41" viewBox="0 0 54 41" fill="none">
                <path d="M16.1207 40.5C15.3755 40.5 14.6642 40.1274 14.2578 39.4839L0.370565 17.9079C-0.27299 16.8917 -0.0695634 15.503 0.912703 14.8256C1.92884 14.1143 3.3513 14.4191 3.99486 15.4353L14.021 31.016C15.0032 32.5403 17.2386 32.608 18.2886 31.1515C27.0613 19.1611 37.8323 8.99972 50.3985 0.870619C51.4146 0.227065 52.8036 0.430326 53.481 1.41259C54.1923 2.42873 53.8872 3.85127 52.871 4.49483C38.7806 13.5723 27.0274 25.3257 17.9499 39.4161C17.5773 40.0936 16.8997 40.5 16.1207 40.5Z" fill="#5500FF"/>
            </svg>
            <h2>Agora, você receberá em primeira mão todas as novidades do mundo dos negócios diretamente no seu e-mail.</h2>
        </div>
    </div>
<?php else:
     /* layout in ads case */ ?>
    <div class="newsletter new-mb">
        <div class="newsletter-content">
            <div class="top-new-mb">
                <h2>Daily IN</h2>
                <p >
                    Conheça a newsletter 
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none">
                        <path d="M1.0015 1.23891C1.0015 1.07803 1.08044 0.920908 1.22553 0.82769C1.45256 0.681849 1.75476 0.747257 1.9006 0.974287C3.29435 3.13934 5.09932 4.94429 7.26362 6.3388C7.40419 6.42975 7.49062 6.58387 7.49062 6.75151C7.49062 6.91991 7.40419 7.07477 7.26287 7.16572C5.10459 8.55497 3.30562 10.3524 1.91488 12.5092C1.76979 12.7347 1.47059 12.8219 1.24056 12.6836C1.003 12.5408 0.931596 12.231 1.08044 11.9995C2.28175 10.1314 3.77322 8.51813 5.52556 7.18827C5.81498 6.96876 5.81498 6.5335 5.52556 6.31399C3.77472 4.98489 2.28174 3.37088 1.07819 1.50202C1.02556 1.42008 1 1.32836 1 1.23815L1.0015 1.23891Z" fill="black" stroke="black" stroke-width="0.5"/>
                    </svg>
                </p>
            </div>
            <form action="" class="notifyMe newsletter-form2" method="POST">
                <!-- <input type="hidden" name="_ri_" value="X0Gzc2X%3DYQpglLjHJlDQGpW6zgC8eqXgeUzaclMSm07n5u2dOkEEpUFIbVwjpnpgHlpgneHmgJoXX0Gzc2X%3DYQpglLjHJlDQGNpskmAIzdKetqBhsyzazdmzgM9qcdRaF543I1G" /> -->
                <input type="hidden" name="form_event" value="form_submit_newsletter">
                <input type="hidden" name="form_position" value="box_materia">
                <input name="origem" value="newsletter_investnews" type="hidden">
                <input type="email" id="emailnews" required name="email_address_" onfocus="this.placeholder = &#39;&#39;" onblur="this.placeholder = &#39;Digite seu e-mail&#39;" class="shortcode__newsletter__email" placeholder="Digite seu e-mail"></input>
                <button type="submit" aria-label="Entrar" id="saveContatoButton" class="shortcode__newsletter__button">Inscreva-se</button>
            </form>
            <span>Ao clicar em "Inscreva-se" você estará concordando com a Política de privacidade.</span>
        </div>

        <div class="newsletter-content news-after">
            <p class="back-news">
                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                    <path d="M6.9985 1.48891C6.9985 1.32803 6.91956 1.17091 6.77447 1.07769C6.54744 0.931849 6.24524 0.997257 6.0994 1.22429C4.70565 3.38934 2.90068 5.19429 0.736384 6.5888C0.595811 6.67975 0.50938 6.83387 0.50938 7.00151C0.50938 7.16991 0.59581 7.32477 0.737131 7.41572C2.89541 8.80497 4.69438 10.6024 6.08512 12.7592C6.23021 12.9847 6.52941 13.0719 6.75944 12.9336C6.997 12.7908 7.0684 12.481 6.91956 12.2495C5.71825 10.3814 4.22678 8.76813 2.47444 7.43827C2.18502 7.21876 2.18502 6.7835 2.47444 6.56399C4.22528 5.23489 5.71826 3.62088 6.92181 1.75202C6.97444 1.67008 7 1.57836 7 1.48815L6.9985 1.48891Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                </svg>
                Voltar
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" width="54" height="41" viewBox="0 0 54 41" fill="none">
                <path d="M16.1207 40.5C15.3755 40.5 14.6642 40.1274 14.2578 39.4839L0.370565 17.9079C-0.27299 16.8917 -0.0695634 15.503 0.912703 14.8256C1.92884 14.1143 3.3513 14.4191 3.99486 15.4353L14.021 31.016C15.0032 32.5403 17.2386 32.608 18.2886 31.1515C27.0613 19.1611 37.8323 8.99972 50.3985 0.870619C51.4146 0.227065 52.8036 0.430326 53.481 1.41259C54.1923 2.42873 53.8872 3.85127 52.871 4.49483C38.7806 13.5723 27.0274 25.3257 17.9499 39.4161C17.5773 40.0936 16.8997 40.5 16.1207 40.5Z" fill="#5500FF"/>
            </svg>
            <h2>Agora, você receberá em primeira mão todas as novidades do mundo dos negócios diretamente no seu e-mail.</h2>
        </div>
    </div>
<?php endif;
/* layout in mobile case */ ?>
<div class="newsletter new-m">
    <div class="newsletter-content">
        <div class="top-new-mb">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/newsmobile.png" alt="Daily InvestNews">
            <h2>Daily InvestNews</h2>
        </div>
        <p>A newsletter com insights do mundo dos negócios, em 3 minutos, direto no seu e-mail</p>
        <form action="" class="notifyMe newsletter-form3" method="POST">
                <!-- <input type="hidden" name="_ri_" value="X0Gzc2X%3DYQpglLjHJlDQGpW6zgC8eqXgeUzaclMSm07n5u2dOkEEpUFIbVwjpnpgHlpgneHmgJoXX0Gzc2X%3DYQpglLjHJlDQGNpskmAIzdKetqBhsyzazdmzgM9qcdRaF543I1G" /> -->
                <input type="hidden" name="form_event" value="form_submit_newsletter">
                <input type="hidden" name="form_position" value="box_materia">
                <input name="origem" value="newsletter_investnews" type="hidden">
                <input type="email" id="emailnews3" required name="email_address_" onfocus="this.placeholder = &#39;&#39;" onblur="this.placeholder = &#39;Digite seu e-mail&#39;" class="shortcode__newsletter__email" placeholder="Digite seu e-mail"></input>
                <button type="submit" aria-label="Entrar" id="saveContatoButton" class="shortcode__newsletter__button">Inscreva-se</button>
            </form>
        <span>Ao clicar em "Inscreva-se" você estará concordando com a Política de privacidade.</span>
    </div>

    <div class="newsletter-content news-after">
        <p class="back-news">
            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                <path d="M6.9985 1.48891C6.9985 1.32803 6.91956 1.17091 6.77447 1.07769C6.54744 0.931849 6.24524 0.997257 6.0994 1.22429C4.70565 3.38934 2.90068 5.19429 0.736384 6.5888C0.595811 6.67975 0.50938 6.83387 0.50938 7.00151C0.50938 7.16991 0.59581 7.32477 0.737131 7.41572C2.89541 8.80497 4.69438 10.6024 6.08512 12.7592C6.23021 12.9847 6.52941 13.0719 6.75944 12.9336C6.997 12.7908 7.0684 12.481 6.91956 12.2495C5.71825 10.3814 4.22678 8.76813 2.47444 7.43827C2.18502 7.21876 2.18502 6.7835 2.47444 6.56399C4.22528 5.23489 5.71826 3.62088 6.92181 1.75202C6.97444 1.67008 7 1.57836 7 1.48815L6.9985 1.48891Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
            </svg>
            Voltar
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" width="54" height="41" viewBox="0 0 54 41" fill="none">
            <path d="M16.1207 40.5C15.3755 40.5 14.6642 40.1274 14.2578 39.4839L0.370565 17.9079C-0.27299 16.8917 -0.0695634 15.503 0.912703 14.8256C1.92884 14.1143 3.3513 14.4191 3.99486 15.4353L14.021 31.016C15.0032 32.5403 17.2386 32.608 18.2886 31.1515C27.0613 19.1611 37.8323 8.99972 50.3985 0.870619C51.4146 0.227065 52.8036 0.430326 53.481 1.41259C54.1923 2.42873 53.8872 3.85127 52.871 4.49483C38.7806 13.5723 27.0274 25.3257 17.9499 39.4161C17.5773 40.0936 16.8997 40.5 16.1207 40.5Z" fill="#5500FF"/>
        </svg>
        <h2>Agora, você receberá em primeira mão todas as novidades do mundo dos negócios diretamente no seu e-mail.</h2>
    </div>
</div>