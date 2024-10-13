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
        'post_type' => 'faq',
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
      $output = "<section {$this->render_attributes( '_root' )}>";

      $output .= '
      <div class="mx-auto max-w-7xl px-6 py-10">
          <h2 class="my-12 text-3xl lg:text-5xl font-bold tracking-tight text-gray-900">Frequently Asked Questions</h2>
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">';

            // Loop through the questions and display them
            if ($faqs->have_posts()) {
                while ($faqs->have_posts()) {
                    $faqs->the_post();

                    $output .= '<div x-data="{ isExpanded: false }" class="w-full divide-y divide-slate-300 overflow-hidden rounded-xl">';

                    $output .= '
                    <button id="controlsAccordionItemOne" type="button" class="flex w-full items-center justify-between gap-2 p-4 rounded-xl bg-white border border-solid border-gray-200 focus-visible:outline-0 text-left underline-offset-2 hover:text-black focus-visible:text-gray-900 focus-visible:underline focus-visible:outline-none" aria-controls="accordionItemOne" @click="isExpanded = ! isExpanded" :aria-expanded="isExpanded ? \'true\' : \'false\'">
                        <h4 class="text-lg font-medium">'.get_the_title().'</h4>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" :class="isExpanded  ?  \'rotate-180\'  :  \'\'">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div x-cloak x-show="isExpanded" id="accordionItemOne" role="region" aria-labelledby="controlsAccordionItemOne" x-collapse>
                        <div class="p-4 text-sm sm:text-base text-pretty">'.get_the_content().'</div>
                    </div>';

                    $output .= '</div>';
                }
                wp_reset_postdata(); // Reset post data after the loop
            } else {
                $output .= '<p>No questions available.</p>';
            }

      $output .= '
          </div>
      </div>';

      $output .= '</section>';

      // Output final element HTML
      echo $output;
  }

}