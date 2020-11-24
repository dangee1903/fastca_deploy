<?php
// Slide của fastca
function create_fastca_website_slide()
{
  ob_start();
  if ($banner = cs_get_option('website-slide')):
    foreach ($banner as $key => $value){
    ?>
      <div class="slide__wrap-item carousel-cell">
        <a href="<?php echo $value["website-slide-link"];?>"><img src="<?php echo wp_get_attachment_url($value["website-slide-image"]);?>" alt=""></a>
      </div>
    <?php }
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}
add_shortcode('fastca-website-slide', 'create_fastca_website_slide');

// Tin tức của fastca
function create_shortcode_news($news) {
  $args2 = array(  
      'post_type' => 'post',
      'orderby'=>'date',
      'oder'=>'ASC',
      'category_name' => $news['name'],
      'posts_per_page' => 4,
  );
  $featured_query = new WP_Query( $args2 );
  ob_start();
  if ($featured_query->have_posts()): ?>
      <?php  while ($featured_query->have_posts()) :
        $featured_query->the_post(); 
          ?>
           <section class="head-bill">
              <div class="container">
                  <div class="row">
                      <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class="clearfix clearfix-40"></div>
                          <div class="row">
                              <h2 class="title-hcyberbill"><?php echo the_title(); ?></h2>
                              <div class="clearfix clearfix-30"></div>
                              <div class="des-hcyberbill">
                                  <p><?php echo the_excerpt();?></p>
                              </div>
                              <div class="clearfix clearfix-60"></div>
                              <a class="btn-showmore" href="<?php echo get_post_meta( get_the_ID(),'_link_download',true); ?>">Tìm hiểu thêm</a>
                          </div>
                      </div>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                          <div class="clearfix clearfix-30"></div>
                          <?php  the_post_thumbnail($size = '', array('class' => 'img-hbrand', 'alt' => 'Cyberlotus')); ?>
                      </div>
                      <div class="clearfix clearfix-30"></div>
                      <div class="line-hbrand"></div>
                  </div>
              </div>
          </section>
          <?php
        endwhile; ?>
     
 <?php endif;
  wp_reset_query();
  $list_post = ob_get_contents();
  ob_end_clean();

  return $list_post;
}
add_shortcode('fastca_news', 'create_shortcode_news');


function create_shortcode_related_news( ) {

  $categories = get_the_category();

  if ($categories) 
  {

   $category_ids = array();
   $post = get_post();

   foreach($categories as $category) $category_ids[] = $category->term_id;
   $args=array(
       'category__in' => $category_ids,
       'post__not_in' => array($post->ID),
       'posts_per_page' => 5, 
       'orderby'=> 'rand',
       'ignore_sticky_posts' => 1 
   );
   $featured_query = new WP_Query( $args );
   ob_start();
   if ($featured_query->have_posts()):                        
    ?>  
    <div class="relate">
      <div class="relate__title">
      <h2>Bài viết liên quan</h2>
      </div>
    <div class="relate__item">
    <ul>
      <?php while ($featured_query->have_posts()) :
            $featured_query->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>"><img src="<?php echo FASCA_THEME_URL; ?>/img/book.svg" alt=""><?php echo the_title();?></a></li>
      <?php endwhile; ?>
    </ul>
    </div>
    </div> 
   <?php  endif;
   wp_reset_query();
   $list_post = ob_get_contents();
   ob_end_clean();
   return $list_post;            

   }   

}      

add_shortcode('newca_related_news', 'create_shortcode_related_news');

function create_shortcode_category() {
  $categories = get_the_category();

  if ($categories) 
  {

   $category_ids = array();

   foreach($categories as $category) $category_ids[] = $category->term_id;
   $args=array(
       'category__in' => $category_ids,
       'orderby'=> 'DESC',
      //  'ignore_sticky_posts' => 1 
   );
  // $args2 = array(  
  //     'post_type' => 'post',
  //     'orderby'=>'date',
  //     'oder'=>'ASC',
  //     'category_name' => $news['name'],
  //     // 'posts_per_page' => 4,
  // );
  $featured_query = new WP_Query( $args );
  ob_start();
  if ($featured_query->have_posts()): ?>
      <?php  while ($featured_query->have_posts()) :
        $featured_query->the_post(); 
          ?>
           <div class="item">
            <div class="item__top">
                <h2><?php echo the_title(); ?></h2>
                <img src="<?php echo FASCA_THEME_URL; ?>/img/book.svg" alt="">
            </div>
            <p><a href="<?php the_permalink(); ?>">Chi tiết</a></p>
          </div>
          <?php
        endwhile; ?>
     
 <?php endif;
  wp_reset_query();
  $list_post = ob_get_contents();
  ob_end_clean();

  return $list_post;
}
}
add_shortcode('fastca_category', 'create_shortcode_category');