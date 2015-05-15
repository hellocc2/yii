<?php
/**
 * The template for displaying search forms in Generate
 *
 * @package Generate
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php apply_filters( 'generate_search_label', __( 'Search for:', 'generate' ) ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo apply_filters( 'generate_search_placeholder', __( 'Search &hellip;', 'generate' ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php apply_filters( 'generate_search_label', __( 'Search for:', 'generate' ) ); ?>">
	</label>
	<input type="submit" class="search-submit" value="<?php echo apply_filters( 'generate_search_button', __( 'Search', 'generate' ) ); ?>">
</form>
