<?php 
/**
 * Register/enqueue custom scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {
	// Enqueue your files on the canvas & frontend, not the builder panel. Otherwise custom CSS might affect builder)
	if ( ! bricks_is_builder_main() ) {
		wp_enqueue_style( 'bricks-child', get_stylesheet_uri(), ['bricks-frontend'], filemtime( get_stylesheet_directory() . '/style.css' ) );
	}
} );

/**
 * Register custom includes
 */
$bricks_includes = [
  'includes/comments.php',          // Disable commenting system
  'includes/head-cleaner.php',      // Cleans up WP head
  //'includes/admin-columns.php',   // Custom columns for admin
];

foreach ($bricks_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'bricks'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);

/**
 * Register custom elements
 */
add_action( 'init', function() {
  $element_files = [
    __DIR__ . '/elements/list-menu.php',
    __DIR__ . '/elements/list-faqs.php',
    __DIR__ . '/elements/ordering-display.php',
  ];

  foreach ( $element_files as $file ) {
    \Bricks\Elements::register_element( $file );
  }
}, 11 );

/**
 * Add text strings to builder
 */
add_filter( 'bricks/builder/i18n', function( $i18n ) {
  // For element category 'custom'
  $i18n['custom'] = esc_html__( 'Custom', 'bricks' );

  return $i18n;
} );

