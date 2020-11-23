<?php
define('FASCA_THEME_URL', get_template_directory_uri());
define('FASCA_THEME_JS_URL', FASCA_THEME_URL . '/js');
define('FASCA_THEME_CSS_URL', FASCA_THEME_URL . '/dest');
define('FASCA_THEME_IMG_URL', FASCA_THEME_URL . '/img');
define('FASCA_THEME_DIR', get_template_directory());
/*============================================================================
 * 1. NẠP NHỮNG TẬP TIN CSS VÀO THEME
 ============================================================================*/
add_action('wp_enqueue_scripts', 'zendvn_theme_register_style');

function zendvn_theme_register_style(){
	global $wp_styles;
	$cssUrl = get_template_directory_uri() . '/dest';
	wp_register_style('fastca_theme_customizer', $cssUrl . '/style.min.css',array(),'1.0');
    wp_enqueue_style('fastca_theme_customizer');
    wp_register_style('fastca_theme_customizerFont', $cssUrl . '/fonts.css',array(),'1.0');
    wp_enqueue_style('fastca_theme_customizerFont');
    wp_register_style('fastca_theme_customizerStyleLib', $cssUrl . '/stylelibs.min.css',array(),'1.0');
	wp_enqueue_style('fastca_theme_customizerStyleLib');
}
/*============================================================================
 * 2. Setup Cho themes
 ============================================================================*/
add_action('after_setup_theme', 'zendvn_theme_support');
function zendvn_theme_support(){
    add_theme_support( 'post-formats', array('aside','image','gallery','video','audio') );
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');

}
/*============================================================================
 * 3. THEM VUNG MENU VAO TRONG THEME
============================================================================*/
add_action('init', 'zendvn_theme_register_menus');
function zendvn_theme_register_menus(){
	register_nav_menus(
		array(
            'nav-menu' 		=> __('Mobile menu'),
			'top-menu' 		=> __('Top menu'),
            'footer-menu' 	=> __('Footer menu'),
		)
	);
}
/*============================================================================
 * 4. THEM CSFramwork VAO TRONG THEME
============================================================================*/
require_once dirname(__FILE__) . '/core/shortcode.php';
require_once dirname(__FILE__) .'/cs-framework/cs-framework.php';
define( 'CS_ACTIVE_FRAMEWORK',  true  );
define( 'CS_ACTIVE_METABOX',    false  ); // default true
define( 'CS_ACTIVE_TAXONOMY',   false ); // default true
define( 'CS_ACTIVE_SHORTCODE',  false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',  false ); // default true

/*============================================================================
 * 5. THEM CSFramwork VAO TRONG THEME
============================================================================*/
function init_meta() {
    $options = get_option('init_theme_options');
    if (is_home()) { ?>
<meta property="og:description" content="Hóa đơn điện tử CyberBill">
<meta name="keywords" content="<?php echo $options['metakeywords']; ?>">
<meta property="og:url" content="<?php bloginfo('url'); ?>">
<meta property="og:title" content="<?php bloginfo('name'); ?> – <?php bloginfo('description'); ?>">
<meta property="og:description" content="<?php echo $options['metadescription']; ?>">
<meta property="og:type" content="website">
<meta property="og:locale" content="vi_VN">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@InitHTML">
<meta name="twitter:title" content="<?php bloginfo('name'); ?> – <?php bloginfo('description'); ?>">
<meta name="twitter:description" content="<?php echo $options['metadescription']; ?>">
<meta name="twitter:image" content="<?php echo $options['socialsimg']; ?>">
<?php }
    if (is_category()) {
        $cat_title = single_cat_title('', false);
        $cat_name = mb_strtolower($cat_title); $cat_name = str_replace('"', '', $cat_name); $cat_name = str_replace('“', '', $cat_name); $cat_name = str_replace(',', '', $cat_name); $cat_name = str_replace('!', '', $cat_name); $cat_name = str_replace('”', '', $cat_name);
        $category = get_term_by('name', $cat_title, 'category');
        $cat_link = get_category_link($category->term_id);
        $cat_desc = wp_trim_words(category_description(), 25, '...');
        if (!$cat_desc) $cat_desc = $options['metadescription'];
?>
<meta property="og:description" content="Hóa đơn điện tử CyberBill">
<meta name="keywords" content="<?php echo $cat_name . ', ' . $options['metakeywords']; ?>">
<meta property="og:url" content="<?php echo $cat_link; ?>">
<meta property="og:title" content="<?php echo $cat_title; ?> – <?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php echo $cat_desc; ?>">
<meta property="og:type" content="object">
<meta property="og:locale" content="vi_VN">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@InitHTML">
<meta name="twitter:title" content="<?php echo $cat_title; ?> – <?php bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php echo $cat_desc; ?>">
<meta name="twitter:image" content="<?php echo $options['socialsimg']; ?>">
<?php }
    if (is_tag()) {
        $tag_title = single_tag_title('', false);
        $tag_desc = 'Tag: ' . $tag_title . ' – ' . $options['metadescription'];
        $tag = get_term_by('name', $tag_title, 'post_tag');
        $tag_link = get_tag_link($tag->term_id);
?>
<meta name="description" content="<?php echo $tag_desc; ?>">
<meta name="keywords" content="<?php echo $tag_title . ', ' . $options['metakeywords']; ?>">
<meta property="og:url" content="<?php echo $tag_link; ?>">
<meta property="og:title" content="<?php echo $tag_title; ?> – <?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php echo $tag_desc; ?>">
<meta property="og:type" content="object">
<meta property="og:image" content="<?php echo $options['socialsimg']; ?>">
<meta property="og:locale" content="vi_VN">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@InitHTML">
<meta name="twitter:title" content="<?php echo $tag_title; ?> – <?php bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php echo $tag_desc; ?>">
<meta name="twitter:image" content="<?php echo $options['socialsimg']; ?>">
<?php }
    if (is_month()) {
        $month_title = trim(single_month_title(' ', false));
        $month_name = trim(strtolower($month_title));
        $month_desc = 'Archive: ' . $month_title . ' – ' . $options['metadescription'];
        $archive_year  = get_the_time('Y');
        $archive_month = get_the_time('m');
        $month_link = get_month_link($archive_year, $archive_month);
?>
<meta name="description" content="<?php echo $month_desc; ?>">
<meta name="keywords" content="<?php echo $month_name . ', ' . $options['metakeywords']; ?>">
<meta property="og:url" content="<?php echo $month_link; ?>">
<meta property="og:title" content="<?php echo $month_title; ?> – <?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php echo $month_desc; ?>">
<meta property="og:type" content="object">
<meta property="og:image" content="<?php echo $options['socialsimg']; ?>">
<meta property="og:locale" content="vi_VN">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@InitHTML">
<meta name="twitter:title" content="<?php echo $month_title; ?> – <?php bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php echo $month_desc; ?>">
<meta name="twitter:image" content="<?php echo $options['socialsimg']; ?>">
<?php }
    if (is_author()) {
        $author_title = get_the_author();
        $author_name = mb_strtolower($author_title);
        $author_desc = 'Author: ' . $author_title . ' – ' . $options['metadescription'];
        $author_link = get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename'));
?>
<meta name="description" content="<?php echo $author_desc; ?>">
<meta name="keywords" content="<?php echo $author_name . ', ' . $options['metakeywords']; ?>">
<meta property="og:url" content="<?php echo $author_link; ?>">
<meta property="og:title" content="<?php echo $author_title; ?> – <?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php echo $author_desc; ?>">
<meta property="og:type" content="object">
<meta property="og:image" content="<?php echo $options['socialsimg']; ?>">
<meta property="og:locale" content="vi_VN">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@InitHTML">
<meta name="twitter:title" content="<?php echo $author_title; ?> – <?php bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php echo $author_desc; ?>">
<meta name="twitter:image" content="<?php echo $options['socialsimg']; ?>">
<?php }
    if (is_singular('post')) {
        if (have_posts()) : while (have_posts()) : the_post(); endwhile; endif;
        $title = get_the_title();
        $excerpt = esc_attr(wp_trim_words(get_the_excerpt(), 25, '...'));
        $link = get_the_permalink();
        $cat_name = mb_strtolower($title); $cat_name = str_replace('"', '', $cat_name); $cat_name = str_replace('“', '', $cat_name); $cat_name = str_replace(',', '', $cat_name); $cat_name = str_replace('!', '', $cat_name); $cat_name = str_replace('”', '', $cat_name);
?>
<meta name="description" content="<?php echo $excerpt; ?>">
<meta name="keywords" content="<?php echo $cat_name . ', ' . $options['metakeywords']; ?>">
<meta property="og:url" content="<?php echo $link; ?>">
<meta property="og:title" content="<?php echo $title; ?> – <?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php echo $excerpt; ?>">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="og:type" content="article">
<?php
    $posttags = get_the_tags();
    if ($posttags) {
        foreach($posttags as $tag) {
            echo '<meta property="article:tag" content="' . $tag->name . '">';
        }
    }
?>
<meta property="og:image" content="<?php the_post_thumbnail_url('large-thumb'); ?>">
<meta property="og:locale" content="vi_VN">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@InitHTML">
<meta name="twitter:title" content="<?php echo $title; ?> – <?php bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php echo $excerpt; ?>">
<meta name="twitter:image" content="<?php the_post_thumbnail_url('large-thumb'); ?>">
<?php }
    if (is_page()) {
        if (have_posts()) : while (have_posts()) : the_post(); endwhile; endif;
        $title = get_the_title();
        $excerpt = esc_attr(wp_trim_words(get_the_excerpt(), 25, '...'));
        $link = get_the_permalink();
        $cat_name = mb_strtolower($title); $cat_name = str_replace('"', '', $cat_name); $cat_name = str_replace('“', '', $cat_name); $cat_name = str_replace(',', '', $cat_name); $cat_name = str_replace('!', '', $cat_name); $cat_name = str_replace('”', '', $cat_name);
?>
<meta name="description" content="<?php echo $excerpt; ?>">
<meta name="keywords" content="<?php echo $cat_name . ', ' . $options['metakeywords']; ?>">
<meta property="og:url" content="<?php echo $link; ?>">
<meta property="og:title" content="<?php echo $title; ?> – <?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php echo $excerpt; ?>">
<meta property="og:type" content="article">
<meta property="og:image" content="<?php echo $options['socialsimg']; ?>">
<meta property="og:locale" content="vi_VN">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@InitHTML">
<meta name="twitter:title" content="<?php echo $title; ?> – <?php bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php echo $excerpt; ?>">
<meta name="twitter:image" content="<?php echo $options['socialsimg']; ?>">
<?php }
}
/*
* Allow upload file
*/
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
//add zip file support for media uploads
function zip_upload_mimes($existing_mimes = array()) {
    $existing_mimes['zip'] = 'application/zip';
    $existing_mimes['gz'] = 'application/x-gzip';
    $existing_mimes['exe'] = 'application/x-msdownload';
    return $existing_mimes;
}
add_filter('upload_mimes', 'zip_upload_mimes', 999, 1);
//* Remove WordPress's default image sizes
function remove_default_image_sizes( $sizes) {
    unset( $sizes['large']);
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['medium_large']);
    unset( $sizes['1536x1536']);
    unset( $sizes['2048x2048']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');  

// Remove jQuery Migrate Script from header and Load jQuery from Google API
function crunchify_stop_loading_wp_embed_and_jquery() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
        wp_deregister_script('jquery');  // Bonus: remove jquery too if it's not required
    }
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');

// <div class="pagination">
//             <p>Trang Chủ</p>
//             <i><img src="<?p>/img/arrow-blue.svg" alt=""></i>
//             <p>Sản Phẩm</p>
//             <i><img src="/img/arrow-blue.svg" alt=""></i>
//             <p>Chữ ký số cho Tổ chức, doanh nghiệp</p>
//         </div>
function the_breadcrumb() {

    $sep = '<i><img src="'.FASCA_THEME_URL.'/img/arrow-blue.svg" alt=""></i>';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="pagination">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
        // echo '<i><img src="'.FASCA_THEME_URL.'/img/arrow-blue.svg" alt=""></i>';
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}