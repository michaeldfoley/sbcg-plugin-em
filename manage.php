<?php
  
add_action('em_event_output_condition', '_sbcg_em_manage_condition', 1, 4);
function _sbcg_em_manage_condition($replacement, $condition, $match, $EM_Event){
	if( is_object($EM_Event) && $condition === 'is_manager' ){
  	if ( $EM_Event->can_manage('manage_bookings','manage_others_bookings') ) {
  		$replacement = preg_replace("/\{\/?$condition\}/", '', $match);
  	}else{
  		$replacement = '';
  	}
	}
	return $replacement;
}
?>