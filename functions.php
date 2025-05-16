<?php
// Load CSS
add_action('wp_enqueue_scripts', 'LoadCSS');
function LoadCSS() {
    wp_enqueue_style('main_css', get_stylesheet_uri(), [], time());
}

// Đăng ký menu
add_action('after_setup_theme', 'register_my_menu');
function register_my_menu() {
    register_nav_menu('primary', __('Primary Menu'));
}

// Header
function theme_setup() {
    register_nav_menu('main-menu', 'Main Menu');
}
add_action('after_setup_theme', 'theme_setup');

// Footer
function register_my_menus() {
    register_nav_menus([
        'footer-menu' => __('Footer Menu')
    ]);
}
add_action('init', 'register_my_menus');

// Thêm tùy chọn mạng xã hội vào Customizer
function theme_customizer_social_links($wp_customize) {
    $wp_customize->add_section('social_links_section', [
        'title' => __('Social Media Links', 'themeblog'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('facebook_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('facebook_url', [
        'label' => __('Facebook URL', 'themeblog'),
        'section' => 'social_links_section',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('twitter_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('twitter_url', [
        'label' => __('X URL', 'themeblog'),
        'section' => 'social_links_section',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('instagram_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('instagram_url', [
        'label' => __('Instagram URL', 'themeblog'),
        'section' => 'social_links_section',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('youtube_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('youtube_url', [
        'label' => __('Youtube URL', 'themeblog'),
        'section' => 'social_links_section',
        'type' => 'url',
    ]);
}
add_action('customize_register', 'theme_customizer_social_links');

// Hàm xử lý AJAX cho tìm kiếm
add_action('wp_ajax_custom_search', 'custom_search_callback');
add_action('wp_ajax_nopriv_custom_search', 'custom_search_callback');

function custom_search_callback() {
    $search_term = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        's' => $search_term,
    );

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <article class="search-result-item">
                <h2 class="result-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <span class="result-date"><?php echo get_the_date('M d, Y'); ?></span>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No results found for "' . esc_html($search_term) . '".</p>';
    endif;
    echo ob_get_clean();
    wp_die();
}