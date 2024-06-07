<?php
  get_header();
  $directory = get_stylesheet_directory_uri();
  $banner_img = get_field('banner_big_image');
  $banner_main_btn = get_field('banner_button_link');
  $workshop_img = get_field('workshop_image');
  $member_box_icon = get_field('get_access_member_explore');
  $get_access_cards = get_field('get_access_cards');
  $get_icons = $get_access_cards[0]['get_access_cards_icon'];
  $podcast_image = get_field('worth_your_time_podcast_image');
  $see_all_events_btn = get_field('see_button_text_link');
  $level_learn_more_btn = get_field('workshop_button_link');
  $explore_our_btn = get_field('button_link');
  $listen_podcast_btn = get_field('worth_your_time_podcast_button_link');
  $get_prepared_heading = get_field('get_prepared_heading', 'options');
  $get_prepared_details = get_field('get_prepared_details', 'options');
  $unsubscribe_text = get_field('unsubscribe_text', 'options');

  ?>
    
    <!-- ================= BANNER AREA ============== -->
    <section class="banner-main">
        <div class="design-img-area">
            <img src="<?php echo  $directory; ?>/img/greenshade.svg" alt="design" class="right-img">
        </div>
        <div class="container">
            <div class="banner-area">
                <h1>
                    <?php 
                        echo get_field('banner_heading');
                    ?>
                </h1>
                <p>
                    <?php 
                        echo get_field('banner_text');
                    ?>
                </p>
                <div class="banner-btn-area">
                    <a href="<?php echo $banner_main_btn['url']; ?>" class="second-btn">
                        <?php echo $banner_main_btn['title']; ?>
                    </a>
                </div>
            </div>
            <div class="calender-area">
                <img src="<?php echo $banner_img['url']?>" alt="<?php echo $banner_img['alt']?>">
            </div>
        </div>
    </section>
    <!-- ================= COUNTER AREA ============== -->
    <section class="counter-area-main">
        <div class="container">
            <div class="counter-area">
                <div class="item">
                    <div class="plus-area">
                        <span class="count" data-number="<?php echo get_field('counter1');?>">0</span><span class="plus">+</span>
                    </div>
                    <h3 class="text">Company Databases Built</h3>
                </div>
                <div class="item">
                    <div class="plus-area">
                        <span class="count" data-number="<?php echo get_field('counter2');?>">0</span><span class="plus">+</span>
                    </div>
                    <h3 class="text">Current Board Member Profiles</h3>
                </div>
                <div class="item">
                    <div class="plus-area">
                        <span class="count" data-number="<?php echo get_field('counter3');?>">0</span><span class="plus">+</span>
                    </div>
                    <h3 class="text">Years of Data History</h3>
                </div>
                <div class="item">
                    <div class="plus-area">
                        <span class="count" data-number="<?php echo get_field('counter4');?>">0</span><span class="plus">+</span>
                    </div>
                    <h3 class="text">Executives Using This Platform</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= OWN PATH AREA ==============  -->
    <?php
        $communitycards = get_field('our_community_cards');
        if($communitycards) : 
    ?>
    <section class="own-path-main">
        <div class="container">
            <div class="own-path">
                <div class="title-area">
                    <h2>
                        <?php
                            echo get_field('our_community_heading');
                        ?>
                    </h2>
                </div>
                <ul class="info-ul">
                    <?php
                        foreach($communitycards as $cardItems) :
                            $card_icon = $cardItems['our_community_card_icon'];
                            $btn_links = $cardItems['our_community_card_link'];
                    ?>
                                    <li>
                                        <div class="info-icons">
                                            <img src="<?php echo $card_icon['url']; ?>" alt="<?php echo $card_icon['alt'] ?>">
                                        </div>
                                        <h6>
                                            <?php echo $cardItems['our_community_card_heading']; ?>
                                        </h6>
                                        <p>
                                            <?php echo $cardItems['our_community_card_details']; ?>
                                        </p>
                                        <a href="<?php echo $btn_links['url']; ?>" class="own-path-btn">
                                            <?php echo $btn_links['title']; ?>
                                        </a>
                                    </li>

                        <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ================= GET PREPARED AREA ============== -->
    <section class="get-prepared-main">
        <div class="container">
            <div class="get-prepared">
                <div class="title-area">
                    <h2>
                        <?php echo $get_prepared_heading; ?>
                    </h2>
                </div>
                <?php echo $get_prepared_details; ?>
                <?php echo do_shortcode( '[contact-form-7 id="424018c" title="Get Prepared form"]' ); ?>
                <div class="get-bottom-area">
                    <span><?php echo $unsubscribe_text; ?></span>
                    <div class="join-photo-area">
                        <img src="<?php echo  $directory; ?>/img/join-group.png" alt="img">
                        <span>Join 1k+ Subscribers</span>
                    </div>
                </div>
                <img src="<?php echo  $directory; ?>/img/finger.svg" alt="img" class="img img-one">
                <img src="<?php echo  $directory; ?>/img/post.svg" alt="img" class="img img-two">
                <img src="<?php echo  $directory; ?>/img/post-way.svg" alt="img" class="img img-three">
                <img src="<?php echo  $directory; ?>/img/get-arrow.svg" alt="img" class="img img-four">
            </div>
        </div>
    </section>
    <!-- ================= LEVEL UP AREA ==============  -->
    <section class="level-up-main">
        <div class="container">
            <div class="level-up">
                <div class="level-up-top-area">
                    <div class="title-area">
                        <h2>
                            <?php echo get_field('level_up_heading'); ?>
                        </h2>
                    </div>
                    <a href="<?php echo $see_all_events_btn['url']; ?>" class="see-all-btn">
                        <?php echo $see_all_events_btn['title']; ?>
                    </a>
                </div>
                <div class="level-up-box">
                    <div class="row box-row">
                        <div class="col-xl-6">
                            <div class="box-img">
                                <img src="<?php echo $workshop_img['url'] ?>" alt="<?php echo $workshop_img['alt'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="box-details">
                                <div class="row date-area-row">
                                    <div class="col-sm-4">
                                        <p>
                                            <img src="<?php echo  $directory; ?>/img/calendar.svg" alt="img">
                                            <?php echo get_field('workshop_date'); ?>
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                            <img src="<?php echo  $directory; ?>/img/hourglass-end.svg" alt="img">
                                            <?php echo get_field('workshop_time'); ?>
                                        </p>
                                    </div>
                                </div>
                                <h3>
                                    <?php echo get_field('workshop_heading'); ?>
                                </h3>
                                <p>
                                    <?php echo get_field('workshop_details'); ?>
                                </p>
                                <a href="<?php echo $level_learn_more_btn['url']; ?>" class="box-btn">
                                    <?php echo $level_learn_more_btn['title']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= ACCESS AREA ==============  -->

    <?php if($get_access_cards) : ?>

    <section class="access-main">
        <div class="container">
            <div class="access">
                <h2>
                    <?php echo get_field('get_access_heading'); ?>
                </h2>
                <div class="member-details-area">
                    <div class="explore-area">
                        <div class="first-card">
                            <div class="info-icons">
                                <img src="<?php echo $get_icons['url'] ?>" alt="<?php echo $get_icons['alt'] ?>">
                            </div>
                            <h6>
                                <?php echo $get_access_cards[0]['get_access_cards_title'];  ?>
                            </h6>
                            <p>
                                 <?php echo $get_access_cards[0]['get_access_cards_details'];  ?>
                            </p>
                        </div>
                        <div class="second-card">
                            <div class="info-icons">
                                <img src="<?php echo $member_box_icon['url'] ?>" alt="<?php echo $member_box_icon['alt'] ?>">
                            </div>
                            <p>
                                <?php echo get_field('get_access_member_explore_details'); ?>
                            </p>
                            <a href="<?php echo $explore_our_btn['url']; ?>" class="own-path-btn">
                                <?php echo $explore_our_btn['title']; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="info-ul">
                    <?php
                        foreach( $get_access_cards as $key=> $get_card_item) :
                            $get_access_cards_icon = $get_card_item['get_access_cards_icon'];
                        if($key === 0) {
                            continue;
                        }
                    ?>
                        <li>
                            <div class="info-icons">
                                <img src="<?php echo $get_access_cards_icon['url'] ?>" alt="<?php echo $get_access_cards_icon['alt'] ?>">
                            </div>
                            <h6>
                                 <?php echo $get_card_item['get_access_cards_title'];  ?>
                            </h6>
                            <p>
                                <?php echo $get_card_item['get_access_cards_details'];  ?>
                            </p>
                        </li>

                        <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <?php endif; ?>
    <!-- ================= REVIEW AREA ============== -->
    <?php
        $sliderPost = [
            'post_type' => 'testimonials',
            'post_status' => 'publish',
            'order' => 'ASC'
        ];


        $sliders = new WP_Query($sliderPost);

        if($sliders) :
    ?>
    <section class="reviews-main">
        <div class="container">
            <div class="reviews">
                <div class="title-area">
                    <h2>
                        <?php echo get_field('testimonials_heading'); ?>
                    </h2>
                </div>
                <div class="slider-main-area">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                                    foreach($sliders->posts as $eachslider) : 
                                        $profile_img = get_field('testimonials_profile', $eachslider->ID);
                            ?>

                                    <div class="swiper-slide">
                                        <div class="slider-content">
                                            <?php echo get_field('testimonial_thoughts_write_here', $eachslider->ID); ?>
                                            <div class="profile-area">
                                                <img src="<?php echo  $profile_img['url']; ?>" alt="<?php echo  $profile_img['alt']; ?>" class="profile-img">
                                                <div class="naming">
                                                    <p>
                                                        <?php echo get_field('testimonials_profile_name', $eachslider->ID); ?>
                                                    </p>
                                                    <span>
                                                        <?php echo get_field('testimonials_profile_designation', $eachslider->ID); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach; ?>
                        </div>
                        <div class="swiper-button-next arrow arrow-next"></div>
                        <div class="swiper-button-prev arrow arrow-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ================= LISTEN AREA ============== -->
    <section class="listen-main">
        <div class="container">
            <div class="listen">
                <div class="title-area">
                    <h2>
                        <?php echo get_field('worth_your_time_heading'); ?>
                    </h2>
                </div>
                <div class="l-details-area">
                    <a href="<?php echo $listen_podcast_btn['url']; ?>" class="listen-card">
                        <div class="id-area">
                            <img src="<?php echo $podcast_image['url'] ?>" alt="<?php echo $podcast_image['alt'] ?>">
                        </div>
                        <h6>
                            <?php echo get_field('worth_your_time_podcast_title'); ?>
                        </h6>
                        <p>
                            <?php echo get_field('worth_your_time_podcast_details'); ?>
                        </p>
                        <span class="own-path-btn">
                            <?php echo $listen_podcast_btn['title']; ?>
                        </span>
                    </a>
                    <?php 
                        $blogs = get_field('blog_cards');
                        if($blogs) :
                    ?>
                    <div class="id-details-area">
                        <ul class="info-ul">
                            <?php 
                                    foreach($blogs as $blogItem) :
                                        $blogIcon = $blogItem['blog_icon'];
                                        $podcast_site_blog_btn = $blogItem['blog_button_link'];
                            ?>
                                        <li>
                                            <div class="icon-area">
                                                <div class="info-icons">
                                                    <img src="<?php echo $blogIcon['url']; ?>" alt="<?php echo $blogIcon['alt'] ?>">
                                                </div>
                                                <h6>
                                                    <?php echo $blogItem['blog_title']; ?>
                                                </h6>
                                            </div>
                                            <p>
                                                <?php echo $blogItem['blog_details']; ?>
                                            </p>
                                            <a href="<?php echo $podcast_site_blog_btn['url']; ?>" class="own-path-btn">
                                                <?php echo $podcast_site_blog_btn['title']; ?>
                                            </a>
                                        </li>
                                <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <img class="l-design" src="<?php echo  $directory; ?>/img/l-bg.png" alt="img">
    </section>
    <!-- ================= GET PREPARED AREA ============== -->
    <section class="get-prepared-main get-prepared-main-two">
        <div class="container">
        <div class="get-prepared">
                <div class="title-area">
                    <h2>
                        <?php echo $get_prepared_heading; ?>
                    </h2>
                </div>
                <?php echo $get_prepared_details; ?>
                <?php echo do_shortcode( '[contact-form-7 id="424018c" title="Get Prepared form"]' ); ?>
                <div class="get-bottom-area">
                    <span><?php echo $unsubscribe_text; ?></span>
                    <div class="join-photo-area">
                        <img src="<?php echo  $directory; ?>/img/join-group.png" alt="img">
                        <span>Join 1k+ Subscribers</span>
                    </div>
                </div>
                <img src="<?php echo  $directory; ?>/img/finger.svg" alt="img" class="img img-one">
                <img src="<?php echo  $directory; ?>/img/post.svg" alt="img" class="img img-two">
                <img src="<?php echo  $directory; ?>/img/post-way.svg" alt="img" class="img img-three">
                <img src="<?php echo  $directory; ?>/img/get-arrow.svg" alt="img" class="img img-four">
            </div>
        </div>
    </section>

    <?php
    
    get_footer();
    ?>