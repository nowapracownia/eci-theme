    <footer><a name="menu5"></a>
        <?php

            if(isset($GLOBALS['meta']['fbg']) && !empty($GLOBALS['meta']['fbg'])) :

                $fbg_url = wp_get_attachment_image_url($GLOBALS['meta']['fbg'],'full');
                $fct = $GLOBALS['meta']['fct']; ?>

                <div class="site-footer" style="background-image:url(<?php echo $fbg_url; ?>);"><?php echo $fct; ?></div>

            <?php endif;

        ?>
        <p><?php _e('Footer','mti-test'); ?></p>
    </footer>
</div> <!-- end site wrapper -->
<?php wp_footer(); ?>
</body>
</html>
