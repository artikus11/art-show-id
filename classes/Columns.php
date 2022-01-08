<?php

namespace Art\ShowID;

abstract class Columns {

	public $items = [];


	public function __construct() {

		add_action( 'current_screen', [ $this, 'manage_columns' ], PHP_INT_MAX );
		add_action( 'admin_head', [ $this, 'admin_enqueue' ] );
	}


	public function admin_enqueue(): void {

		echo '<style type="text/css">.widefat .column-item_id {width: 90px; vertical-align: top;}</style>';
	}


	public function manage_columns() { }


	public function action_render_columns( $column, $id ) {

		if ( ! $id ) {
			return;
		}

		if ( $column !== 'item_id' ) {
			return;
		}

		$this->load_template( $column, $id );
	}


	public function filter_render_columns( $content, $column, $id ) {

		if ( ! $id ) {
			return $content;
		}

		if ( $column !== 'item_id' ) {
			return $content;
		}

		ob_start();

		$this->load_template( $column, $id );

		return ob_get_clean();
	}


	protected function get_types() {

		return apply_filters( 'acid_posts_types', get_post_types() );
	}


	protected function get_screen() {

		return get_current_screen();
	}


	protected function get_screen_id() {

		return $this->get_screen()->id;
	}


	protected function get_screen_post_type() {

		return $this->get_screen()->post_type;
	}


	protected function get_screen_taxonomy() {

		return $this->get_screen()->taxonomy;
	}


	public function add_column( $columns ): array {

		return array_slice( $columns, 0, 1, true )
		       + [ 'item_id' => 'ID' ]
		       + array_slice( $columns, 1, null, true );
	}


	/**
	 * @param  string $column
	 * @param         $id
	 */
	protected function load_template( string $column, $id ): void {

		load_template(
			asid()->get_template( 'render-column.php' ),
			false,
			[
				'column' => $column,
				'id'     => $id,
			]
		);
	}

}