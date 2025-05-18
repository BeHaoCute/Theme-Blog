<footer class="site-footer">
    <div class="footer-content">
        <div class="social-links">
            <?php
            // Lấy các URL từ Customizer
            $facebook_url = get_theme_mod('facebook_url', '');
            $twitter_url = get_theme_mod('twitter_url', '');
            $instagram_url = get_theme_mod('instagram_url', '');
            $youtube_url = get_theme_mod('youtube_url', '');

            
            if ($facebook_url) {
                echo '<a href="' . esc_url($facebook_url) . '" target="_blank" rel="noopener noreferrer">Facebook</a>';
            }
            if ($twitter_url) {
                echo '<a href="' . esc_url($twitter_url) . '" target="_blank" rel="noopener noreferrer">Twitter</a>';
            }
            if ($instagram_url) {
                echo '<a href="' . esc_url($instagram_url) . '" target="_blank" rel="noopener noreferrer">Instagram</a>';
            }
            if ($youtube_url) {
                echo '<a href="' . esc_url($youtube_url) . '" target="_blank" rel="noopener noreferrer">Youtube</a>';
            }
            ?>
        </div>
        <p>© <?php echo date('Y'); ?> - Theme cua HaoTrong.</p>
    </div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("dark-toggle");

        // Load trạng thái đã lưu
        if (localStorage.getItem("theme") === "dark") {
            document.body.classList.add("dark");
            toggle.checked = true;
        }

        toggle.addEventListener("change", function () {
            if (this.checked) {
                document.body.classList.add("dark");
                localStorage.setItem("theme", "dark");
            } else {
                document.body.classList.remove("dark");
                localStorage.setItem("theme", "light");
            }
        });
    });
</script>

<?php wp_footer(); ?>
</body>
</html>
