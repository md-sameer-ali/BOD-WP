    
    <?php
        $logo_img = get_field('logo_image', 'options');
        $login_btn = get_field('log_in_button_link', 'options');
        $join_us_btn = get_field('join_us_button_link', 'options');
    ?>
    <!-- ================= FOOTER AREA ==============  -->
    <footer class="footer-main">
        <div class="container">
            <div class="total-footer">
                <div class="footer">
                    <div class="footer-logo-main">
                        <a href="<?php echo site_url(); ?>">
                             <img src="<?php echo $logo_img['url'] ?>" alt="<?php echo $logo_img['alt'] ?>">
                        </a>
                        <p>
                            <?php
                                echo get_field('copyright_text', 'options');
                            ?>
                        </p>
                        <div class="footer-nav">
                            <?php footer_main_nav(); ?>
                        </div>
                    </div>
                    <div class="total-nav">
                        <div class="main-footer-nav">
                            <div class="footer-nav-area">
                                <h6>
                                    COMMUNITY
                                </h6>
                                <div class="footer-nav"><?php community_nav(); ?>
                                </div>
                            </div>
                            <div class="footer-nav-area">
                                <h6>
                                    Free Resources
                                </h6>
                                <div class="footer-nav">
                                     <?php free_resource_nav(); ?>
                                </div>
                            </div>
                            <div class="footer-nav-area">
                                <h6>
                                    Connect
                                </h6>
                                <div class="footer-nav">
                                    <?php connect_nav(); ?>
                                </div>
                            </div>
                            <div class="footer-nav-area">
                                <h6>
                                    About
                                </h6>
                                <div class="footer-nav">
                                    <?php footer_about_nav(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="lower-footer-area">
                            <div class="social-icons">
                                <p>Follow Us</p>
                                <ul class="social-ul">
                                <?php
                                    $socialMedia = get_field('social_media', 'options');
                                    if($socialMedia) :
                                        foreach($socialMedia as $icon) :
                                            $links = $icon['social_media_links'];
                                ?>
                                    <li>
                                        <a href="<?php echo $links; ?>" target="_blank" >
                                            <?php
                                                echo $icon['social_icons'];
                                            ?>
                                        </a>
                                    </li>

                                <?php
                                        endforeach;
                                    endif;
                                ?>
                                </ul>
                            </div>
                            <div class="footer-btn-area">
                                <div class="contact-btn">
                                    <a href="<?php echo $login_btn['url']; ?>" class="btn-one">
                                        <?php echo $login_btn['title']; ?>
                                    </a>
                                    <a href="<?php echo $join_us_btn['url']; ?>" class="btn-two">
                                        <?php echo $join_us_btn['title']; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
 

    <?php wp_footer(); ?>
</body>

</html>