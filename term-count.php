<?php
/*
 Plugin Name: Term Taxonomy Count
 Plugin URI:   git@github.com:HelaGone/Tag-count-plugin.git
 Description:  Endpoint para obtener todos los términos de una taxonomía en el sitio
 Version:      1.0.0
 Author:       Holkan Luna
 Author URI:   https://cubeinthebox.com/
 License:      GPL2
 License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('rest_api_init', 'register_tag_count_endpoint');
function register_tag_count_endpoint(){
		register_rest_route(
			'counter/v2',
			'/tax/(?P<tax>\w+)',
			array(
				'methods'=>'GET',
				'callback'=>'taxonomy_term_count'
			)
		);
}

function taxonomy_term_count(WP_REST_Request $request){
 	$terms = get_terms(array('taxonomy'=>$request['tax'],'hide_empty'=>false));
 	if($terms){
 		$tema_arr = array();
 		foreach ($terms as $key => $tema) {
 			array_push($tema_arr, $tema);
 		}
 		return $tema_arr;
 	}
 	return null;
}