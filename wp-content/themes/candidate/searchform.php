<form role="search" method="get" class="search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>"><input type="text" class="search_field" placeholder="<?php _e('Search', 'axiom'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php _e('Search for:', 'axiom'); ?>" /><button type="submit" class="search_button icon-search-1" href="#"></button></form>