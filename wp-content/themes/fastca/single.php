<?php get_header();?>

<body>
<main class="single">
    <div class="container">
    <div class="single__wrap">
        <?php the_breadcrumb(); ?>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="title">
            <h2><?php echo the_title();?></h2>
        </div>
        <div class="social">
            <div class="social__wrap">
                <p>Chia sẻ</p>
                <i><a href="https://www.facebook.com/sharer?u=&lt;?php the_permalink();?&gt;&amp;t=&lt;?php the_title(); ?&gt;" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo FASCA_THEME_URL; ?>/img/facebook.svg" alt=""></a></i>
                <i><a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/youtobe.svg" alt=""></a></i>
                <div class="support">
                    <p><span>Hỗ Trợ:</span>19002158</p>
                </div>
            </div>
        </div>
        <div class="content">
             <?php the_content() ?>
        </div>
        <?php endwhile;?>
        <?php endif; ?>
        <div class="hr"></div>
        <?php echo do_shortcode('[newca_related_news]'); ?>
        <!-- <div class="relate">
            <div class="relate__title">
                <h2>Bài viết liên quan</h2>
            </div>
            <div class="relate__item">
                <ul>
                    <li><a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/book.svg" alt="">Chữ ký số cho tổ chức, doanh nghiệp</a></li>
                    <li><a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/book.svg" alt="">Chữ ký số cho tổ chức, doanh nghiệp</a></li>
                    <li><a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/book.svg" alt="">Chữ ký số cho tổ chức, doanh nghiệp</a></li>
                    <li><a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/book.svg" alt="">Chữ ký số cho tổ chức, doanh nghiệp</a></li>
                    <li><a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/book.svg" alt="">Chữ ký số cho tổ chức, doanh nghiệp</a></li>
                </ul>
            </div>
        </div> -->
    </div>
</main>
<?php get_footer();?>