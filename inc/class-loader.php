<?php

namespace Big_Bite\Sample_I18n_Plugin;

/**
 * Loader for handling assets.
 */
class Loader {
	public const SCRIPT_NAME = 'sample-i18n-plugin-script';
	public const STYLE_NAME  = 'sample-i18n-plugin-style';

	/**
	 * Initialise the hooks and filters.
	 */
	public function __construct() {
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_editor_assets' ], 1 );
	}

	/**
	 * Enqueue any required assets for the block editor.
	 *
	 * @return void
	 */
	public function enqueue_block_editor_assets(): void {
		$plugin_name = basename( SAMPLE_I18N_PLUGIN_DIR );

		wp_enqueue_script(
			self::SCRIPT_NAME,
			plugins_url( $plugin_name . '/dist/scripts/' . SAMPLE_I18N_PLUGIN_EDITOR_JS, $plugin_name ),
			SAMPLE_I18N_PLUGIN_EDITOR_DEPENDENCIES,
			SAMPLE_I18N_PLUGIN_VERSION,
			false
		);

		wp_set_script_translations(
			self::SCRIPT_NAME,
			'mydomain',
			plugin_dir_path( SI18N_PLUGIN_FILE ) . '/languages'
		);
	}
}
