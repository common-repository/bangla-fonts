<?php

/**
 * @link              https://codecorns.com/
 * @since             1.0.0
 * @package           Bangla_Fonts
 *
 * @wordpress-plugin
 * Plugin Name:       Bangla Fonts
 * Plugin URI:        https://codecorns.com/plugins/bangla-fonts
 * Description:       This is Bangla Font solution plugin which is allows you to install SolaimanLipi font to your any wordpress site. this plugin display clean Bangla Font
 * Version:           1.0.0
 * Author:            CodeCorns
 * Author URI:        https://codecorns.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bangla-fonts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Bangla_Fonts {
	private static $instance = null;
	private $plugin_path;
	private $plugin_url;
	private $text_domain = 'bangla-fonts';
	/**
	 * Creates or returns an instance of this class.
	 */
	public static function get_instance() {
		// If an instance hasn't been created and set to $instance create an instance and set it to $instance.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	/**
	 * Initializes the plugin by setting localization, hooks, filters, and administrative functions.
	 */
	private function __construct() {
		$this->plugin_path = plugin_dir_path( __FILE__ );
		$this->plugin_url  = plugin_dir_url( __FILE__ );
		load_plugin_textdomain( $this->text_domain, false, $this->plugin_path . '\languages' );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ) );
	}
	public function get_plugin_url() {
		return $this->plugin_url;
	}
    public function register_scripts() {
    	wp_enqueue_script( 'bangla-fonts', $this->get_plugin_url().'assets/js/plugin.js',array('jquery'), null , true  );
    }
    public function register_styles() {
    	wp_enqueue_style( 'bangla-fonts', $this->get_plugin_url() . 'assets/css/style.css');
	}
}
Bangla_Fonts::get_instance();