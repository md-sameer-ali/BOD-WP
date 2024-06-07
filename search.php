<?php 

get_header();
$directory = get_stylesheet_directory_uri();
$podcast_with_person = get_field('podcast_with_person', 'options');
?>

<?php

    $post_type = $_GET['field'];

    $s=get_search_query();
    $args = array(
        'post_type' => $post_type,
        's' =>$s
    );
        // The Query
    $blog_posts_query = new WP_Query( $args );
    if($blog_posts_query->posts) :
?>

    <section class="recent_article_main">
            <div class="container">
                <div class="recent_article">
                    <h2>Recent <?php echo ($post_type == 'blogs') ? 'Articles' : 'Episodes' ?></h2>
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
                            <?php
                                if($post_type == 'bod_podcast'): 
                            ?>

                                            <div class="podcast_organizer">
                                                <img src="<?php echo $podcast_with_person['url']; ?>" alt="<?php echo $podcast_with_person['alt']; ?>">
                                                <span>Nolan Martin</span>
                                            </div>

                            <?php endif; ?>
                            <p><?php echo $each_blog->post_excerpt; ?></p>
                            <a href="<?php echo get_permalink($each_blog->ID); ?>" class="own-path-btn">Read The Blog</a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="javascript:history.go(-1)" style="display:block; color:var(--theme-color); font-size:1.5rem;  text-align:center;"  ><i class="fa-solid fa-arrow-left" style="font-size:1.5rem; margin-right:10px;" ></i>Back</a>
                    

                </div>

            </div>
    </section>
    <?php else: ?>
        <section class="recent_article_main">
            <div class="container">
                <div class="recent_article">
                    <h2 style="text-align:center;" >😥Sorry No result found</h2>
                    <a href="https://graylineglobal.com/bod/blog/" style="display:block; color:var(--theme-color); font-size:1.5rem;  text-align:center;" ><i class="fa-solid fa-arrow-left" style="font-size:1.5rem; margin-right:10px;"  ></i>Back</a>
                </div>

            </div>
    </section>
    <?php endif; ?>

<?php get_footer(); ?>