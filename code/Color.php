<?php
/**
 * Color field-type
 * @author bummzack
 */
class Color extends Varchar
{
	/**
	 * Helper function to convert RGB to HSV
	 * @param int $R red channel, 0-255
	 * @param int $G green channel, 0-255
	 * @param int $B blue channel, 0-255
	 * @return array containing 3 values, H,S,V 0-1
	 */
	public static function RGB_TO_HSV ($R, $G, $B)  // RGB Values:Number 0-255
	{
	   $HSV = array();
	
	   $var_R = ($R / 255);
	   $var_G = ($G / 255);
	   $var_B = ($B / 255);
	
	   $var_Min = min($var_R, $var_G, $var_B);
	   $var_Max = max($var_R, $var_G, $var_B);
	   $del_Max = $var_Max - $var_Min;
	
	   $V = $var_Max;
	
	   if ($del_Max == 0)
	   {
	      $H = 0;
	      $S = 0;
	   }
	   else
	   {
	      $S = $del_Max / $var_Max;
	
	      $del_R = ((($var_Max - $var_R) / 6) + ($del_Max / 2)) / $del_Max;
	      $del_G = ((($var_Max - $var_G) / 6) + ($del_Max / 2)) / $del_Max;
	      $del_B = ((($var_Max - $var_B) / 6) + ($del_Max / 2)) / $del_Max;
	
	      if      ($var_R == $var_Max) $H = $del_B - $del_G;
	      else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
	      else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;
	
	      if ($H<0) $H++;
	      if ($H>1) $H--;
	   }
	
	   $HSV[] = $H;
	   $HSV[] = $S;
	   $HSV[] = $V;
	
	   return $HSV;
	}
	
	/**
	 * Convert a hex string to separate R,G,B values
	 * @param string $hex
	 * @return array containing 3 integers (0-255) R,G,B
	 */
	public static function HEX_TO_RGB($hex){
		$RGB = array();
		
		$color = intval(ltrim($hex, '#'), 16);
		$r = ($color >> 16) & 0xff;
		$g = ($color >> 8) & 0xff;
		$b = $color & 0xff;
		
		$RGB[] = $r;
		$RGB[] = $g;
		$RGB[] = $b;
		
		return $RGB;
	}
	
	/**
	 * Convert R,G,B to hex
	 * @param int $R
	 * @param int $G
	 * @param int $B
	 * @return string
	 */
	public static function RGB_TO_HEX($R, $G, $B){
		return dechex($R) . dechex($G) . dechex($B);
	}
	
	public function __construct($name = null, $options = array()) {
		parent::__construct($name, 7, $options);
	}
	
	public function scaffoldFormField($title = null, $params = null) {
		$field = new ColorField($this->name, $title);
		return $field;
	}
	
	
}