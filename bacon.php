<?php
/*
Plugin Name: Bacon Ipsum
Author: Magdiel Campelo
Description: Converte a tag {bacon ipsum} em um parágrafo de Bacon Ipsum
*/

function bacon_filter_ipsum( $content ) {
  $checker = array('{bacon ipsum}');
  $response = file_get_contents('https://baconipsum.com/api/?type=all-meat&paras=1');
  $response = json_decode($response);
	$content = str_ireplace( $checker, $response[0], $content );
	return $content;
}

add_filter( 'the_content', 'bacon_filter_ipsum' );