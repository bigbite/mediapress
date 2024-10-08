<?php

namespace Big_Bite\Sample_I18n_Plugin;

use Error;

/**
 * Runs the plugin setup sequence.
 *
 * @throws \Error If the asset constants are not defined.
 *
 * @return void
 */
function setup(): void {
	if ( ! defined( 'SAMPLE_I18N_PLUGIN_EDITOR_JS' ) ) {
		throw new Error( 'Asset constants are not defined. You may need to run an asset build.' );
	}

	new Loader();
}

/**
 * Register the plugin textdomain
 *
 * @return void
 */
function textdomain(): void {
	load_plugin_textdomain(
		'mydomain',
		plugin_rel_path: basename( dirname( SI18N_PLUGIN_FILE ) ) . '/languages'
	);
}

/**
 * Declare sample "plain" strings for translation
 *
 * @return void
 */
function plain_translatable_strings(): void {
	[
		__( 'A plain string', 'mydomain' ),

		// translators: this string has an accompanying comment
		__( 'A plain string with explanatory comment', 'mydomain' ),

		_x(
			'A string with context',
			'context explainer',
			'mydomain'
		),

		_n(
			'Singular string',
			'Plural string',
			wp_rand( 0, 10 ),
			'mydomain'
		),

		_nx(
			'Singular string with context',
			'Plural string with context',
			wp_rand( 0, 10 ),
			'context explainer',
			'mydomain',
		),
	];
}

/**
 * Declare sample complex strings for translation
 *
 * @return void
 */
function complex_translatable_strings(): void {
	$string_placholder_a = 'foo';
	$string_placholder_b = 'bar';
	$number_placeholder  = wp_rand( 0, 10 );

	// strings with placeholders
	[
		__( 'WP String', 'default' ),

		sprintf(
			// translators: %s: explain origin of placholder here
			__(
				'A string with a sprintf placeholder %s',
				'mydomain'
			),
			esc_html( $string_placholder_a )
		),

		sprintf(
			// translators: %1$s: explain placeholder a, %2$s: explain placeholder b
			__( 'A string with two sprintf placeholders %1$s, %2$s', 'mydomain' ),
			esc_html( $string_placholder_a ),
			esc_html( $string_placholder_b ),
		),

		sprintf(
			// translators: %d: explain what the placeholder is
			_n(
				'Singular string with numeric placeholder %d',
				'Plural string with numeric placeholder %d',
				$number_placeholder,
				'mydomain'
			),
			esc_html( number_format_i18n( $number_placeholder, 2 ) )
		),
	];
}

/**
 * Declare sample *invalid* strings for translation
 *
 * @return void
 */
function invalid_translatable_strings(): void {
	$string = 'Sample string using a variable';
	$domain = 'mydomain';

	// invalid strings
	[
		__( $string, 'mydomain' ),
		__( $string, $domain ),
	];
}
