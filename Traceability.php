<?php
	require_once('pages/api.php');
	
	class TraceabilityPlugin extends MantisPlugin {
		 /**
		 * Register plugin
		 *
		 * @return void
		 * @author rcasteran
		 */
		public function register() {
			$this->name        = lang_get( 'plugin_traceability_title' );
			$this->description = lang_get( 'plugin_traceability_description' );
			$this->page        = 'config';
		
			$this->version  = '3.0.2';
			$this->requires = array(
				'MantisCore' => '2.1.0'
				);
		
			$this->author  = 'STRUCT-IT';
			$this->contact = 'contact@struct-it.fr';
			$this->url     = 'http://www.struct-it.fr';
		
			log_traceability_event('Registration successfull');
		} /* End of register() */

		 /**
		 * Execute plugin schema at installation
		 *
		 * @return array
		 * @author rcasteran
		 */
		public function schema() {
			log_traceability_event('Schema execution successfull');
			return array();
		} /* End of schema() */

		/**
		 * Configure plugin at installation
		 *
		 * @return array
		 * @author rcasteran
		 */
		public function config() {
			log_traceability_event('Configuration successfull');
			
			return array(
				'req_issue_status_threshold'	=> PLUGIN_TRACEABILITY_ISSUE_STATUS_THRSHD_DEFAULT,
				'test_issue_status_threshold'	=> PLUGIN_TRACEABILITY_ISSUE_STATUS_THRSHD_DEFAULT,
				'req_id_var_idx' 				=> PLUGIN_TRACEABILITY_VAR_IDX_NONE,
				'test_id_var_idx' 				=> PLUGIN_TRACEABILITY_VAR_IDX_NONE,
				'id_delimiter'					=> PLUGIN_TRACEABILITY_ID_DELIMITER_DEFAULT,
				'manage_threshold' 				=> ADMINISTRATOR
				);
		} /* End of config() */

		/**
		 * Register plugin event hook
		 *
		 * @return array
		 * @author rcasteran
		 */
		public function hooks() {
			log_traceability_event('Event hooks configuration successfull');
			
			return array(
				'EVENT_MENU_MAIN' => 'menu_main_callback',
			);
		} /* End of hooks() */

		/**
		 * EVENT_MENU_MAIN callback
		 *
		 * @return string
		 * @author rcasteran
		 */
		public function menu_main_callback($p_event, $p_bug_id) {
			return  array(
						array(
							'title' => lang_get('plugin_traceability_menu'),
							'access_level' => VIEWER,
							'url' => plugin_page('main', false),
							'icon' => 'fa-link'
						)
					);
		} /* End of menu_main_callback() */
	}
?>
