<?php
  $directory = get_stylesheet_directory_uri();
  $logo_img = get_field('logo_image', 'options');
  $login_btn = get_field('log_in_button_link', 'options');
  $join_us_btn = get_field('join_us_button_link', 'options');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board Of Directors PRO</title>

    <?php wp_head(); ?>
</head>

<body>
    <!-- ================= HEADER AREA ============== -->
    <header class="nav-header">
        <div class="container">
            <div class="header">
                <div class="logo-area">
                    <a href="<?php echo site_url(); ?>">
                        <img src="<?php echo $logo_img['url'] ?>" alt="<?php echo $logo_img['alt'] ?>">
                    </a>
                </div>
                <div class="nav-area-main">
                    <nav class="nav-area">
                        <div class="mobile-nav">
                            <div class="logo-area">
                                <a href="<?php echo site_url(); ?>">
                                    <img src="<?php echo $logo_img['url'] ?>" alt="<?php echo $logo_img['alt'] ?>">
                                </a>
                                <i class="fa-solid fa-xmark cross"></i>
                            </div>
                        </div>
                        <?php header_nav(); ?>
                    </nav>
                    <div class="contact-btn">
                        <a href="<?php echo $login_btn['url']; ?>" class="btn-one">
                            <?php echo $login_btn['title']; ?>
                        </a>
                        <a href="<?php echo $join_us_btn['url']; ?>" class="btn-two">
                             <?php echo $join_us_btn['title']; ?>
                        </a>
                    </div>
                    <div class="menu-bar">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="black-overlay"></div>