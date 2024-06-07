<?php
// Template Name: Blog Page

get_header();

$directory = get_stylesheet_directory_uri();
$blog_page_heading = get_field('blog_page_heading');
$blog_page_details = get_field('blog_page_details');
$recent_articles_heading = get_field('recent_articles_heading');
$get_prepared_heading = get_field('get_prepared_heading', 'options');
$get_prepared_details = get_field('get_prepared_details', 'options');
$unsubscribe_text = get_field('unsubscribe_text', 'options');
$searchData ='';
if($_GET['title']!=""){
    $searchData = $_GET['title'];
}
?>


 <!-- =============== BLOG BANNER ============== -->
    <section class="blog_banner_main">
        <img src="<?php echo  $directory; ?>/img/greenshade.svg" alt="design" class="right-img2">
        <div class="container">
            <div class="blog_banner">
                <h1><?php echo $blog_page_heading; ?></h1>
                <div class="newsletter_area">
                    <?php echo $blog_page_details; ?>
                    <div class="search_area_main">
                        <form action="<?php echo home_url('/'); ?>" method="GET">
                            <div class="search_area">
                                <input type="text" class="search_input" placeholder="Search..." name="s" id="s" value="<?php echo $_GET['title']; ?>" required>
                                <input type="hidden" name="field" value="blogs" >
                                <button type="submit"><img src="<?php echo  $directory; ?>/img/search_icon.svg" alt="img"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= BLOG SLIDER AREA ============== -->
    <?php
        $featured_blog_posts = array(
            'post_type' => 'blogs',
            'post_status' => 'publish',
            'meta_key' => 'featured_posts_main',
            'meta_value' => true,

        );
        $featured_blog_query = new WP_Query($featured_blog_posts);

        if($featured_blog_query->posts) :
    
    ?>
    <section class="blog_slider_area_main">
        <div class="reviews">
            <div class="slider-main-area">
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <?php
                            foreach( $featured_blog_query->posts as $featured_item ) :
                        
                        ?>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="slider-content">
                                    <div class="blog_post_photo_area">
                                        <?php echo get_the_post_thumbnail($featured_item->ID); ?>
                                    </div>
                                    <div class="blog_details_area">
                                        <span class="date_main">
                                            <img src="<?php echo  $directory; ?>/img/calendar.svg" alt="img">
                                            <?php echo custom_date_format($featured_item->post_date); ?>
                                        </span>
                                        <h3><?php echo $featured_item->post_title; ?>.</h3>
                                        <p><?php echo $featured_item->post_excerpt; ?></p>
                                        <a href="<?php echo get_permalink($featured_item->ID); ?>" class="own-path-btn">Continue Reading</a>
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
    </section>
    <?php endif; ?>
    <!-- ================= RECENT ARTICLES AREA ============== -->
    <?php 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        
        $blog_posts = array(
            'post_type' => 'blogs',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'paged' => $paged,
            's' => $searchData,
        );

        $blog_posts_query = new WP_Query($blog_posts);

        if($blog_posts_query->posts) :

    ?>
        <section class="recent_article_main">
            <div class="container">
                <div class="recent_article">
                    <h2><?php echo $recent_articles_heading; ?></h2>
                    <ul class="new_grid">
                        <?php  
                            foreach($blog_posts_query->posts as $each_blog) :
                        ?>
                        <li class="article_item">
                            <span class="date_main">
                                <img src="<?php echo  $directory; ?>/img/calendar-b.svg" alt="img">
                                <?php echo custom_date_format($each_blog->post_date);?>
                            </span>
                            <h6><?php echo $each_blog->post_title; ?></h6>
                            <p><?php echo $each_blog->post_excerpt; ?></p>
                            <a href="<?php echo get_permalink($each_blog->ID); ?>" class="own-path-btn">Read The Blog</a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    

                    <?php 
                        // Pagination
                        $total_pages = $blog_posts_query->max_num_pages;
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
    



<?php get_footer(); ?>