<?php
	define('PLUGIN_LOGIN_HISTORY_FILE', 'plugins/traceability/log/log_traceability');
	define('PLUGIN_LOGIN_HISTORY_ENTRY_MAX', 5000);
	
	define('PLUGIN_TRACEABILITY_ID_DELIMITER_DEFAULT', ';');
	define('PLUGIN_TRACEABILITY_VAR_IDX_NONE', '-1');
	define('PLUGIN_TRACEABILITY_VAR_STATUS_DEFAULT', 'Not found');
	define('PLUGIN_TRACEABILITY_ISSUE_STATUS_THRSHD_DEFAULT', 'Not found');
	
	if(!function_exists('log_traceability_event')) {
		/**
		 * Log event
		 *
		 * @param string $p_event specifies the event to be logged
		 * @return void
		 * @author rcasteran
		 */
		function log_traceability_event( $p_event = '') {
			$t_fileData = file(PLUGIN_LOGIN_HISTORY_FILE);

			array_unshift($t_fileData, time().';'.$p_event.';'.PHP_EOL);
  			if (count($t_fileData) > PLUGIN_LOGIN_HISTORY_ENTRY_MAX) {
    			$t_fileData = array_slice($t_fileData, 0, PLUGIN_LOGIN_HISTORY_ENTRY_MAX);
			}/* Else do nothing */
			
			file_put_contents(PLUGIN_LOGIN_HISTORY_FILE, $t_fileData, LOCK_EX);
		}
	}
	
	if(!function_exists('print_traceability_menu'))	{	
		/**
		 * Print the menu
		 *
		 * @param string $p_page specifies the current page name so its link can be disabled
		 * @return void
		 * @author rcasteran
		 */
		function print_traceability_menu( $p_page = '', $p_project_id, $p_version_id, $p_handler_id ) {
			$t_main_page = 'main.php';
			$t_req_page = 'requirement.php';
			$t_test_page = 'test.php';
		
			switch( $p_page ) {
				case $t_main_page:
					$t_main_page = '';
					$t_req_page = plugin_page($t_req_page, false);
					$t_test_page = plugin_page($t_test_page, false);

					if($p_handler_id != -1) {
						$t_req_page = $t_req_page."&handler_id=".$p_handler_id;					
						$t_test_page = $t_test_page."&handler_id=".$p_handler_id;					
					}else if($p_version_id != -1) {
						$t_req_page = $t_req_page."&version_id=".$p_version_id;					
						$t_test_page = $t_test_page."&version_id=".$p_version_id;					
					}else if($p_project_id != -1) {
						$t_req_page = $t_req_page."&project_id=".$p_project_id;
						$t_test_page = $t_test_page."&project_id=".$p_project_id;
					} 
					/* Else do nothing */				
					break;
				case $t_req_page:
					$t_main_page = plugin_page($t_main_page, false);
					$t_req_page = '';
					$t_test_page = plugin_page($t_test_page, false);
					
					if($p_handler_id != -1) {
						$t_test_page = $t_test_page."&handler_id=".$p_handler_id;					
					}else if($p_version_id != -1) {
						$t_test_page = $t_test_page."&version_id=".$p_version_id;					
					}else if($p_project_id != -1) {
						$t_test_page = $t_test_page."&project_id=".$p_project_id;
					}
					/* Else do nothing */				
					break;
				case $t_test_page:
					$t_main_page = plugin_page($t_main_page, false);
					$t_req_page = plugin_page($t_req_page, false);
					$t_test_page = '';

					if($p_handler_id != -1) {
						$t_req_page = $t_req_page."&handler_id=".$p_handler_id;					
					}else if($p_version_id != -1) {
						$t_req_page = $t_req_page."&version_id=".$p_version_id;					
					}else if($p_project_id != -1) {
						$t_req_page = $t_req_page."&project_id=".$p_project_id;
					} 
					/* Else do nothing */				
					break;
				default:
					$t_main_page = plugin_page($t_main_page, false);
					$t_req_page = plugin_page($t_req_page, false);
					$t_test_page = plugin_page($t_test_page, false);
					break;
			}
		
			echo '<div align="center"><p>';
			print_bracket_link($t_main_page, lang_get('plugin_traceability_menu_main') );
			print_bracket_link($t_req_page, lang_get('plugin_traceability_menu_req') );
			print_bracket_link($t_test_page, lang_get('plugin_traceability_menu_test') );
			echo '</p></div>';
		} /* End of print_traceability_menu() */
	}
	/* Else do nothing */

	if(!function_exists('get_custom_fied_ids'))	{			
	 	/**
		 * Get the custom field ids of a specified type (if any)
		 *
		 * @param array of custom field type
		 * @return array of custom field ids
		 * @author rcasteran
		 */
		function get_custom_fied_ids($p_types) {
			$t_custom_field_table = db_get_table( 'mantis_custom_field_table' );
			$query = "SELECT *
					  FROM $t_custom_field_table
					  ORDER BY name ASC";
			$result = db_query_bound( $query );
			$t_row_count = db_num_rows( $result );
			$t_ids = array();
	
			for( $i = 0;$i < $t_row_count;$i++ ) {
				$row = db_fetch_array( $result );
				foreach($p_types as $t_type) {
					if($row['type'] == $t_type) {
						array_push( $t_ids, $row['id'] );
					}
					/* Else do nothing */
				}
			}
	
			return $t_ids;
		} /* End of get_custom_fied_ids() */
	}
	/* Else do nothing */
?>
