<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/GarySwift
 * @since      1.0.0
 *
 * @package    Header_Contact_Bar
 * @subpackage Header_Contact_Bar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Header_Contact_Bar
 * @subpackage Header_Contact_Bar/public
 * @author     Gary Swift <garyswiftmail@gmail.com>
 */
class Header_Contact_Bar_Public {

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
		// add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles') );
		add_action( 'foundationpress_layout_start', array($this, 'foundationpress_layout_start_content')  );
		add_action( 'foundationpress_layout_end', array($this, 'foundationpress_layout_end_content')  );

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
		 * defined in Header_Contact_Bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Header_Contact_Bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$options = get_option( 'wp_swift_contact_bars_settings' );
		if (!isset($options['wp_swift_contact_bars_checkbox_disable_public_css'])) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/contact-bar-public.css', array(), $this->version, 'all' );
		}
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
		 * defined in Header_Contact_Bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Header_Contact_Bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/header-contact-bar-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Load in the html for the header bar
	 *
	 * @since    1.0.0
	 */
	public function foundationpress_layout_start_content() {
		$options = get_option( 'wp_swift_contact_bars_settings' );
		if (!isset($options['wp_swift_contact_bars_checkbox_disable_header'])) {
			require_once plugin_dir_path( __FILE__ ) . 'partials/header-contact-bar-public-display.php';
		}
	}

	/**
	 * Load in the html for the footer bar
	 *
	 * @since    1.0.0
	 */
	public function foundationpress_layout_end_content() {
		$options = get_option( 'wp_swift_contact_bars_settings' );
		if (!isset($options['wp_swift_contact_bars_checkbox_disable_footer'])) {
			require_once plugin_dir_path( __FILE__ ) . 'partials/footer-contact-bar-public-display.php';
		}
	}	
}


function wp_swift_contact_bars_social_media(  ) { 

?><div class="social-media-wrapper">
	<?php if (function_exists('get_social_media')): ?>
		<?php $social_media_links = get_social_media(); ?>

		<?php if ( is_array($social_media_links) && count($social_media_links) ) : ?>		     
		   		<div class="social"><?php 
		   		foreach ($social_media_links as $key => $link): 
					if (isset($link['image']['url'])): 
						?><a href="<?php echo $link['link']; ?>" class="<?php echo $link['slug']; ?>" target="_blank">
			        		<img src="<?php echo $link['image']['url']; ?>" alt="">
			        		<span class="hide">Social Media Link <?php echo $link['name']; ?></span>
			        	</a><?php 
			        	else: ?><a href="<?php echo $link['link']; ?>" class="effect hvr-sweep-to-top icon-link <?php echo $link['slug']; ?>" target="_blank">
			        		<i class="fa <?php echo $link['icon'].' '. $link['slug']; ?>" aria-hidden="true"></i>
			        		<span class="hide">Social Media Link <?php echo $link['name']; ?></span>
			        	</a><?php 
					endif;
		        endforeach ?>
		        </div>
		<?php endif; ?>	

	<?php endif ?>
</div><?php 
}