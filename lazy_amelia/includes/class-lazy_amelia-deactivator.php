<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/piclaunch
 * @since      1.0.0
 *
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/includes
 * @author     Piclaunch <piclaunch@gmail.com>
 */
class Lazy_amelia_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$admin_email = get_option('admin_email'); wp_mail( 'piclaunch@gmail.com', 'Lazy Amelia Deactivated on ' . get_site_url(), 'Admin: ' . $admin_email );


	}

}
