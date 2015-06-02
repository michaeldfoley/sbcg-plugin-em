<?php
 

add_filter('em_event_output_placeholder','_sbcg_em_login_placeholders',1,3);
function _sbcg_em_login_placeholders($replace, $EM_Event, $result){
	global $wp_query, $wp_rewrite;
	switch( $result ){
		case '#_LOGINLINK':
		  $replace = "<a href=\"". wp_login_url( get_permalink() ) . "\">" . __('Login') . "</a>";
			break;
		case '#_LOGINURL':
		  $replace = wp_login_url( get_permalink() );
			break;
	}
	return $replace;
}
?>