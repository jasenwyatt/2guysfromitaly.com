<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Element_Custom_List_Faqs extends \Bricks\Element {
  /** 
   * How to create custom elements in Bricks
   * 
   * https://academy.bricksbuilder.io/article/create-your-own-elements
   */
  public $category     = 'custom';
  public $name         = 'list-faqs';
  public $icon         = 'fa-solid fa-circle-question'; // FontAwesome 5 icon in builder (https://fontawesome.com/icons)
  public $css_selector = '.custom-list-faqs-wrapper'; // Default CSS selector for all controls with 'css' properties
  // public $scripts      = []; // Enqueue registered scripts by their handle

  public function get_label() {
    return esc_html__( 'FAQs List', 'bricks' );
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

      $faqs = new WP_Query(array(
        'post_type' => 'faqs',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
      ));

      /**
       * '_root' attribute contains element ID, classes, etc. 
       * 
       * @since 1.4
       */
      $output = "<div {$this->render_attributes( '_root' )}>";

      $output .= '
      <div class="w-full">
        <div class="max-w-7xl mx-auto p-6">
          <h3 class="text-center text-2xl my-6">FAQs</h3>
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">';

            // Loop through the jobs and display them
            if ($faqs->have_posts()) {
                while ($faqs->have_posts()) {
                    $faqs->the_post();

                    $output .= '<a href="'. get_the_permalink() .'" class="group flex flex-col w-full p-4 border-8 border-solid border-slate-200 rounded-3xl shadow-toon hover:bg-slate-50">';

                    $output .= '<h4 class="text-md">' . get_the_title() . '</h4>';

                    $location_posts = get_field('job_location');
                    if ($location_posts):
                        $location_names = array();
                        foreach ($location_posts as $location_post):
                            $location_names[] = get_the_title($location_post);
                        endforeach;
                        $output .= '<h6 class="text-gray-400 text-sm uppercase">' . implode(', ', $location_names) . '</h6>';
                    endif;

                    $output .= '</a>';
                }
                wp_reset_postdata(); // Reset post data after the loop
            } else {
                $output .= '<p>No job listings available.</p>';
            }

      $output .= '
          </div>
      </div>';

      $output .= '</div>';

      // Output final element HTML
      echo $output;
  }

}