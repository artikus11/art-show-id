<?php

namespace Art\ShowID;

class Main {

	/**
	 * Instance.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private static ?Main $instance = null;


	protected function __construct() {

		new Posts( $this );

		new Taxes( $this );

		new Others( $this );

		$this->init_hooks();
		$this->updater_init();
	}


	protected function init_hooks(): void {

		add_action( 'admin_enqueue_scripts', [ $this, 'clipboard_enqueue' ] );

	}


	public function clipboard_enqueue(): void {

		wp_enqueue_script( 'clipboard' );

		ob_start();
		?>

		<script>
			jQuery( function ( $ ) {

				var clipboard = new ClipboardJS( '.item-id' );

				clipboard.on( 'success', function ( e ) {
					$( e.trigger ).next().removeClass( 'hidden' );
					setTimeout( function () {
						$( e.trigger ).next().addClass( 'hidden' );
					}, 1000 );
					e.clearSelection();
				} );
			} );
		</script>

		<?php
		wp_add_inline_script( 'clipboard', str_replace( [ '<script>', '</script>' ], '', ob_get_clean() ) );
	}


	/**
	 * @return string
	 */
	public function plugin_path(): string {

		return untrailingslashit( ASID_PLUGIN_DIR );
	}


	/**
	 * @return string
	 */
	public function template_path(): string {

		return apply_filters( 'asid_template_path', ASID_PLUGIN_SLUG . '/' );
	}


	/**
	 * @param  string $template_name
	 *
	 * @return string
	 */
	public function get_template( string $template_name ): string {

		$template_path = locate_template( $this->template_path() . $template_name );

		if ( ! $template_path ) {
			$template_path = sprintf( '%s/%s/%s', $this->plugin_path(), ASID_PLUGIN_TEPMLATES, $template_name );
		}

		return apply_filters( 'asid_locate_template', $template_path );
	}


	protected function updater_init(): void {

		$updater = new Updater( ASID_PLUGIN_AFILE );
		$updater->set_repository( 'art-show-id' );
		$updater->set_username( 'artikus11' );
		$updater->set_authorize( 'Z2hwX3BaWlVBSW43NU9wczl1Tk5MVkdJVUFnYUVlblNEUzBqQWh0UQ==' );
		$updater->init();
	}


	/**
	 * @return object Instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) :
			self::$instance = new self();
		endif;

		return self::$instance;

	}

}