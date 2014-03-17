<?php

/**
 * Class TIVWP_DM_Notices
 * @package TIVWP_DM
 * @author  tivnet
 */
class TIVWP_DM_Notices {

	const WITH_TRIGGER_ERROR    = true;
	const WITHOUT_TRIGGER_ERROR = false;

	/**
	 * @var array $_notices Collect here all notices we need to display
	 */
	private static $_notices = array();

	/**
	 * Add new notice
	 * @param string $notice           Message to display
	 * @param bool   $do_trigger_error [false] If true, issue trigger_error()
	 */
	public static function add( $notice, $do_trigger_error = self::WITHOUT_TRIGGER_ERROR ) {

		/**
		 * Add new notice to the stack
		 */
		self::$_notices[] = $notice;

		/**
		 * If that was the first notice, and we are in the admin area,
		 * then hook our display() function to the admin_notices action
		 */
		if ( sizeof( self::$_notices ) === 1 and is_admin() ) {
			add_action( 'admin_notices', array(
				'TIVWP_DM_Notices',
				'display'
			) );
		}

		/**
		 * ... and trigger regular error immediately, whether we are in admin area or not, if requested
		 */
		if ( $do_trigger_error === self::WITH_TRIGGER_ERROR ) {
			trigger_error( $notice );
		}
	}


	/**
	 * Display all collected notices in admin area
	 * @wp-hook admin_notices
	 */
	public static function display() {

		echo '<div class="error">';
		echo '<p>TIVWP_DM:</p>';
		foreach ( self::$_notices as $notice ) {
			echo '<p>' . esc_html( $notice ) . '</p>';
		}
		echo '</div>';

	}

} //class

# --- EOF
