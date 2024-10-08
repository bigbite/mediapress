<?php

if ( ! function_exists( 'print_example_i18n_string' ) ) {
	/**
	 * Prints an example translatable string
	 *
	 * @return void
	 */
	function print_example_i18n_string(): void {
		esc_html_e( 'Sample translatable string', 'mydomain' );
	}
}

add_action( 'wp_body_open', 'print_example_i18n_string' );
