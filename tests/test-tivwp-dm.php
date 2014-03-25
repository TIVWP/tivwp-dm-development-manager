<?php

/**
 * Class TIVWP_DM_Test
 */
class TIVWP_DM_Test extends WP_UnitTestCase {

	function testDummy() {
		$this->assertTrue( true );
		$this->assertFalse( false );
	}

	/**
	 * To test if the plugin is loaded (classes exist)
	 */
	function testClassesExist() {

		foreach ( array(
					  'TIVWP_DM_Controller',
					  'TIVWP_DM',
				  ) as $class_name ) {

			$this->assertTrue( class_exists( $class_name ), 'Plugin not loaded: no class ' . $class_name );
		}
	}

	/**
	 * To test
	 * @wp_hook tivwp_dm_plugin_list
	 * @see     _test_bootstrap_filter_tivwp_dm_plugin_list()
	 * @covers  TIVWP_DM::load_plugin_list
	 */
	function test_filter_tivwp_dm_plugin_list() {

		// Without this, next line might cause a PHP Fatal Error
		if ( ! class_exists( 'TIVWP_DM' ) ) {
			$this->markTestSkipped( 'This test was skipped because the plugin was not loaded properly.' );
			return;
		}

		$development_plugins = TIVWP_DM::get_development_plugins();
		$added_plugin        = array_pop( $development_plugins );
		$this->assertEquals( $added_plugin, array(
			'name'     => 'Theme Check',
			'slug'     => 'theme-check',
			'required' => false,
		) );

	}
}

# --- EOF