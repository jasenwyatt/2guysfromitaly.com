<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Element_Custom_Ordering_Display extends \Bricks\Element {
  /** 
   * How to create custom elements in Bricks
   * 
   * https://academy.bricksbuilder.io/article/create-your-own-elements
   */
  public $category     = 'custom';
  public $name         = 'ordering-display';
  public $icon         = 'fa-solid fa-border-top-left'; // FontAwesome 5 icon in builder (https://fontawesome.com/icons)
  public $css_selector = '.custom-ordering-display-wrapper'; // Default CSS selector for all controls with 'css' properties
  // public $scripts      = []; // Enqueue registered scripts by their handle

  public function get_label() {
    return esc_html__( 'Ordering Display', 'bricks' );
  }

  public function set_control_groups() {}

  public function set_controls() {}

  /** 
   * Render element HTML on frontend
   * 
   * If no 'render_builder' function is defined then this code is used to render element HTML in builder, too.
   */
    public function render() {

      if(get_field('online_ordering', 'option') == 1) :
        $buttonDisplay = '
          <a href="'.get_field('online_ordering_link', 'option').'" class="btn btn--green py-3">
            Order Online
          </a>';
      else :
        $buttonDisplay = '
          <a disabled class="btn py-3 bg-gray-300 cursor-not-allowed opacity-50">
            Order Online
          </a>';
      endif;

      /**
       * '_root' attribute contains element ID, classes, etc. 
       * 
       * @since 1.4
       */
      $output = "<section {$this->render_attributes( '_root' )}>";

      $output .= $buttonDisplay;

      $output .= '</section>';

      // Output final element HTML
      echo $output;
  }

}