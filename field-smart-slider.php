<?php
/**
 *
 * Royal Touch Slider Field
 *
 * 
 */
if ( !defined( 'ABSPATH' )) die(-1); 

class WPPress_SmartSlider_ACF_Field extends WPPress_ACF_Field
{
	
	function __construct() {
		$this->label = 'Smart Slider';
		parent::__construct();
	}
	function slider_output($data = NULL) {
		$output="<div class='SmartSlider' id='Smart{$data}'>";
		$output.=do_shortcode('[smartslider3 slider='.$data.']');
		$output.="</div>";
		return $output;
	}
	
	/**
	 * Will return all the Gallery Slider in array in format(id=>name)
	 * @method sliders_data
	 * @author Sovit Tamrakar
	 * @return array id=>label
	 */
	function slider_data() {
		global $wpdb;
        $sliders = $wpdb->get_results('SELECT id, title FROM ' . $wpdb->prefix . 'nextend2_smartslider3_sliders');
		$data = array();
		if (!empty($sliders)) {
			foreach ($sliders as $slider) {
				$data[$slider->id] = $slider->title;
			}
		}
		return $data;
	}
}

new WPPress_SmartSlider_ACF_Field();
