<?php

echo "TIVWP-DM Test Suite" . PHP_EOL;

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = realpath( dirname( __FILE__ ) . '/../tmp-wp-dev/wordpress-tests' ) . '/';
}

echo 'Tests folder: ' . $_tests_dir . PHP_EOL . PHP_EOL;

// load some helpful functions
require_once $_tests_dir . 'functions.php';

/**
 * Activate this plugin in WordPress so it can be tested.
 */
function _test_bootstrap_manually_load_plugin() {
	require dirname( __FILE__ ) . '/../tivwp-dm.php';
}

tests_add_filter( 'muplugins_loaded', '_test_bootstrap_manually_load_plugin' );

$GLOBALS['wp_tests_options'] = array(
	'active_plugins' => array( 'tivwp-dm/tivwp-dm.php' ),
);

/**
 * To test
 * @wp_hook tivwp_dm_plugin_list
 * @see     TIVWP_DM::load_plugin_list()
 * @param array $plugins
 * @return array
 */
function _test_bootstrap_filter_tivwp_dm_plugin_list( $plugins = array() ) {
	$plugins[] = array(
		'name'     => 'Theme Check',
		'slug'     => 'theme-check',
		'required' => false,
	);
	return $plugins;
}

tests_add_filter( 'tivwp_dm_plugin_list', '_test_bootstrap_filter_tivwp_dm_plugin_list' );


// fire up test suite
require_once $_tests_dir . 'bootstrap.php';

# --- EOF