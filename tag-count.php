<?php
/*
 Plugin Name: Tag Count
 Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
 Description:  Endpoint para obtener todos los tags en el sitio
 Version:      1.0.0
 Author:       Holkan Luna
 Author URI:   https://cubeinthebox.com/
 License:      GPL2
 License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('rest_api_init', 'register_tag_count_endpoint');
function register_tag_count_endpoint(){
	  	register_rest_route(
	    	'tag_count/v2',  //namespace
	    	'/counter/',   //route
	    	array(
	     	'methods'=>'GET',
	     	'callback'=>'tag_count',
	    	)
		);
}


function tag_count(){
 	$posttags = get_tags(array('hide_empty'=>false));
 	if($posttags){
 		$tag_arr = array();
 		foreach ($posttags as $tag) {
 			array_push($tag_arr, $tag);
 		}
 		return $tag_arr;
 	}
 	return null;
 }