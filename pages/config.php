<?php
	require_once('api.php');

	auth_reauthenticate();
	access_ensure_global_level( plugin_config_get( 'manage_threshold' ) );
	
	html_page_top( lang_get( 'plugin_traceability_config' ) );
	
	print_manage_menu();
	
	echo '<br />';
	echo '<div class="form-container">';
	echo '<form action="'.plugin_page( 'config_edit' ).'" method="post">';
	# Start security field
	echo form_security_field( 'plugin_traceability_config_edit' );
	echo '<table>';
	echo '<tr><td class="form-title" colspan="2">'.lang_get('plugin_traceability_title').': '.lang_get('plugin_traceability_config').'</td></tr>';

	echo '<tr>';
	echo '<td colspan="2">'.lang_get( 'plugin_traceability_config_ana' ).'</td>';
	echo '</tr>';	
	# req_issue_status_threshold config
	echo '<tr>';
	echo '<td class="category">'.lang_get( 'plugin_traceability_req_issue_status_threshold' ).'</td>';
	echo '<td><select name="req_issue_status_threshold">';
	echo print_enum_string_option_list( 'status', plugin_config_get('req_issue_status_threshold'));
	echo '</select></td>';
	echo '</tr>';
	# test_issue_status_threshold config
	echo '<tr>';
	echo '<td class="category">'.lang_get( 'plugin_traceability_test_issue_status_threshold' ).'</td>';
	echo '<td><select name="test_issue_status_threshold">';
	echo print_enum_string_option_list( 'status', plugin_config_get('test_issue_status_threshold'));
	echo '</select></td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td colspan="2">'.lang_get( 'plugin_traceability_config_req' ).'</td>';
	echo '</tr>';	
	# req_id_var_idx config
	echo '<tr>';
	echo '<td class="category">'.lang_get( 'plugin_traceability_req_id_var' ).'</td>';
	$t_types = array(CUSTOM_FIELD_TYPE_STRING);
	$t_numeric_custom_fields = get_custom_fied_ids($t_types);
	if(count($t_numeric_custom_fields) > 0) {	
		echo '<td><select name="req_id_var_idx">';	
		foreach( $t_numeric_custom_fields as $t_field_id )
		{
			$t_desc = custom_field_get_definition( $t_field_id );
			echo '<option value="'.$t_field_id.'"';
			check_selected( strval(plugin_config_get('req_id_var_idx')), strval($t_field_id) ); 
			echo '>'.string_display($t_desc['name']).'</option>';
		}		
		echo '</select></td>';
	}
	else {
		echo '<td>',lang_get('plugin_traceability_custom_field_found_none'),'</td>';
	}
	echo '</tr>';

	echo '<tr>';
	echo '<td colspan="2">'.lang_get( 'plugin_traceability_config_test' ).'</td>';
	echo '</tr>';	
	# test_id_var_idx config
	echo '<tr>';
	echo '<td class="category">'.lang_get( 'plugin_traceability_test_id_var' ).'</td>';
	if(count($t_numeric_custom_fields) > 0) {	
		echo '<td><select name="test_id_var_idx">';	
		foreach( $t_numeric_custom_fields as $t_field_id )
		{
			$t_desc = custom_field_get_definition( $t_field_id );
			echo '<option value="'.$t_field_id.'"';
			check_selected( strval(plugin_config_get('test_id_var_idx')), strval($t_field_id) ); 
			echo '>'.string_display($t_desc['name']).'</option>';
		}		
		echo '</select></td>';
	}
	else {
		echo '<td>',lang_get('plugin_traceability_custom_field_found_none'),'</td>';
	}
	echo '</tr>';

	echo '<tr>';
	echo '<td colspan="2">'.lang_get( 'plugin_traceability_config_other' ).'</td>';
	echo '</tr>';	
	# id_delimiter config
	echo '<tr>';
	echo '<td class="category">'.lang_get( 'plugin_traceability_id_delimiter' ).'</td>';
	echo '<td><input type="text" name="id_delimiter" value="'.plugin_config_get( 'id_delimiter' ).'"/>';
	echo '</td>';
	echo '</tr>';
	# manage_threshold config
	echo '<tr>';
	echo '<td class="category">'.lang_get( 'plugin_traceability_management_threshold' ).'</td>';
	echo '<td><select name="manage_threshold">';
	echo print_enum_string_option_list( 'access_levels', plugin_config_get('manage_threshold'));
	echo '</select></td>';
	echo '</tr>';
	# submit button
	echo '<tr>';
	echo '<td class="center" colspan="2"><input type="submit" value="'.lang_get('change_configuration').'"/></td>';
	echo '</tr>';	
	echo '</table>';
	echo '</form>';
	echo '</div>';
	
	html_page_bottom();
?>