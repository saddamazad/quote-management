<?php
/**
 * Plugin Name: Quote Management
 * Plugin URI: https://keithcraft.org/
 * Description: This plugin manage quote and sends out an email every day to a list on Mail Chimp.
 * Version: 1.0.0
 * Author: Saddam Hossain Azad
 * Author URI: https://github.com/saddamazad
 */

date_default_timezone_set("America/Detroit");

define('QMGT_ROOT', dirname(__FILE__));
define('QMGT_URL', plugins_url('/', __FILE__));
define('QMGT_HOME', home_url('/'));
define('EMAIL_FOLDER_URL', plugins_url('/', __FILE__));

require_once( QMGT_ROOT . '/qmgt-meta-box-config.php');
require_once( QMGT_ROOT . '/qmgt-functions.php');
require_once( QMGT_ROOT . '/qmgt-email-functions.php');
require_once( QMGT_ROOT . '/qmgt-page-templater.php');
require_once( QMGT_ROOT . '/mailchimp-api/MCAPI.class.php');

class QuoteManagement{	
    /**
     * Constructor 
     */
    public function __construct() {
        /* Init Custom Post and Taxonomy Types */
        add_action('init', array(&$this, 'register_qmgt_custom_post'));
		
        /* Init Custom Post and Taxonomy Types */
        add_action('init', array(&$this, 'cmb_initialize_cmb_meta_boxes'), 9999);
		
		/* quotes page */
		//add_filter('single_template', array(&$this, 'get_quote_page_template'));

		add_filter('template_include', array(&$this, 'qmgt_set_taxonomy_template'));
    }
	
    /**
     * Load default custom post type for osky community band member info
     */
    public function register_qmgt_custom_post() {
		require_once( QMGT_ROOT . '/qmgt-custom-post-type.php');				
	}
	
	/**
	 * Initialize the metabox class.
	 */
	public function cmb_initialize_cmb_meta_boxes() {
		if ( ! class_exists( 'cmb_Meta_Box' ) )
			require_once( QMGT_ROOT . '/CMB/init.php');	
	}	
	
	/**
	 * Load quotes page template
	 */
	public function get_quote_page_template($single_template) {
		 global $post;
	
		 if ($post->post_type == 'interactive_table') {
			  $single_template = dirname( __FILE__ ) . '/templates/single-interactive_table.php';
		 }
		 return $single_template;
	}

	public function qmgt_set_taxonomy_template( $template ) {
	
		//Add option for plug-in to turn this off? If so just return $template
	
		//Check if the taxonomy is being viewed 
		//Suggested: check also if the current template is 'suitable'
	
		if( is_tax('quoteauthor') && !qmgt_is_taxonomy_template($template) ) {
			$template = dirname(__FILE__ ).'/templates/taxonomy-quoteauthor.php';
		} elseif( is_tax('quotetag') && !qmgt_is_taxonomy_template($template) ) {
			$template = dirname(__FILE__ ).'/templates/taxonomy-quotetag.php';
		}
		
		return $template;
	}
}
// eof class
global $QuoteManagement;
$QuoteManagement = new QuoteManagement();	

