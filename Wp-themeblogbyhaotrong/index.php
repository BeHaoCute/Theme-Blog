<?php get_header(); ?>

<main class="site-main">
    <div class="content-wrapper">
        
        <p class="page-description">Đây là nơi tôi chia sẻ những bài viết mới nhất.</p>

        <div class="posts-list">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="post-content">
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="post-meta">
                            <span class="post-date">Đăng ngày: <?php echo get_the_date('d/m/Y H:i'); ?></span>
                            
                        </div>
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="read-more">Đọc thêm</a>
                    </div>
                </article>
            <?php endwhile; else: ?>
                <p>Không có bài viết nào.</p>
            <?php endif; ?>
        </div>

        <!-- Phân trang (nếu cần) -->
        <div class="pagination">
            <?php
            the_posts_pagination([
                'prev_text' => '« Trước',
                'next_text' => 'Tiếp »',
            ]);
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>