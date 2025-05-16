<?php get_header(); ?>

<main class="site-main">
    <div class="content-wrapper">
        
        <div class="entry-content">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
