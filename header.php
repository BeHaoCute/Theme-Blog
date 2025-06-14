<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="header-menu">
        <div class="avatar">
            <a href="<?php echo get_permalink(get_option('page_on_front')); ?>">
                <img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="Avatar">
            </a>
        </div>

        <nav class="main-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'menu-list',
                'fallback_cb' => 'custom_fallback_menu', // Sử dụng hàm tùy chỉnh
            ]);
            ?>
        </nav>

        <div class="theme-toggle">
            <input type="checkbox" class="theme-checkbox" id="dark-toggle">
            <label for="dark-toggle" class="toggle-label"></label>
        </div>
    </div>
</header>

<?php
// Hàm fallback tùy chỉnh
function custom_fallback_menu() {
    $pages = wp_list_pages(array(
        'title_li' => '',
        'echo' => 0,
    ));
    if ($pages) {
        echo '<ul class="menu-list">' . $pages . '</ul>';
    }
}
?>
