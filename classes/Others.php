<?php

namespace Art\ShowID;

class Others extends Columns {

	public function manage_columns() {

		$this->items = [
			'edit-comments',
			'users',
		];

		foreach ( $this->items as $item ) {
			add_filter( "manage_{$item}_columns", [ $this, 'add_column' ], PHP_INT_MAX );

			if ( $item === 'edit-comments' ) {
				add_action( 'manage_comments_custom_column', [ $this, 'action_render_columns' ], PHP_INT_MAX, 2 );
			}

			if ( $item === 'users' ) {
				add_filter( "manage_{$item}_custom_column", [ $this, 'filter_render_columns' ], PHP_INT_MAX, 3 );
			}

		}

	}

}