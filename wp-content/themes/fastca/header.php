<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php 
			wp_title('|', true,'right');
			bloginfo('name');
		?>
    </title>
    <link rel="icon" href="<?php echo FASCA_THEME_URL; ?>/img/fastca.png">
    <!-- <meta name="title" content="" />
    <meta name="description" content="" />
    <meta property="og:locale" content="vi" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Trang chủ" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" /> -->
<!-- 
    <link rel="stylesheet" href="dest/style.min.css">
    <link rel="stylesheet" href="dest/fonts.css">
    <link rel="stylesheet" href="dest/stylelibs.min.css"> -->
    <?php   
        wp_head();
        init_meta();
        $tem_url = get_bloginfo('template_url');
    ?>
</head>
    <!-- <div class="loader-wrap">
        <div class="loader"></div>
    </div> -->
    <div class="background">
        <img src="<?php echo FASCA_THEME_URL; ?>/img/background.png" alt="">
    </div>
    <?php require_once FASCA_THEME_DIR . "/nav.php";?>
    <header>
        <div class="logo__mobile">
            <a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/logo.svg" alt=""></a>
        </div>
        <div class="container">
            <div class="menu">
                <?php require_once FASCA_THEME_DIR . "/top-menu.php";?>
            </div>
            <div class="logo">
                <a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/logo.svg" alt=""></a>
                <h1>FASTCA</h1>
            </div>
            <div class="btn__header">
                <div class="btn">
                    <div class="btn__wrap">
                        <i><img src="<?php echo FASCA_THEME_URL; ?>/img/cloud.svg" alt=""></i>
                        <a href="#">Tải Xuống</a>
                    </div>
                </div>
                <div class="btn">
                    <div class="btn__wrap">
                        <a href="#">Về FastCA</a>
                    </div>
                </div>
                <div class="btn yellow">
                    <div class="btn__wrap">
                        <a href="#" class="hotro">Hỗ Trợ</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="loader-wrap">
        <div class="loader"></div>
    </div>