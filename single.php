<?php get_header(); ?>

<main class="site-main">
    <div class="content-wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="single-post">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <h1 class="post-title"><?php the_title(); ?></h1>

                <div class="post-meta">
                    <span class="post-date">Đăng ngày: <?php echo get_the_date('d/m/Y H:i'); ?></span>
                    
                </div>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; else : ?>
            <p>Không tìm thấy bài viết.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>