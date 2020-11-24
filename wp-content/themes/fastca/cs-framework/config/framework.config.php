<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Theme Setting',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'fastca-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'FASTCA Framework <small>by FASTCA</small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();
$options[] = array(
    'name'   => 'website-setup',
    'title'  => 'Cấu hình website',
    'icon'   => 'fa fa-star'
);

// ----------------------------------------
// Homepage -
// ----------------------------------------
$options[]      = array(
  'name'        => 'homepage_st',
  'title'       => 'Slide settings',
  'icon'        => 'fa fa-home',
  'fields'      => array(

        array(
            'id'              => 'website-slide',
            'type'            => 'group',
            'button_title'    => 'Thêm hình ảnh',
            'accordion_title' => 'Ảnh của slide',
            'fields'          => array(
                array(
                    'id'        => 'website-sislidede-name',
                    'type'      => 'text',
                    'title'     => 'Tên hình',
                    'default'   => 'Fastca',
                    'desc'      => 'Nhập tên ảnh của bạn...',
                ),
                array(
                    'id'        => 'website-slide-image',
                    'type'      => 'image',
                    'title'     => 'Ảnh',
                    'default'   => '',
                    'desc'      => 'Nhập ảnh của bạn...(Hãy chọn ảnh có kích thước 1330px x 250px để hiển thị tốt nhất)',
                ),
                array(
                    'id'        => 'website-slide-link',
                    'type'      => 'text',
                    'title'     => 'Link Ảnh',
                    'default'   => '',
                    'desc'      => 'Nhập đường dẫn bạn muốn chuyển trang',
                ),
            )
        ),


  )
);
CSFramework::instance( $settings, $options );
