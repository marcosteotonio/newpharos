<?php
/**
 * Theme information Elvinaa Plus
 *
 * @package elvinaa-plus
 */

if ( ! class_exists( 'Elvinaa_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Elvinaa_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Elvinaa_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Elvinaa_About_Page
		 *
		 * @var Elvinaa_About_Page $instance The Elvinaa_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Elvinaa_About_Page instance.
		 *
		 * We make sure that only one instance of Elvinaa_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function elvinaa_init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Elvinaa_About_Page ) ) {
				self::$instance = new Elvinaa_About_Page;				
				self::$instance->config = $config;
				self::$instance->elvinaa_plus_setup_config();
				self::$instance->elvinaa_plus_setup_actions();				
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function elvinaa_plus_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = 'elvinaa-plus';			
			$this->notification  = isset( $this->config['notification'] ) ? $this->config['notification'] : ( '<p>' . sprintf( 'Welcome! Thank you for choosing %1$s ! To take full advantage of this theme, please make sure you visit our %2$swelcome page%3$s.', $this->theme_name, '<a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-theme-info' ) ) . '">', '</a>' ) . '</p><p><a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-theme-info' ) ) . '" class="button" style="text-decoration: none;">' . sprintf( 'Get started with %s', $this->theme_name ) . '</a></p>' );		
		}

		/**
		 * Setup the actions used for this page.
		 */
		public function elvinaa_plus_setup_actions() {
			
			/* activation notice */
			add_action( 'load-themes.php', array( $this, 'elvinaa_plus_activation_admin_notice' ) );						
		}		
		

		/**
		 * Adds an admin notice upon successful activation.
		 */
		public function elvinaa_plus_activation_admin_notice() {
			global $pagenow;
			if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
				add_action( 'admin_notices', array( $this, 'elvinaa_plus_about_page_welcome_admin_notice' ), 99 );
			}
		}

		/**
		 * Display an admin notice linking to the about page
		 */
		public function elvinaa_plus_about_page_welcome_admin_notice() {
			if ( ! empty( $this->notification ) ) {
				echo '<div class="updated notice is-dismissible">';
				echo wp_kses_post( $this->notification );
				echo '</div>';
			}
		}		

	}
}


/**
 *  Adding a About Elvinaa Plus page 
 */
add_action('admin_menu', 'elvinaa_plus_add_menu');

function elvinaa_plus_add_menu() {
     add_theme_page(__('About Elvinaa Plus Theme','elvinaa-plus'), __('About Elvinaa Plus','elvinaa-plus'),'manage_options', __('elvinaa-plus-theme-info','elvinaa-plus'), __('elvinaa_plus_theme_info','elvinaa-plus'));
}

/**
 *  Callback
 */
function elvinaa_plus_theme_info() {
?>
	<div class="elvinaa-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2><?php _e( 'Thank you for using Elvinaa Plus free WordPress theme', 'elvinaa-plus' ); ?></h2>
						<div class="title-content">
							<p><?php _e( 'Elvinaa Plus is a clean, modern and powerful free WordPress theme. It is best suitalble for all small sized and medium sized businesses. Elvinaa Plus comes with powerful theme customizer options that can be used to customize your website the way you want. It has a responsive layout built on Bootstrap framework. It also supports WooCommerce to build online stores.', 'elvinaa-plus' ); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-visibility"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/elvinaa-plus-free-wordpress-theme/" target="_blank"><?php _e( 'VIEW<br/> DEMO', 'elvinaa-plus' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-format-aside"></span>
						</div>
						<div class="heading">
							<h3><a href="https://spiraclethemes.com/elvinaa-documentation/" target="_blank"><?php _e( 'VIEW<br/> DOCUMENTATION', 'elvinaa-plus' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-video-alt2"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/elvinaa-video-tutorials/" target="_blank"><?php _e( 'VIDEO<br/> TUTORIALS', 'elvinaa-plus' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-sos"></span>
						</div>
						<div class="heading">
							<h3><a href="https://wordpress.org/support/theme/elvinaa-plus/" target="_blank"><?php _e( 'ASK FOR<br/> SUPPORT', 'elvinaa-plus' ); ?></a></h3>
						</div>						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-star-filled"></span>
						</div>
						<div class="heading">
							<h3><a href="https://wordpress.org/themes/elvinaa-plus/" target="_blank"><?php _e( 'RATE OUR<br/> THEME', 'elvinaa-plus' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-admin-tools"></span>
						</div>
						<div class="heading">
							<h3><a href="https://themes.trac.wordpress.org/log/elvinaa-plus/" target="_blank"><?php _e( 'VIEW<br/> CHANGELOGS', 'elvinaa-plus' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-email-alt"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/contact-us/" target="_blank"><?php _e( 'CONTACT<br/> US', 'elvinaa-plus' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box section-last">
						<div class="icon">
							<span class="dashicons dashicons-cart"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/elvinaa-premium-wordpress-theme/" target="_blank"><?php _e( 'BUY PRO WITH<br/> EXTRA FEATURES', 'elvinaa-plus' ); ?></a></h3>
						</div>						
					</div>
				</div>
			</div>			
		</div>		
	</div>
<?php
}
