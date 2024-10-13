<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php do_action( 'bricks_meta_tags' ); ?>
<?php wp_head(); ?>
<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- /Alpine.js -->
</head>
<?php
do_action( 'bricks_body' );
do_action( 'bricks_before_site_wrapper' );
do_action( 'bricks_before_header' );
do_action( 'render_header' );
do_action( 'bricks_after_header' );
?>
<header>
    Site Header
</header>