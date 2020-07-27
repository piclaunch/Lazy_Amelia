<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/piclaunch
 * @since      1.0.0
 *
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/admin
 * @author     Piclaunch <piclaunch@gmail.com>
 */
class Lazy_amelia_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lazy_amelia_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lazy_amelia_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lazy_amelia-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lazy_amelia_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lazy_amelia_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lazy_amelia-admin.js', array( 'jquery' ), $this->version, false );

	}

// Piclaunch Code 


	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */

	public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	    add_options_page( 'Lazy Amelia Settings', 'Lazy Amelia', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	    );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	
//saving/update function for our options.
	/**
*
* Here we use the register_setting() function which is part of the WordPress API. We are passing it three arguments:
*
*Our option group: Here we will use our $plugin_name as it's unique and safe.
*Option name: You can register each option as a single, We will save all our options at once - so we will use the $plugin_name again.
*A callback function: This is used to sanitize our options with the validation function we just created.
*
**/

public function options_update() {
    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
 	}


	//validate and sanitize those options:

	public function validate($input) {
	    // All checkboxes inputs        
	    $valid = array();
	    $admin_email = get_option('admin_email');	    

	    //Cleanup
	    $valid['_lazy_debug'] = (isset($input['_lazy_debug']) && !empty($input['_lazy_debug'])) ? 1 : 0;
		$valid['_lazy_RemoveColon'] = (isset($input['_lazy_RemoveColon']) && !empty($input['_lazy_RemoveColon'])) ? 1 : 0;
	    $valid['_lazy_open'] = (isset($input['_lazy_open']) && !empty($input['_lazy_open'])) ? $input['_lazy_open']: 0;
		$valid['_lazy_BeforeBookingLoaded'] = (isset($input['_lazy_BeforeBookingLoaded']) && !empty($input['_lazy_BeforeBookingLoaded'])) ? $input['_lazy_BeforeBookingLoaded']: 0;
	    $valid['_lazy_BeforeConfirmBookingLoaded'] = (isset($input['_lazy_BeforeConfirmBookingLoaded']) && !empty($input['_lazy_BeforeConfirmBookingLoaded'])) ? $input['_lazy_BeforeConfirmBookingLoaded']: 0;	  

	    return $valid;
	 }



// Method for code to show pop out widget
	
	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_setup_page() {
	    include_once( 'partials/lazy_amelia-admin-display.php' );
	}





// Piclaunch Code END

}
