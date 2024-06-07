<?php
    get_header();
    $directory = get_stylesheet_directory_uri();
    $podcast_all_content = get_queried_object();
    $transript = get_field('transript', $podcast_all_content);
    $add_listening_platform = get_field('add_listening_platform', $podcast_all_content);
    $podcast_with_person = get_field('podcast_with_person', 'options');
    $get_prepared_heading = get_field('get_prepared_heading', 'options');
    $get_prepared_details = get_field('get_prepared_details', 'options');
    $unsubscribe_text = get_field('unsubscribe_text', 'options');

?>

<!-- ================= PODCAST DETAILS BANNER ============== -->
<section class="blog_details_banner_area_main">
        <img src="<?php echo $directory; ?>/img/greenshade.svg" alt="design" class="right-img2">
        <div class="container">
            <div class="blog_details_banner_area">
                <div class="podcast_poster podcast_details_poster">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="podcast_image">
                                <?php echo get_the_post_thumbnail($podcast_all_content->ID); ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="podcast_details">
                                <div class="write_and_date_area">
                                    <div class="write_and_date">
                                        <div class="podcast_organizer">
                                            <img src="<?php echo $podcast_with_person['url']; ?>" alt="<?php echo $podcast_with_person['alt']; ?>">
                                            <span>Nolan Martin</span>
                                        </div>
                                    </div>
                                    <div class="write_and_date">
                                        <span class="date_main">
                                            <img src="<?php echo $directory; ?>/img/calendar.svg" alt="img">
                                            <?php echo custom_date_format($podcast_all_content->post_date);?>
                                        </span>
                                    </div>
                                </div>
                                <div class="blog_details_area">
                                    <h3><?php echo $podcast_all_content->post_title; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= PODCAST DETAILS CONTENT ============== -->
    <section class="blog_details_content_area_main">
        <div class="container">
            <div class="small_container">
                <div class="details_content_area">
                    <?php echo $podcast_all_content->post_content; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= PODCAST TRANSRIPT ============== -->
    <?php 
    if($transript):
    ?>
            <section class="podcast_details_content_area_main">
                <div class="container">
                    <div class="small_container">
                        <div class="transcript_area_main">
                            <div class="common_sub_section_heading">
                                <h2>Episode Transcript</h2>
                            </div>
                            <div class="transcript_area">

                            <?php 
                                foreach($transript as $each_transcript_item) :
                                    $script_heading_with_time_breakdown_text = $each_transcript_item['script_heading_with_time_breakdown_text'];
                                    $speakers = $each_transcript_item['speakers'];
                            ?>
                                            <div class="transcript_content">
                                                <?php if($script_heading_with_time_breakdown_text) : ?>
                                                        <h3><?php echo $script_heading_with_time_breakdown_text; ?></h3>
                                                <?php endif; ?>
                                                <?php 
                                                    foreach($speakers as $each_speaker) :
                                                        $speaker_name = $each_speaker['speaker_name'];
                                                        $speaker_content = $each_speaker['speaker_content'];
                                                ?>
                                                        <h4><?php echo $speaker_name; ?></h4>
                                                        <?php echo $speaker_content; ?>
                                                <?php endforeach; ?>
                                                
                                            </div>
                            <?php endforeach;?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php endif; ?>
    <!-- ================= MORE PODCAST PLATFORM CONTENT ============== -->
    <section class="podcast_in_other_platform_area">
        <div class="container">
            <div class="small_container">
                <div class="podcast_banner_area">
                    <div class="podcast_poster">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="podcast_image">
                                    <?php echo get_the_post_thumbnail($podcast_all_content->ID); ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="podcast_details">
                                    <div class="blog_details_area">
                                        <h3><?php echo $podcast_all_content->post_title; ?></h3>
                                    </div>
                                    <h3 class="with_whom">With Nolan Martin</h3>
                                    <div class="common_para">
                                        <p><?php echo $podcast_all_content->post_excerpt; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        if($add_listening_platform) :
                    ?>
                            <div class="podcast_bottom_area">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list_area">
                                            <?php 
                                                foreach($add_listening_platform as $platform_links_item) :
                                                    $add_listening_links_and_name = $platform_links_item['add_listening_links_and_name'];
                                            ?>
                                                    <li class="podcast_link_items">
                                                        <a href="<?php echo $add_listening_links_and_name['url']; ?>" class="common_btn_main podcast_links"><?php echo $add_listening_links_and_name['title']; ?></a>
                                                    </li>

                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= MIGHT YOU ALSO LIKE CONTENT ============== -->
    <?php 
        $exclude_post_ids = array( $podcast_all_content->ID );
        $podcast_posts = array(
            'post_type' => 'bod_podcast',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'orderby'        => 'rand',   
            'post__not_in'   => $exclude_post_ids,
        );

        $podcast_posts_query = new WP_Query($podcast_posts);
        if($podcast_posts_query->posts):
    ?>
    <section class="might_you_also_area_main">
        <div class="container">
            <div class="might_you_also_area">
                <div class="common_sub_section_heading">
                    <h2>Similar episodes you might also like</h2>
                </div>
                <div class="episodes_area">
                    <div class="row">
                    <?php
                        foreach($podcast_posts_query->posts as $might_also_like) :
                    ?>
                                    <div class="col-lg-4">
                                        <div class="episode_content">
                                            <a href="<?php echo get_permalink($might_also_like->ID); ?>">
                                                <?php echo $might_also_like->post_title; ?>
                                            </a>
                                        </div>
                                    </div>
                                    
                    <?php endforeach; ?>
                    </div>
                </div>
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