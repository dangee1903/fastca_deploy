<div class="menu__wrap">
    <ul>
    <?php 
        $menuLocations = get_nav_menu_locations(); 
        $menuID = $menuLocations['top-menu']; 
        $primaryNav = wp_get_nav_menu_items($menuID); 
        $id_parent =0;
        $category=get_category(get_query_var('cat'));
        foreach ( $primaryNav as $navItem ) {
            if($navItem -> menu_item_parent == $id_parent){
                if($category->name == $navItem->title){
                    echo '<li class="active"><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a><i><img src="'. FASCA_THEME_URL .'/img/arrow.svg" alt=""></i>'; 
                }else{
                    echo '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a><i><img src="'. FASCA_THEME_URL .'/img/arrow.svg" alt=""></i>'; 
                }
                $sub="";
                foreach ( $primaryNav as $navItem2 ) { 
                    if($navItem2 -> menu_item_parent == $navItem ->ID){
                    $sub .= '<li><a href="'.$navItem2->url.'" title="'.$navItem2->title.'">'.$navItem2->title.'</a><i><img src="'. FASCA_THEME_URL .'/img/arrow.svg" alt=""></i>';
                    $sub2="";
                        foreach ( $primaryNav as $navItem3 ) { 
                            if($navItem3 -> menu_item_parent == $navItem2 ->ID){
                                $sub2 .= '<li><a href="'.$navItem3->url.'" title="'.$navItem3->title.'">'.$navItem3->title.'</a><i><img src="'. FASCA_THEME_URL .'/img/arrow.svg" alt=""></i>';
                            } 
                        }
                    $sub .= '<ul>'.$sub2.'</ul>'; 
                    $sub .= '</li>';
                    } 
                }
            echo '<ul>'.$sub.'</ul>';
            echo '</li>';
            }
        }    
    ?>     
    </ul>
</div>
<!-- <li><a href="#">Sản Phẩm</a><i><img src="<?php echo FASCA_THEME_URL; ?>/img/arrow.svg" alt=""></i>
    <ul>
        <li><a href="#">Bảng Giá</a><i><img src="<?php echo FASCA_THEME_URL; ?>/img/arrow.svg" alt=""></i></li>
        <li><a href="#">Bảng Giá</a><i><img src="<?php echo FASCA_THEME_URL; ?>/img/arrow.svg" alt=""></i></li>
    </ul>
</li>
<li><a href="#">Bảng Giá</a><i><img src="<?php echo FASCA_THEME_URL; ?>/img/arrow.svg" alt=""></i></li>
<li><a href="#">Giải Pháp</a><i><img src="<?php echo FASCA_THEME_URL; ?>/img/arrow.svg" alt=""></i></li>
<li><a href="#">Hỗ Trợ</a><i><img src="<?php echo FASCA_THEME_URL; ?>/img/arrow.svg" alt=""></i></li> -->