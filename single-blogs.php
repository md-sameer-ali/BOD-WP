<?php
    get_header();
    $directory = get_stylesheet_directory_uri();
    $blog_all_content = get_queried_object();
    $get_prepared_heading = get_field('get_prepared_heading', 'options');
    $get_prepared_details = get_field('get_prepared_details', 'options');
    $unsubscribe_text = get_field('unsubscribe_text', 'options');
?>


<!-- ================= BLOG DETAILS BANNER============== -->
<section class="blog_details_banner_area_main">
        <img src="<?php echo $directory; ?>/img/greenshade.svg" alt="design" class="right-img2">
        <div class="container">
            <div class="blog_details_banner_area">
                <span class="date_main">
                    <img src="<?php echo $directory; ?>/img/calendar.svg" alt="img">
                    <?php echo custom_date_format($blog_all_content->post_date);?>
                </span>
                <div class="common_heading">
                    <h2><?php echo $blog_all_content->post_title; ?></h2>
                </div>
                <div class="common_para">
                    <p><?php echo $blog_all_content->post_excerpt; ?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= BLOG DETAILS CONTENT============== -->
    <section class="blog_details_content_area_main">
        <div class="container">
            <div class="small_container">
                <div class="details_content_area">
                    <?php echo $blog_all_content->post_content;?>
                </div>
            </div>
        </div>
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