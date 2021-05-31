		<form role="search" method="get" class="space-default-search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
			<input type="search" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo esc_attr_x( 'Enter keyword...', 'placeholder', 'mercury' ); ?>">
		</form>