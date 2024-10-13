<?php namespace Bricks; ?>

<footer class="bg-red-500 p-6 lg:px-8">
    <p class="text-sm text-red-100">Copyright &copy; <?php echo date('Y'); ?> Two Guys From Italy &bull; All rights reserved.</p>
</footer>

<?php
do_action( 'bricks_before_footer' );
do_action( 'render_footer' );
do_action( 'bricks_after_footer' );
do_action( 'bricks_after_site_wrapper' );
wp_footer();

echo '</body>';
echo '</html>';
