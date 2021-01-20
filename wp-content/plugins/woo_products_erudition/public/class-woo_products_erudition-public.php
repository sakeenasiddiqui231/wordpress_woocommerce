<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://cedcoss.com/
 * @since      1.0.0
 *
 * @package    Woo_products_erudition
 * @subpackage Woo_products_erudition/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Woo_products_erudition
 * @subpackage Woo_products_erudition/public
 * @author     Cedcoss <cedcoss@gmail.com>
 */
class Woo_products_erudition_Public {

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
		 * defined in Woo_products_erudition_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_products_erudition_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woo_products_erudition-public.css', array(), $this->version, 'all' );

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
		 * defined in Woo_products_erudition_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_products_erudition_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woo_products_erudition-public.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * bbloomer_display_sold_out_loop_woocommerce
	 * function to show stock out on shop page
	 * @since 1.0.0
	 * @version 1.0.0
	 * @return void
	 */
	function display_sold_out_loop_woocommerce() {
			global $product;
			if ( ! $product->is_in_stock() ) {
				echo '<span style="background:yellow;color:crimson;padding:10px;">Sold Out!</span>';
			}
	} 

	/**
	 * woocommerce_template_loop_rating
	 * function to show stock out on single page
	 * @version 1.0.0
	 * @since 1.0.0
	 * @return void
	 */
	function product_sold_out_on_single_page()
	{
		
			global $product;
			if ( !$product->is_in_stock() ) {
				echo "<div class='best-seller' style=background-color:yellow;color:crimson; width:40px;>
				<h3>Product Sold Out</h3>
			</div>";
			}
	}

	/**
	 * custom_override_checkout_fields
	 * function to override the checkout form fields
	 * @version 1.0.0
	 * @since 1.0.0
	 * @param  mixed $fields
	 * @return void
	 */
	function override_checkout_fields( $fields ) {
			$fields['billing']['billing_phone']['label'] = 'Email';
			$fields['billing']['billing_email']['label'] = 'Mobile';
			return $fields;

	}


	function woocommerce_locate_template_title( $template, $template_name, $template_path ) {
		global $woocommerce;
	  
		$_template = $template;
	  
		if ( ! $template_path ) $template_path = $woocommerce->template_url;
	  
		$plugin_path  = WOO_PRODUCT_ERU. 'woocommerce';
	  
		// Look within passed path within the theme - this is priority
		$template = locate_template(
	  
		  array(
			$template_path . $template_name,
			$template_name
		  )
		);
	  
		// Modification: Get the template from this plugin, if it exists
		if ( ! $template && file_exists( $plugin_path . $template_name ) )
		  $template = $plugin_path . $template_name;
	  
		// Use default template
		if ( ! $template )
		  $template = $_template;
	  
		// Return what we found
		return $template;
	  }

	





  
}
