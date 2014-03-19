<?php
/**
 * Examples of settings and filters. Use in your theme or plugin.
 * @package TIVWP_DM
 * @author  tivnet
 */

/**
 * Do not run or include this file.
 */
true && exit;

/**
 * These are the examples of wp-config settings for plugins auto-(de)activation
 */
define( 'TIVWP_DM_AUTO', 'activate' );
//define( 'TIVWP_DM_AUTO', 'deactivate' );

/**
 * Network Activation is disabled by default.
 * To enable, place this line to the wp-config.php file:
 */
define( 'TIVWP_DM_NETWORK_ACTIVATION_ALLOWED', true );

/**
 * Example of modifying TIVWP_DM development plugins list
 * Place this in your theme or plugin
 * @param array $plugins
 * @return array
 */
function filter_tivwp_dm_plugin_list( $plugins ) {
	$plugins[] = array(
		'name'     => 'Theme Check',
		'slug'     => 'theme-check',
		'required' => false,
	);
	$plugins[] = array(
		'name'     => 'Debug Bar Actions and Filters Addon',
		'slug'     => 'debug-bar-actions-and-filters-addon',
		'required' => false,
	);
	$plugins[] = array(
		'name'     => 'WP Page Load Stats',
		'slug'     => 'wp-page-load-stats',
		'required' => false,
	);
	$plugins[] = array(
		'name'     => 'Developer monitor by VentureGeeks',
		'slug'     => 'developer-monitor',
		'required' => false,
	);

	return $plugins;
}

add_filter( 'tivwp_dm_plugin_list', 'filter_tivwp_dm_plugin_list' );

# --- EOF