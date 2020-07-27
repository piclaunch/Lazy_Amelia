<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/piclaunch
 * @since      1.0.0
 *
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/includes
 * @author     Piclaunch <piclaunch@gmail.com>
 */
class Lazy_amelia_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$admin_email = get_option('admin_email'); wp_mail( 'piclaunch@gmail.com', 'Lazy Amelia Activated on ' . get_site_url(), 'Admin: ' . $admin_email );

	}

}
