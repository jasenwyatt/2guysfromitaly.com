<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Element_Custom_List_Menu extends \Bricks\Element {
  /** 
   * How to create custom elements in Bricks
   * 
   * https://academy.bricksbuilder.io/article/create-your-own-elements
   */
  public $category     = 'custom';
  public $name         = 'list-menu';
  public $icon         = 'fa-solid fa-utensils'; // FontAwesome 5 icon in builder (https://fontawesome.com/icons)
  public $css_selector = '.custom-list-menu-wrapper'; // Default CSS selector for all controls with 'css' properties
  // public $scripts      = []; // Enqueue registered scripts by their handle

  public function get_label() {
    return esc_html__( 'Menu List', 'bricks' );
  }

  public function set_control_groups() {}

  public function set_controls() {}

  /** 
   * Render element HTML on frontend
   * 
   * If no 'render_builder' function is defined then this code is used to render element HTML in builder, too.
   */
    public function render() {
      $settings = $this->settings;

      $categories = get_categories(array(
        'taxonomy' => 'menu_category',
        'orderby' => 'menu_order'
      ));

      /**
       * '_root' attribute contains element ID, classes, etc. 
       * 
       * @since 1.4
       */
      $output = "<section {$this->render_attributes( '_root' )}>";

      $output .= '
        <div class="mx-auto max-w-7xl px-6 py-10">
          <h2 class="my-12 text-3xl lg:text-5xl font-bold tracking-tight text-gray-900">Our Menu</h2>
          <ul class="list-none flex flex-row gap-x-4 overflow-x-auto hide-scroll-bar p-0 m-0 border-t-2 border-b-2 border-x-0 border-solid border-black">';
            foreach ($categories as $category) {
              $output .= '<li class="text-nowrap py-4"><a href="#'.esc_html($category->slug).'" class="font-bold uppercase text-red-500">'.esc_html($category->name).'</a></li>';
            }
            $output .= '
          </ul>';

      foreach ($categories as $category) {
        $menu_items = new WP_Query(array(
          'post_type' => 'menu',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'menu_category',
              'field' => 'term_id',
              'terms' => $category->term_id,
            ),
          ),
        ));

        $output .= '<div id="'.esc_attr($category->slug).'" class="my-8">';
        $output .= '<h3 class="text-2xl font-bold mb-4">'.esc_html($category->name).'</h3>';
        $output .= '<div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">';

        if ($menu_items->have_posts()) {
          while ($menu_items->have_posts()) {
            $menu_items->the_post();
            $output .= '<div class="group relative flex flex-col overflow-hidden rounded-lg border border-solid border-gray-200 bg-white">';

            if (has_post_thumbnail()) {
              $output .= '
                <div class="aspect-h-3 aspect-w-4 bg-gray-200 sm:aspect-none group-hover:opacity-75 sm:h-72">
                  <img src="'.get_the_post_thumbnail_url().'" alt="'.esc_attr(get_the_title()).'" class="h-full w-full object-cover object-center sm:h-full sm:w-full">
                </div>';
            }

            $output .= '
              <div class="flex flex-1 flex-col space-y-4 p-4 min-h-56">
                <h4 class="text-lg font-medium text-gray-900">'.esc_html(get_the_title()).'</h4>
                <p class="text-sm text-gray-500">'.get_the_content().'</p>
                <div class="flex flex-1 flex-col justify-end">';

                  // Check rows exists.
                  if( have_rows('item_prices') ):
                    // Loop through rows.
                    while( have_rows('item_prices') ) : the_row();
                        $output .= '
                        <div class="bg-gray-50 my-1 px-2 py-2 rounded-md text-base font-medium text-gray-900 flex flex-row items-center">
                          <div class="flex-initial w-64">'.esc_html(get_sub_field('item_size')).'</div>
                          <div class="flex-initial w-32 text-right">$'.esc_html(get_sub_field('item_price')).'</div>
                        </div>';
                    // End loop.
                    endwhile;

                  // No value.
                  else :
                    $output .= '<div class="bg-gray-50 my-1 px-2 py-2 rounded-md text-base font-medium text-gray-900">$'.esc_html(get_field('item_price')).'</div>';
                  endif;

            $output .= '
                </div>
              </div>
            </div>';
          }
          wp_reset_postdata();
        } else {
          $output .= '<p>No menu items available for this category.</p>';
        }

        $output .= '</div></div>';
      }

      $output .= '</div>';
      $output .= '</section>';

      // Output final element HTML
      echo $output;
  }

}
