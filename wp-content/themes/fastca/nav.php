<nav>
    <div class="container">
        <div class="menu__mobile">
            <a class="humberger"><span></span></a>
            <a href="#"><img src="<?php echo FASCA_THEME_URL; ?>/img/logo.svg" alt=""></a>
        </div>
    </div>
    <div class="menu__content">
        <ul>
            <?php 
            $menuLocations = get_nav_menu_locations(); 
            $menuID = $menuLocations['nav-menu']; 
            $primaryNav = wp_get_nav_menu_items($menuID); 
            $id_parent =0;
            $category=get_category(get_query_var('cat'));
            foreach ( $primaryNav as $navItem ) {
                if($navItem -> menu_item_parent == $id_parent){
                    echo '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a><i><img src="'. FASCA_THEME_URL .'/img/arrow.svg" alt=""></i></li>'; 
                    $sub="";
                    foreach ( $primaryNav as $navItem2 ) { 
                        if($navItem2 -> menu_item_parent == $navItem ->ID){
                        $sub .= '<li><a href="'.$navItem2->url.'" title="'.$navItem2->title.'">'.$navItem2->title.'</a><i><img src="'. FASCA_THEME_URL .'/img/arrow.svg" alt=""></i>';
                        $sub2="";
                        $sub .= '<ul>'.$sub2.'</ul>'; 
                        $sub .= '';
                        } 
                    }
                echo '<ul>'.$sub.'</ul>';
                echo '</li>';
                }
            }    
            ?>
        </ul>
    </div>
</nav>