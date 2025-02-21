<?php if (function_exists('coauthors_posts_links')) { ?>
    <div class="post-author-list">
        <?php $coauthors = get_coauthors(); ?>
        <?php foreach ($coauthors as $coauthor) {
            $userdata = get_userdata($coauthor->ID);
            $author_id = $userdata->ID;
            $author_url = get_author_posts_url($author_id);
            $author_name = get_the_author_meta('display_name');
        ?>
            <div class="author">
                <div class="top">
                    <a href="<?php echo $author_url; ?>" title="<?php echo $userdata->display_name; ?>" class="author-image">
                        <?php $profile_image = get_field('profile_image', 'user_'.$author_id); ?>
                        <?php if($profile_image) { ?>
                            <?php echo wp_get_attachment_image( $profile_image['ID'], array(70,70) ); ?>
                        <?php } else { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="41" viewBox="0 0 70 71" fill="none">
                                <rect y="0.500977" width="70" height="70" rx="35" fill="#C4C4C4"/>
                            </svg>
                        <?php } ?>
                    </a>
                    <a href="<?php echo $author_url; ?>" title="<?php echo $userdata->display_name; ?>" class="author-name">
                        <strong><?php echo $userdata->display_name; ?></strong>
                    </a>
                </div>
                <div class="author-informations">
                    <p class="author-description">
                        <?php echo $userdata->user_description; ?>
                    </p>
                    <ul class="author-social-links">
                        <?php $user_email = $coauthor->user_email;
                        if ($user_email) { ?>
                            <a href="mailto:<?php echo $user_email; ?>" title="<?php echo $user_email; ?>" aria-label="Entrar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                                    <circle cx="20" cy="20.501" r="20" fill="#2C2C2C"/>
                                    <path d="M12 13.8801V27.1187C12 27.352 12.172 27.527 12.4014 27.4978H12.6881C17.3611 27.2645 24.2703 27.2645 28.1119 27.4978H28.3986C28.628 27.4978 28.8 27.352 28.8 27.1187V13.8801C28.8 13.6759 28.628 13.501 28.4273 13.501H12.3727C12.172 13.501 12 13.6759 12 13.8801ZM23.6683 20.0037L26.8218 16.5919C27.0512 16.3295 27.4812 16.5045 27.4812 16.8544V23.9986C27.4812 24.3485 27.0512 24.5235 26.8218 24.261L23.6683 20.5285C23.5536 20.3827 23.5536 20.1495 23.6683 20.0037ZM17.1604 20.4994L14.0068 24.2319C13.7775 24.4943 13.3474 24.3485 13.3474 23.9694V16.8544C13.3474 16.5045 13.7775 16.3295 14.0068 16.5919L17.1604 20.0037C17.3038 20.1495 17.3038 20.3827 17.1604 20.5285V20.4994ZM15.0676 14.8423H25.7324C26.0765 14.8423 26.2485 15.2506 26.0191 15.4839L21.8048 20.0328C21.4321 20.4411 20.916 20.6743 20.4 20.6743C19.884 20.6743 19.3679 20.4411 18.9952 20.0328L14.7809 15.4839C14.5515 15.2214 14.7235 14.8423 15.0676 14.8423ZM14.6949 25.4566C15.641 24.3194 17.5331 22.1323 18.1065 21.4325C18.6799 20.7327 18.3645 21.2867 18.4792 21.3742C19.0239 21.7824 19.6833 22.0157 20.3713 22.0157C21.0594 22.0157 21.6614 21.8116 22.2061 21.4325C22.7509 21.0534 22.5788 21.345 22.7222 21.4908L26.0765 25.4274C26.3058 25.6899 26.1051 26.069 25.7898 26.069C22.6075 25.9815 18.4792 25.9815 15.0102 26.069C14.6662 26.069 14.4942 25.6899 14.7235 25.4274L14.6949 25.4566Z" fill="white"/>
                                </svg>
                            </a>
                        <?php } ?>
                        <?php $user_lin = $coauthor->linkedin;
                        if ($user_lin) { ?>
                            <a href="<?php echo $user_lin; ?>" title="LinkedIn" aria-label="Entrar" alt="LinkedIn" target="_blank">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.501" r="20" fill="#2C2C2C"/>
                                    <path d="M13.2316 18.1444H16.1381V27.501H13.2316V18.1444ZM14.6791 13.501C15.6055 13.501 16.3581 14.2555 16.3581 15.1842C16.3581 16.1129 15.6055 16.8675 14.6791 16.8675C13.7527 16.8675 13 16.1129 13 15.1842C13 14.2555 13.7527 13.501 14.6791 13.501Z" fill="white"/>
                                    <path d="M17.9561 18.1443H20.7352V19.4212H20.77C21.1637 18.6899 22.1016 17.9121 23.5144 17.9121C26.4556 17.9121 26.9883 19.8507 26.9883 22.3698V27.5008H24.0934V22.9503C24.0934 21.859 24.0702 20.466 22.588 20.466C21.1058 20.466 20.851 21.6501 20.851 22.869V27.5008H17.9561V18.1443Z" fill="white"/>
                                </svg>
                            </a>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>