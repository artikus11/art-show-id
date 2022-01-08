<?php

namespace Art\ShowID;

class Taxes extends Columns {

	public function manage_columns() {

		if ( $this->get_screen_taxonomy() ) {
			add_filter( "manage_{$this->get_screen_id()}_columns", [ $this, 'add_column' ], PHP_INT_MAX );
			add_filter( "manage_{$this->get_screen_taxonomy()}_custom_column", [ $this, 'filter_render_columns' ], PHP_INT_MAX, 3 );
		}

	}

}