<?php
 

add_filter('em_event_output_placeholder','_sbcg_em_time_placeholders',1,3);
function _sbcg_em_time_placeholders($replace, $EM_Event, $result){
	global $wp_query, $wp_rewrite;
	switch( $result ){
		case '#_EVENTTIMESSHORT':
			//get format of time to show
			if( !$EM_Event->event_all_day ){
				$time_format = ( get_option('dbem_time_format') ) ? get_option('dbem_time_format'):get_option('time_format');
				
				// Remove :00 from start time
				$time_format_start = ( date_i18n( 'i', $EM_Event->start ) === '00' ) ? str_replace(':i', '', $time_format) : $time_format;
				
				// Remove :00 from end time
				$time_format_end = ( date_i18n( 'i', $EM_Event->end ) === '00' ) ? str_replace(':i', '', $time_format) : $time_format;
				
				// Remove am/pm from start time if same as end time
				$time_format_start = ( date_i18n( 'a', $EM_Event->start ) === date_i18n( 'a', $EM_Event->end ) ) ? preg_replace('/\s?a/i', '', $time_format_start) : $time_format_start;
				
				if($EM_Event->event_start_time != $EM_Event->event_end_time ){
					$replace = date_i18n($time_format_start, $EM_Event->start). get_option('dbem_times_separator') . date_i18n($time_format_end, $EM_Event->end);
				}else{
					$replace = date_i18n($time_format_start, $EM_Event->start);
				}
			}else{
				$replace = get_option('dbem_event_all_day_message');
			}
			break;
	}
	return $replace;
}
?>