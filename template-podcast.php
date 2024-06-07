<?php
// Template Name: Podcast Page 

get_header();

$directory = get_stylesheet_directory_uri();
$podcast_poster = get_field('podcast_poster');
$podcast_banner_text = get_field('podcast_banner_text');
$with_person_name = get_field('with_person_name');
$podcast_all_details = get_field('podcast_all_details');
$featured_episodes_heading = get_field('featured_episodes_heading');
$recent_episodes_heading = get_field('recent_episodes_heading');
$listening_platforms = get_field('listening_platforms');
$get_prepared_heading = get_field('get_prepared_heading', 'options');
$get_prepared_details = get_field('get_prepared_details', 'options');
$unsubscribe_text = get_field('unsubscribe_text', 'options');
$podcast_with_person = get_field('podcast_with_person', 'options');


?>


<!-- =============== PODCAST BANNER ============== -->
    <section class="podcast_banner_area_main">
        <img src="<?php echo $directory; ?>/img/greenshade.svg" alt="design" class="right-img2">
        <div class="container">
            <div class="podcast_banner_area">
                <div class="podcast_poster">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="podcast_image">
                                <img src="<?php echo $podcast_poster['url']; ?>" alt="<?php echo $podcast_poster['alt']; ?>">
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7">
                            <div class="podcast_details">
                                <div class="common_heading">
                                    <h2><?php echo $podcast_banner_text;?></h2>
                                </div>
                                <h3 class="with_whom"><?php echo $with_person_name;?></h3>
                                <div class="common_para">
                                    <p><?php echo $podcast_all_details;?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="podcast_bottom_area">
                    <div class="row">
                        <?php 
                        if($listening_platforms) :
                        ?>
                                <div class="col-xl-8">
                                    <ul class="list_area">

                                        <?php 
                                            foreach($listening_platforms as $each_platform) :
                                                $platform_link_and_name = $each_platform['platform_link_and_name'];
                                        ?>
                                                    <li class="podcast_link_items">
                                                        <a href="<?php echo $platform_link_and_name['url']; ?>" class="common_btn_main podcast_links"><?php echo $platform_link_and_name['title']; ?></a>
                                                    </li>

                                        <?php endforeach; ?>
                                        
                                    </ul>
                                </div>
                        <?php endif; ?>
                        <div class="col-xl-4">
                            <form action="<?php echo home_url('/'); ?>" method="GET">
                                <div class="search_area">
                                    <input type="text" class="search_input" placeholder="Search..." name="s" id="s" value="<?php echo $_GET['title']; ?>" required>
                                    <input type="hidden" name="field" value="bod_podcast" >
                                    <button type="submit"><img src="<?php echo  $directory; ?>/img/search_icon.svg" alt="img"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= PODCAST SLIDER AREA ============== -->
    <?php

        $featured_podcasts = array(
            'post_type' => 'bod_podcast',
            'post_status' => 'publish',
            'meta_key' => 'featured_podcast',
            'meta_value' => true,
        );

        $featured_podcasts_query = new WP_Query($featured_podcasts);
        if($featured_podcasts_query->posts):
    ?>
            <section class="blog_slider_area_main podcast_slider_area_main">
                <div class="container">
                    <div class="common_sub_section_heading">
                        <h2><?php echo $featured_episodes_heading;?></h2>
                    </div>
                </div>
                <div class="reviews">
                    <div class="slider-main-area">
                        <div class="swiper mySwiper3">
                            <div class="swiper-wrapper">
                            <?php 
                                foreach($featured_podcasts_query->posts as $featured_podcast_item) :
                            ?>
                                            <div class="swiper-slide">
                                                <div class="container">
                                                    <div class="slider-content">
                                                        <div class="blog_post_photo_area">
                                                            <?php echo get_the_post_thumbnail($featured_podcast_item->ID); ?>
                                                        </div>
                                                        <div class="blog_details_area">
                                                            <span class="date_main">
                                                                <img src="<?php echo $directory; ?>/img/calendar.svg" alt="img">
                                                                <?php echo custom_date_format($featured_podcast_item->post_date);?>
                                                            </span>
                                                            <h3><?php echo $featured_podcast_item->post_title; ?></h3>
                                                            <p><?php echo $featured_podcast_item->post_excerpt; ?></p>
                                                            <a href="<?php echo get_permalink($featured_podcast_item->ID); ?>" class="own-path-btn">Continue Reading</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <?php endforeach;?>
                            </div>
                            <div class="swiper-button-next arrow arrow-next"></div>
                            <div class="swiper-button-prev arrow arrow-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </section>
    <?php endif; ?>
    <!-- ================= RECENT ARTICLES AREA ============== -->
    <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $podcast_posts = array(
            'post_type' => 'bod_podcast',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'paged' => $paged,
        );

        $podcast_posts_query = new WP_Query($podcast_posts);
        if($podcast_posts_query->posts):
    ?>
            <section class="recent_article_main">
                <div class="container">
                    <div class="recent_article">
                        <h2><?php echo $recent_episodes_heading;?></h2>
                        <ul class="new_grid">
                            <?php 
                                foreach($podcast_posts_query->posts as $podcast_item) :
                            ?>
                                        <li class="article_item">
                                            <span class="date_main">
                                                <img src="<?php echo $directory; ?>/img/calendar-b.svg" alt="img">
                                                <?php echo custom_date_format($podcast_item->post_date);?>
                                            </span>
                                            <h6><?php echo $podcast_item->post_title; ?></h6>
                                            <div class="podcast_organizer">
                                                <img src="<?php echo $podcast_with_person['url']; ?>" alt="<?php echo $podcast_with_person['alt']; ?>">
                                                <span>Nolan Martin</span>
                                            </div>
                                            <p><?php echo $podcast_item->post_excerpt; ?></p>
                                            <a href="<?php echo get_permalink($podcast_item->ID); ?>" class="own-path-btn">Listen To The Episode</a>
                                        </li>
                            <?php
                                endforeach;
                            ?>
                        </ul>
                        <?php 
                        // Pagination
                        $total_pages = $podcast_posts_query->max_num_pages;
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var('paged'));
                            echo '<nav class="pagination">';
                            echo '<ul class="pagination pagination-sm">';
                            echo paginate_links(array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => '/page/%#%',
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text' => false,
                                'next_text' => false,
                                'add_args'  => array(),
                            ));
                            echo '</ul>';
                            echo '</nav>';
                        }
                    ?>
                    </div>

                </div>
            </section>
    <?php endif; ?>
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