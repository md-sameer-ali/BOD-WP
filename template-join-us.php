<?php
// Template Name: Join Us

get_header();
$directory = get_stylesheet_directory_uri();
$show_price_on_table = get_field('select_pricing');
$answer_link = get_field('answer_questions_link_');
$compare_link = get_field('compare_plans_link');
$not_sore_icon = get_field('not_sure_icon');
$ready_to_join_btn_link = get_field('ready_to_join_button_link');

?>

 <!-- ================= BANNER AREA ============== -->
    <?php 

        $pricing_post = [
            'post_type' => 'pricings',
            'post_status' => 'publish',
            'order' => 'ASC'
        ];

        $price_card = new WP_Query($pricing_post);

        if($price_card->posts) :
    ?>
    <section class="join-banner-main">
        <div class="design-img-area">
            <img src="<?php echo $directory; ?>/img/greenshade.svg" alt="design" class="right-img">
        </div>
        <div class="container">
            <div class="join-banner-area">
                <div class="heading-area">
                    <div class="title-area">
                        <h2>
                            <?php echo get_field('join_banner_heading'); ?>
                        </h2>
                    </div>
                    <div class="annual-billing-area">
                        <div class="toggle-btn-area">
                            <input type="checkbox" id="Tswitch" /><label for="Tswitch">Toggle</label>
                        </div>
                        <div class="discount-text">
                            <p>
                                <span>Save <?php echo get_field('discount_percentage'); ?></span>
                                <?php echo get_field('discount_on_annual_or_quarter_text'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="price-card-area">
                <div class="row">
                    <?php 

                            foreach($price_card->posts as $cardItem) :
                                $main_icon = get_field('main_card_icon', $cardItem->ID);
                                $apply_btn_link = get_field('price_card_button_link', $cardItem->ID);
                                $review_person_img = get_field('review_person_image', $cardItem->ID);
                                $popular_tag = get_field('most_popular_tag', $cardItem->ID);
                                $testimonial_show = get_field('testimonial_show_in_card', $cardItem->ID);
                                $see_full_list = get_field('see_all_features_button_link', $cardItem->ID);
                     ?>
                    <div class="col-lg-6">
                        <div class="price-card"> 

                            <?php 
                                if($popular_tag) :
                            ?>
                                    <div class="most-popular-area">
                                        <p>
                                            most popular!
                                        </p>
                                        <img src="<?php echo $directory; ?>/img/reverse-hand.png" alt="img">
                                    </div>

                            <?php endif;?>

                            <div class="card-head-area">
                                <div class="card-head-icon-area">
                                    <img src="<?php echo $main_icon['url']; ?>" alt="<?php echo $main_icon['alt']; ?>">
                                </div>
                                <div class="card-head-details">
                                    <h6>
                                        <?php echo get_field('for_whom_sub_heading', $cardItem->ID); ?>
                                    </h6>
                                    <h3>
                                        <?php echo get_field('for_whom', $cardItem->ID); ?>
                                    </h3>
                                    <p class="price-quarterly">
                                        <?php echo get_field('price_rate_per_quater', $cardItem->ID); ?>/ <span> <?php echo get_field('per_month_or_quater_text', $cardItem->ID); ?></span>
                                    </p>
                                    <p class="price-yearly">
                                        <?php echo get_field('price_rate_per_year', $cardItem->ID); ?> / <span> <?php echo get_field('per_year_text', $cardItem->ID); ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="card-description-area">
                                <?php echo get_field('card_details_text', $cardItem->ID); ?>
                            </div>
                            <div class="card-btn-area">
                                <a href="<?php echo $apply_btn_link['url']; ?>" style="background-color: <?php echo get_field('price_card_button_color', $cardItem->ID);?> " >
                                    <?php echo $apply_btn_link['title']; ?>
                                </a>
                            </div>

                            <?php
                                $access_features = get_field('accesses', $cardItem->ID);;
                                if($access_features) :
                            ?>

                                    <div class="benefits">
                                        <h6>
                                            <?php echo get_field('access_heading', $cardItem->ID); ?>
                                        </h6>
                                        <div class="benefits-points">
                                            <ul class="benefits-ul">
                                                <?php
                                                        $featureCount = 1;
                                                        foreach($access_features as $key => $featureItem) :
                                                            $list_icon = $featureItem['accesses_icon'];
                                                            if($featureItem['featured'] && $featureCount <= 4) :
                                                ?>
                                                            <li>
                                                                <div class="b-point">
                                                                    <div class="benefits-icon">
                                                                        <img src="<?php echo $list_icon['url']; ?>" alt="<?php echo $list_icon['alt']; ?>">
                                                                    </div>
                                                                    <div class="benefits-details">
                                                                        <p>
                                                                            <?php echo $featureItem['accesses_text']; ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                <?php       
                                                            $featureCount++;
                                                            endif;
                                                        endforeach;
                                                ?>
                                            </ul>
                                            <div class="see-list-button-area">
                                                <a href="<?php echo $see_full_list['url']; ?>">
                                                    <?php echo $see_full_list['title']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endif;
                            ?>
                            <div class="price-review">
                                <div class="p-review-content">
                                     <?php echo get_field('testimonial_thoughts_write_here', $testimonial_show); ?>
                                </div>
                                <div class="price-review-profile-area">
                                    <div class="review-profile">
                                        <img src="<?php echo  get_field('testimonials_profile', $testimonial_show)['url']; ?>" alt="<?php get_field('testimonials_profile', $testimonial_show)['alt']; ?>">
                                    </div>
                                    <div class="name-and-star">
                                        <?php 
                                            $price_card_review_stars = get_field('price_card_review_stars', $cardItem->ID);
                                            if($price_card_review_stars) :
                                        ?>
                                            <ul class="star-ul">

                                                <?php 
                                                        foreach($price_card_review_stars as $cardReview) :
                                                ?>
                                                
                                                <li class="star-item">
                                                    <?php echo $cardReview['price_star']; ?>
                                                </li>
                                                
                                                <?php 
                                                    endforeach;
                                                ?>
                                            </ul>
                                        <?php
                                              endif;
                                        ?>
                                        <p>
                                            <?php echo get_field('testimonials_profile_name', $testimonial_show); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            endforeach;
                    ?>
                </div>
            </div>
            <div class="not-sure-area">
                <div class="not-sure-icon">
                    <img src="<?php echo $not_sore_icon['url'] ?>" alt="<?php echo $not_sore_icon['alt'] ?>">
                </div>
                <div class="not-sure-text">
                    <h6>
                        <?php echo get_field('not_sure_which_membership_text'); ?>
                    </h6>
                    <p>
                        <a href="<?php echo $answer_link['url']; ?>">
                            <?php echo $answer_link['title']; ?>
                        </a>
                        or
                        <a href="<?php echo $compare_link ['url']; ?>">
                            <?php echo $compare_link ['title']; ?>
                        </a>
                            <?php echo get_field('so_we_can_help_you_choose_your_path'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php
        endif;
    ?>
    <!-- ================= REVIEW AREA ============== -->
    <section class="reviews-main join-us-reviews-main">
        <div class="container">
            <div class="reviews">
                <div class="title-area">
                    <h2>
                        <?php echo get_field('testimonial_heading_for_this_page');?>
                    </h2>
                </div>
                <div class="slider-main-area">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                        <?php
                                $sliderPost = [
                                    'post_type' => 'testimonials',
                                    'post_status' => 'publish',
                                    'order' => 'ASC'    
                                ];


                                $sliders = new WP_Query($sliderPost);

                                if($sliders) :
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

                            <?php
                                    endforeach;
                                endif;
                            ?>

                        </div>
                        <div class="swiper-button-next arrow arrow-next"></div>
                        <div class="swiper-button-prev arrow arrow-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= PRICE CHART TABLE AREA ============== -->
    <?php
        $feature_area_with_headings = get_field('feature_area_with_headings');

        if($feature_area_with_headings) :
    ?>
    <section class="price-chart-area-main">
        <div class="container">
            <div class="price-chart-area">
                <div class="table-area">
                    <table>

                            <tr>
                                <th>
                                    <div class="membership-made-for-you">
                                        <h3>
                                            <?php echo get_field('memberships_made_for_you'); ?>
                                        </h3>
                                        <div class="annual-billing-area">
                                            <div class="toggle-btn-area">
                                                <input type="checkbox" id="Tswitch2" /><label for="Tswitch2">Toggle</label>
                                            </div>
                                            <div class="discount-text">
                                                <p>
                                                    <span>Save <?php echo get_field('discount_percentage'); ?></span>
                                                    <?php echo get_field('discount_on_annual_or_quarter_text'); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="price-show-area">
                                        <img src="<?php echo get_field('main_card_icon', $show_price_on_table[0]->ID)['url']; ?>" alt="<?php echo get_field('main_card_icon', $show_price_on_table[0]->ID)['alt']; ?>">
                                        <h4>
                                            <?php echo get_field('for_whom', $show_price_on_table[0]->ID); ?>
                                        </h4>
                                        <p class="price-quarterly">
                                             <?php echo get_field('price_rate_per_quater', $show_price_on_table[0]->ID); ?>/ <span><?php echo get_field('per_month_or_quater_text', $show_price_on_table[0]->ID); ?></span>
                                        </p>
                                        <p class="price-yearly">
                                            <?php echo get_field('price_rate_per_year', $show_price_on_table[0]->ID); ?> / <span> <?php echo get_field('per_year_text', $show_price_on_table[0]->ID); ?></span>
                                        </p>
                                        <a href="<?php echo get_field('price_card_button_link', $show_price_on_table[0]->ID)['url']; ?>" class="join-apply-btn">
                                            <?php echo get_field('price_card_button_link', $show_price_on_table[0]->ID)['title']; ?>
                                        </a>
                                    </div>
                                </th>
                                <th>
                                    <div class="price-show-area">
                                        <img src="<?php echo get_field('main_card_icon', $show_price_on_table[1]->ID)['url']; ?>" alt="<?php echo get_field('main_card_icon', $show_price_on_table[1]->ID)['alt']; ?>">
                                        <h4>
                                            <?php echo get_field('for_whom', $show_price_on_table[1]->ID); ?>
                                        </h4>
                                        <p class="price-quarterly">
                                             <?php echo get_field('price_rate_per_quater', $show_price_on_table[1]->ID); ?>/ <span><?php echo get_field('per_month_or_quater_text', $show_price_on_table[1]->ID); ?></span>
                                        </p>
                                        <p class="price-yearly">
                                            <?php echo get_field('price_rate_per_year', $show_price_on_table[1]->ID); ?> / <span> <?php echo get_field('per_year_text', $show_price_on_table[1]->ID); ?></span>
                                        </p>
                                        <a href="<?php echo get_field('price_card_button_link', $show_price_on_table[1]->ID)['url']; ?>" class="join-apply-btn join-apply-now">
                                        <?php echo get_field('price_card_button_link', $show_price_on_table[1]->ID)['title']; ?> 
                                        </a>
                                    </div>
                                </th>
                            </tr>

                            <?php
                                foreach($feature_area_with_headings as $featureItems) :
                                    $sub_items = $featureItems['feature_sub_headings'];
                                    if($sub_items) :
                            ?>
                                    <tr>
                                        <th>
                                            <div class="table-sub-heading">
                                                <h5>
                                                    <?php echo $featureItems['feature_heading']; ?>
                                                </h5>
                                            </div>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>

                                    <?php 
                                        foreach($sub_items as $subItem) :
                                            $aspiring_board = $subItem['enable_for_aspiring_board_member'];
                                            $board_ready = $subItem['enable_for_board_ready'];
                                    ?>

                                            <tr>
                                                <td>
                                                    <div class="sub-heading-details">
                                                        <p>
                                                            <?php echo $subItem['feature_name']; ?>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-features-enable-icon">
                                                        <i class="fa-solid fa-<?php echo ($aspiring_board) ? 'check' : 'xmark'; ?>"></i>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="table-features-enable-icon">
                                                        <i class="fa-solid fa-<?php echo ($board_ready) ? 'check' : 'xmark'; ?>"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        
                            <?php       endforeach;
                                    endif;
                                endforeach;
                            ?>
                            <tr>
                                <td>
                                    
                                </td>
                                <td>
                                    <div class="price-show-area">
                                        <a href="<?php echo get_field('price_card_button_link', $show_price_on_table[0]->ID)['url']; ?>" class="join-apply-btn">
                                            <?php echo get_field('price_card_button_link', $show_price_on_table[0]->ID)['title']; ?>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="price-show-area">
                                        <a href="<?php echo get_field('price_card_button_link', $show_price_on_table[1]->ID)['url']; ?>" class="join-apply-btn join-apply-now">
                                            <?php echo get_field('price_card_button_link', $show_price_on_table[1]->ID)['title']; ?>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ================= FAQS AREA ============== -->
    <?php 
        $faq_posts = [
            'post_type' => 'faqs',
            'post_status' => 'publish',
            'order' => 'ASC'
        ];

        $faqs = new WP_Query($faq_posts);
        if($faqs->posts ) :
    ?>
    <section class="faqs-area-main">
        <div class="container">
            <div class="faqs-area">
                <div class="accordion-container">
                    <h2><?php echo get_field('faq_section_heading'); ?></h2>
                    <?php 
                       foreach($faqs->posts as $faqsItems) :
                    ?>
                    <div class="set">
                      <a href="#">
                        <?php echo get_field('faq_heading', $faqsItems->ID); ?>
                        <i class="fa fa-plus"></i>
                      </a>
                      <div class="content">
                        <?php echo get_field('faq_answer', $faqsItems->ID); ?>
                      </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ================= READY TO FIND AREA ============== -->
    <section class="ready-to-area-main">
        <div class="container">
            <div class="ready-to-area">
                <?php echo get_field('ready_to_join_heading'); ?>
                <p>
                    <?php echo get_field('ready_to_join_details'); ?>
                </p>
                <a href="<?php echo $ready_to_join_btn_link['url']; ?>" class="join-the-board">
                    <?php echo $ready_to_join_btn_link['title']; ?>
                </a>
            </div>
        </div>
    </section>



<?php
get_footer();
?>