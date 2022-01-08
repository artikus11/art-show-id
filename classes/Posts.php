<?php

namespace Art\ShowID;

class Posts extends Columns {

	public function manage_columns() {

		$post_types = $this->get_types();

		foreach ( $post_types as $post_type ) {
			add_filter( "manage_{$post_type}_posts_columns", [ $this, 'add_column' ], PHP_INT_MAX );
			add_action( "manage_{$post_type}_posts_custom_column", [ $this, 'action_render_columns' ], PHP_INT_MAX, 2 );
		}

	}


}