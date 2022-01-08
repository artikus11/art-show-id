<?php

namespace Art\ShowID;

class Others extends Columns {

	public function manage_columns() {

		if ( ! $this->get_screen_taxonomy() ) {
			add_filter( "manage_{$this->get_screen_id()}_columns", [ $this, 'add_column' ], PHP_INT_MAX );

			if ( $this->get_screen_id() === 'edit-comments' ) {
				add_action( 'manage_comments_custom_column', [ $this, 'action_render_columns' ], PHP_INT_MAX, 2 );
			}

			if ( $this->get_screen_id() === 'users' ) {
				add_filter( "manage_{$this->get_screen_id()}_custom_column", [ $this, 'filter_render_columns' ], PHP_INT_MAX, 3 );
			}

		}

	}

}