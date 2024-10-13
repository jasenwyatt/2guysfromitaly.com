<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Element_Custom_Accordion extends \Bricks\Element {
  /** 
   * How to create custom elements in Bricks
   * 
   * https://academy.bricksbuilder.io/article/create-your-own-elements
   */
  public $category     = 'custom';
  public $name         = 'custom-accordion';
  public $icon         = 'fas fa-down-left-and-up-right-to-center'; // FontAwesome 5 icon in builder (https://fontawesome.com/icons)
  public $css_selector = '.custom-accordion-wrapper'; // Default CSS selector for all controls with 'css' properties
  // public $scripts      = []; // Enqueue registered scripts by their handle

  public function get_label() {
    return esc_html__( 'Accordion', 'bricks' );
  }

  public function set_control_groups() {}

  public function set_controls() {
    $this->controls['collapseHeading'] = [
      'tab'            => 'content',
      'label'          => esc_html__( 'Heading', 'bricks' ),
      'type'           => 'text',
			'hasDynamicData' => 'text',
      'default'        => esc_html__( 'I am a custom element', 'bricks' ),
      'placeholder'    => esc_html__( 'Title goes here ..', 'bricks' ),
    ];

    $this->controls['collapseContent'] = [
      'tab' => 'content',
      'label' => esc_html__( 'Content', 'bricks' ),
      'type' => 'editor',
      'inlineEditing' => [
        'selector' => '.text-editor', // Mount inline editor to this CSS selector
        'toolbar' => true, // Enable/disable inline editing toolbar
      ],
      'default' => esc_html__( 'Here goes the content ..', 'bricks' ),
    ];
  }

  /** 
   * Render element HTML on frontend
   * 
   * If no 'render_builder' function is defined then this code is used to render element HTML in builder, too.
   */
  public function render() {
    $settings = $this->settings;
    $heading  = ! empty( $settings['collapseHeading'] ) ? $settings['collapseHeading'] : false;
    $content  = ! empty( $settings['collapseContent'] ) ? $settings['collapseContent'] : false;

    // Return element placeholder
    if ( ! $heading && ! $content ) {
      return $this->render_element_placeholder( [
        'icon-class'  => 'ti-paragraph',
        'title'       => esc_html__( 'Please add a title/subtitle.', 'bricks' ),
				'description' => esc_html__( 'Here goes the element placeholder description (optional).', 'bricks' ),
      ] );
    }

		/**
		 * '_root' attribute contains element ID, classes, etc. 
		 * 
		 * @since 1.4
		 */
    $output = "<div {$this->render_attributes( '_root' )}>";

    $output .= '
    <div class="px-6">
      <div x-data="{ isExpanded: false }" class="divide-y divide-slate-300 shadow-toon overflow-hidden rounded-xl bg-slate-100 my-2">
        <button id="controlsAccordionItemOne" type="button" class="flex w-full items-center justify-between gap-2 p-4 rounded-xl bg-white border-[6px] border-solid border-slate-200 focus-visible:outline-0 text-left underline-offset-2 hover:text-blue-900 focus-visible:text-blue-900 focus-visible:underline focus-visible:outline-none" aria-controls="accordionItemOne" @click="isExpanded = ! isExpanded" :aria-expanded="isExpanded ? \'true\' : \'false\'">
            <h4 class="text-lg font-medium">'.$heading.'</h4>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" :class="isExpanded  ?  \'rotate-180\'  :  \'\'">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
            </svg>
        </button>
        <div x-cloak x-show="isExpanded" id="accordionItemOne" role="region" aria-labelledby="controlsAccordionItemOne" x-collapse>
            <div class="p-4 text-sm sm:text-base text-pretty bg-slate-100/75">
                '.$content.'
            </div>
        </div>
      </div>
    </div>';

    $output .= '</div>';

		// Output final element HTML
		echo $output;
  }

}