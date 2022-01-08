<?php

namespace Art\ShowID;

class Main {

	/**
	 * Instance.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private static ?object $instance = null;


	public function __construct() {

		new Posts();

		new Taxes();

		new Others();

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


	/**
	 * Instance.
	 * An global instance of the class. Used to retrieve the instance
	 * to use on other files/plugins/themes.
	 *
	 * @return object Instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) :
			self::$instance = new self();
		endif;

		return self::$instance;

	}

}