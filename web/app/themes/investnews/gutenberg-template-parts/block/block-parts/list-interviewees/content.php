<div class="interviewees-block">
    <h2>Entrevistados</h2>
    <?php if ( have_rows('list_interviewees') ) : ?>
        <div class="swiper interviewees-content">
            <div class="swiper-wrapper">
            <?php while( have_rows('list_interviewees') ) : the_row(); $photo = get_sub_field('photo');
                $name = get_sub_field('name');
                $company = get_sub_field('company');
                $profile_link = get_sub_field('profile_link');
                ?>
                    <div class="swiper-slide">
                        <a href="<?= $profile_link ?>" title="<?php echo $name; ?>">
                            <?php if($photo ){ ?>
                                <img src="<?php echo $photo ?>" alt="<?php echo $name ?>">
                            <?php } else { ?>
                                <img src="<?php bloginfo('template_url'); ?>/gutenberg-template-parts/block/block-parts/simple-list/assets/images/investnews-logo.png" class="logo-img" alt="InvestNews" width="300" height="157">
                            <?php } ?>
                        </a>
                        <span><?php echo $company; ?></span>
                        <h3>
                            <a href="<?php echo $profile_link ?>" title="<?php echo $name; ?>">
                                <?php echo $name; ?>
                            </a>
                        </h3>
                    </div>
            <?php endwhile; ?>
            </div>
            <div class="swiper-button-next">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="white" fill-opacity="0.8"/>
                    <path d="M17.0015 14.4889C17.0015 14.328 17.0804 14.1709 17.2255 14.0777C17.4526 13.9318 17.7548 13.9973 17.9006 14.2243C19.2944 16.3893 21.0993 18.1943 23.2636 19.5888C23.4042 19.6798 23.4906 19.8339 23.4906 20.0015C23.4906 20.1699 23.4042 20.3248 23.2629 20.4157C21.1046 21.805 19.3056 23.6024 17.9149 25.7592C17.7698 25.9847 17.4706 26.0719 17.2406 25.9336C17.003 25.7908 16.9316 25.481 17.0804 25.2495C18.2817 23.3814 19.7732 21.7681 21.5256 20.4383C21.815 20.2188 21.815 19.7835 21.5256 19.564C19.7747 18.2349 18.2817 16.6209 17.0782 14.752C17.0256 14.6701 17 14.5784 17 14.4882L17.0015 14.4889Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                </svg>
            </div>
            <div class="swiper-button-prev">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="40" y="40" width="40" height="40" rx="20" transform="rotate(180 40 40)" fill="white" fill-opacity="0.8"/>
                    <path d="M23.4892 25.5111C23.4892 25.672 23.4103 25.8291 23.2652 25.9223C23.0382 26.0682 22.736 26.0027 22.5901 25.7757C21.1964 23.6107 19.3914 21.8057 17.2271 20.4112C17.0865 20.3202 17.0001 20.1661 17.0001 19.9985C17.0001 19.8301 17.0865 19.6752 17.2279 19.5843C19.3861 18.195 21.1851 16.3976 22.5758 14.2408C22.7209 14.0153 23.0201 13.9281 23.2502 14.0664C23.4877 14.2092 23.5591 14.519 23.4103 14.7505C22.209 16.6186 20.7175 18.2319 18.9652 19.5617C18.6757 19.7812 18.6757 20.2165 18.9652 20.436C20.716 21.7651 22.209 23.3791 23.4125 25.248C23.4652 25.3299 23.4907 25.4216 23.4907 25.5118L23.4892 25.5111Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                </svg>
            </div>
        </div>
        <?php endif; ?>
</div>