<?php get_header(); ?>

<main class="site-main">
    <div class="content-wrapper">
        <!-- Banner -->
        <section class="hero-section">
            <h1>Chào mừng đến với Blog của tôi</h1>
            <p>Hãy cùng nhau khám phá những gì tôi đã đăng tải nhé.</p>
        </section>

        <!-- Ô tìm kiếm -->
        <div class="search-form">
            <form role="search" method="get" class="search-form" id="custom-search-form" action="">
                <label>
                    <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
                    <input type="search" class="search-field" placeholder="Tìm kiếm blog..." value="" name="s" id="search-input" title="Search">
                </label>
                
            </form>
        </div>

        <!-- Danh sách bài viết mới nhất -->
        <section class="latest-posts">
            <h2>Bài viết mới nhất</h2>
            <div class="search-results" id="search-results">
                <?php
                $recent_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'order' => 'DESC',
                    'orderby' => 'date',
                );
                $recent_query = new WP_Query($recent_args);
                if ($recent_query->have_posts()) :
                    while ($recent_query->have_posts()) : $recent_query->the_post();
                        ?>
                        <article class="search-result-item">
                            <h3 class="result-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <span class="result-date"><?php echo get_the_date('M d, Y'); ?></span>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No posts found.</p>';
                endif;
                ?>
            </div>
        </section>

        
    </div>
</main>

<?php get_footer(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('custom-search-form');
        const input = document.getElementById('search-input');
        const results = document.getElementById('search-results');

        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Ngăn chặn chuyển hướng mặc định

            const searchTerm = input.value.trim();
            if (searchTerm === '') {
                results.innerHTML = '<p>Please enter a search term.</p>';
                return;
            }

            // Gửi yêu cầu AJAX
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=custom_search&search_term=' + encodeURIComponent(searchTerm)
            })
            .then(response => response.text())
            .then(data => {
                results.innerHTML = data;
            })
            .catch(error => {
                results.innerHTML = '<p>Error loading results.</p>';
                console.error('Error:', error);
            });
        });
    });
</script>