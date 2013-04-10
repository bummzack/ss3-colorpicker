<?php
/**
 * Color field
 */
class ColorField extends TextField {
	
	public function __construct($name, $title = null, $value = '', $form = null){
		parent::__construct($name, $title, $value, 7, $form);
	}
	
	public function Field($properties = array()){
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::css(COLORPICKER_DIR . '/thirdparty/jquery.minicolors.css');
		Requirements::javascript(COLORPICKER_DIR . '/thirdparty/jquery.minicolors.js');
		Requirements::javascript(COLORPICKER_DIR . '/javascript/colorpickerField.js');
		return parent::Field($properties);
	}
	
	public function Type(){
		return 'colorfield';
	}
}