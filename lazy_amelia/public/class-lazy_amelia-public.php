<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/piclaunch
 * @since      1.0.0
 *
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Lazy_amelia
 * @subpackage Lazy_amelia/public
 * @author     Piclaunch <piclaunch@gmail.com>
 */
class Lazy_amelia_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->lazy_amelia_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lazy_amelia-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lazy_amelia-public.js', array( 'jquery' ), $this->version, false );

	}

	# Piclaunch COde Start	
/*
	avoid a name collision, make sure this function is not
	already defined */

function lazy_amelia_loadjs($content){

// NEW ST

$_lazy_open = $this->lazy_amelia_options['_lazy_open'];
$_lazy_debug =  $this->lazy_amelia_options['_lazy_debug']; 
$_lazy_RemoveColon = $this->lazy_amelia_options['_lazy_RemoveColon']  ; 
$precontent = "";
$postcontent = "";
$code_REMOVE_COLON = "";
$code_BeforeConfirmBookingLoaded = "";
$code_BeforeBookingLoaded = "";

# check if Colon needs to be removed 
if($_lazy_RemoveColon == 1) {
	if($_lazy_debug == 1){
		$code_REMOVE_COLON  = "
		var x = document.querySelector('#am-confirm-booking > div:nth-child(1) > form');
		var xl = x.getElementsByTagName('label');
		for (i =0; i< xl.length;i++){
		if( xl[i].className == 'el-form-item__label'){
		console.log(xl[i].innerText);
		var temp= xl[i].innerText;
		xl[i].innerText = temp.slice(0, -1)}";

	} else{
		$code_REMOVE_COLON  = "
		var x = document.querySelector('#am-confirm-booking > div:nth-child(1) > form');
		var xl = x.getElementsByTagName('label');
		for (i =0; i< xl.length;i++){
		if( xl[i].className == 'el-form-item__label'){		
		var temp= xl[i].innerText;
		xl[i].innerText = temp.slice(0, -1)}";

	}
	$code_BeforeConfirmBookingLoaded = $code_BeforeConfirmBookingLoaded. $code_REMOVE_COLON;
}
//Content Always gets executed 
if( !empty($_lazy_open) ){
	$postcontent = $_lazy_open;
}

// _lazy_BeforeBookingLoaded
if( !empty($_lazy_BeforeBookingLoaded) ){
	$code_BeforeBookingLoaded = $code_BeforeBookingLoaded.$_lazy_BeforeBookingLoaded;
}

//_lazy_BeforeConfirmBookingLoaded
if( !empty($_lazy_BeforeConfirmBookingLoaded) ){
	$code_BeforeConfirmBookingLoaded = $code_BeforeConfirmBookingLoaded.$_lazy_BeforeConfirmBookingLoaded;
}



$precontent = "<script type=\"text/javascript\">function beforeBookingLoaded(){"
. $code_BeforeBookingLoaded 
. " } function  beforeConfirmBookingLoaded() {"
. $code_BeforeConfirmBookingLoaded 
."}</script>";

# Final content 
$newcontent =$precontent.$postcontent;
/*	append the text file contents to the end of `the_content` */
return $content . $newcontent;
}
# Piclaunch Code End

}
