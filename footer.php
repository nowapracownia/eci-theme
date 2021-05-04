   <footer>
        <?php

            if(isset($GLOBALS['meta']['fbg']) && !empty($GLOBALS['meta']['fbg'])) :

                $fbg_url = wp_get_attachment_image_url($GLOBALS['meta']['fbg'],'full'); ?>

                <div class="site-footer" style="background-image:url(<?php echo $fbg_url; ?>);"></div>

            <?php endif;

        ?>
        <p><?php _e('Footer','mti-test'); ?></p>
    </footer>
</div> <!-- end site wrapper -->
<?php wp_footer(); ?>
</body>
</html>
