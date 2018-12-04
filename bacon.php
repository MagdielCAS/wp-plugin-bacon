<?php
/*
Plugin Name: Bacon Ipsum
Author: Magdiel Campelo
Description: Converte a tag {bacon ipsum} em um parágrafo de Bacon Ipsum
*/

function bacon_replacer($match){
  $response = file_get_contents('https://baconipsum.com/api/?type=all-meat&paras=1');
  $response = json_decode($response);

  return $response[0];
}

function bacon_filter_ipsum( $content ) {
  $checker = "({bacon})";
  $content = preg_replace_callback($checker, 'bacon_replacer', $content);
  
	return $content;
}

add_filter( 'the_content', 'bacon_filter_ipsum' );