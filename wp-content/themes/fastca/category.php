<?php get_header() ?>
    <main class="category">
        <div class="container">
            <div class="category__wrap">
                <?php the_breadcrumb(); ?>
                <div class="title">
                    <h2><?php $category=get_category(get_query_var('cat')); print_r($category->name);?></h2>
                </div>
                <div class="category__content">
                    <?php echo do_shortcode('[fastca_category]');?>
                </div>
            </div>
        </div>
    </main>
<?php get_footer() ?>