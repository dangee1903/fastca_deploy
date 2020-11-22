<?php
$fastca = new WP_Query(array(
'post_type'=>'post',
'post_status'=>'publish',
'category_name' => 'tin-tuc',
'orderby' => 'ID',
'order' => 'DESC',
'posts_per_page'=> 4));
?>
<?php $i=1; while ($fastca->have_posts()) : $fastca->the_post(); ?>
<?php if($i==1){ ?>
<section class="news">
    <div class="container">
        <h2>Tin Tức FastCA</h2>
        <div class="new__content">
            <div class="new__content-left">
                <div class="content-img"><a href="<?php the_permalink() ;?>"><?php the_post_thumbnail($size = '',array( "title" => get_the_title(),"alt" => get_the_title() ));?></a></div>
                <div class="content-text">
                    <div class="text new">
                        <p><?php echo get_the_date('d')  ?> tháng <?php echo get_the_date('m')  ?> năm <?php echo get_the_date('Y')  ?></p>
                    </div>
                    <a href="<?php the_permalink() ;?>"><h2><?php the_title() ;?></h2></a>
                    <a href="<?php the_permalink() ;?>"><p><?php the_excerpt() ;?></p></a>
                    </div>
            </div>
            <div class="new__content-right">
<?php } else { ?>
    <div class="item">
        <p><?php echo get_the_date('d/m/y') ?></p>
        <a href="<?php the_permalink() ;?>"><h2><?php the_title() ;?></h2></a>
    </div>
<?php } ?>
<?php $i++; endwhile ; wp_reset_query() ;?>
            </div>
        </div>
    </div>
</section> 
<!-- <section class="news">
    <div class="container">
        <h2>Tin Tức FastCA</h2>
        <div class="new__content">
            <div class="new__content-left">
                <div class="content-img"><a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/new.png" alt=""></a></div>
                <div class="content-text">
                    <div class="text new">
                        <p>Ngày 27 tháng 9 năm 2020</p>
                    </div>
                    <a href="#"><h2>Tài chính - Ngân hàng</h2></a>
                    <a href="#"><p>Với những giao dịch quan trọng và giá trị lớn thì chữ ký số là một giải pháp an toàn, hiệu quả cho cả ngân hàng (người cung cấp dịch vụ) lẫn khách hàng (người sử dụng dịch vụ).</p></a>
                </div>
            </div>
            <div class="new__content-right">
                <div class="item">
                    <p>26/9/2020</p>
                    <h2>FastCA 5 năm - Chặng đường khát vọng</h2>
                </div>
                <div class="item">
                    <p>26/9/2020</p>
                    <h2>FastCA 5 năm - Chặng đường khát vọng,</h2>
                </div>
                <div class="item">
                    <p>26/9/2020</p>
                    <h2>Hướng dẫn kiểm tra email giả mạo Nhà cung cấp</h2>
                </div>
            </div>
        </div>
    </div>
</section> -->