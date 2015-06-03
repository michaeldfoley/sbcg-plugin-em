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

add_action('em_event_output_condition', '_sbcg_em_has_bookings_not_logged_in_condition', 1, 4);
function _sbcg_em_has_bookings_not_logged_in_condition($replacement, $condition, $match, $EM_Event){
	if( is_object($EM_Event) && $condition === 'has_bookings_not_logged_in' ){
  	if ( !is_user_logged_in() && $EM_Event->event_rsvp && get_option('dbem_rsvp_enabled') ) {
  		$replacement = preg_replace("/\{\/?$condition\}/", '', $match);
  	}else{
  		$replacement = '';
  	}
	}
	if( is_object($EM_Event) && $condition === 'fully_booked_not_logged_in' ){
  	if ( !is_user_logged_in() && $EM_Event->event_rsvp && $EM_Event->get_bookings()->get_available_spaces() <= 0 ) {
  		$replacement = preg_replace("/\{\/?$condition\}/", '', $match);
  	}else{
  		$replacement = '';
  	}
	}
	if( is_object($EM_Event) && $condition === 'has_spaces_not_logged_in' ){
  	if ( !is_user_logged_in() && $EM_Event->event_rsvp && $EM_Event->get_bookings()->get_available_spaces() > 0 ) {
  		$replacement = preg_replace("/\{\/?$condition\}/", '', $match);
  	}else{
  		$replacement = '';
  	}
	}
	return $replacement;
}
?>