<?php
/**
 * Plugin Name: TIVWP-DM Development Manager
 * Plugin URI: https://github.com/TIVWP/tivwp-dm
 * Description: Install and manage development plugins
 * Text Domain: tivwp-dm
 * Domain Path: /languages/
 * Version: 14.03.17
 * Author: TIV.NET
 * Author URI: http://www.tiv.net
 * Network: false
 * License: GPL2
 */

/*  Copyright 2014 Gregory Karpinsky (email : gregory@tiv.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * There is nothing in this plugin for WP AJAX calls,
 * so we cut this off right away, even before loading our classes.
 */
if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
	return;
}

/**
 * Launch the Controller
 */
require_once 'includes/class-tivwp-dm-controller.php';
new TIVWP_DM_Controller();

# --- EOF