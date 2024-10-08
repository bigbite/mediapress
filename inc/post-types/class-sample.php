<?php

declare( strict_types = 1 );

namespace Big_Bite\Sample_I18n_Plugin\Post_Types;

/**
 * Sample post type registration
 *
 * @return void
 */
class Sample {

	/**
	 * Construct the class
	 */
	public function __construct() {
		register_post_type(
			'sample',
			[
				'hierarchical' => false,
				'rewrite'      => true,
				'show_ui'      => true,
				'labels'       => $this->get_labels(),
			],
		);
	}

	/**
	 * Retrieve the labels for the post type
	 *
	 * @return array<string,string>
	 */
	public function get_labels(): array {
		return [
			'name'                  => _x( 'Samples', 'Post Type General Name', 'mydomain' ),
			'singular_name'         => _x( 'Sample', 'Post Type Singular Name', 'mydomain' ),
			'menu_name'             => __( 'Samples', 'mydomain' ),
			'name_admin_bar'        => __( 'Sample', 'mydomain' ),
			'archives'              => __( 'Sample Archives', 'mydomain' ),
			'attributes'            => __( 'Sample Attributes', 'mydomain' ),
			'parent_item_colon'     => __( 'Parent Sample:', 'mydomain' ),
			'all_items'             => __( 'All Samples', 'mydomain' ),
			'add_new_item'          => __( 'Add New Sample', 'mydomain' ),
			'add_new'               => __( 'Add New', 'mydomain' ),
			'new_item'              => __( 'New Sample', 'mydomain' ),
			'edit_item'             => __( 'Edit Sample', 'mydomain' ),
			'update_item'           => __( 'Update Sample', 'mydomain' ),
			'view_item'             => __( 'View Sample', 'mydomain' ),
			'view_items'            => __( 'View Samples', 'mydomain' ),
			'search_items'          => __( 'Search Samples', 'mydomain' ),
			'not_found'             => __( 'No Samples found', 'mydomain' ),
			'not_found_in_trash'    => __( 'No Samples found in Trash', 'mydomain' ),
			'featured_image'        => __( 'Featured Image', 'mydomain' ),
			'set_featured_image'    => __( 'Set featured image', 'mydomain' ),
			'remove_featured_image' => __( 'Remove featured image', 'mydomain' ),
			'use_featured_image'    => __( 'Use as featured image', 'mydomain' ),
			'insert_into_item'      => __( 'Insert into Sample', 'mydomain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Sample', 'mydomain' ),
			'items_list'            => __( 'Samples list', 'mydomain' ),
			'items_list_navigation' => __( 'Samples list navigation', 'mydomain' ),
			'filter_items_list'     => __( 'Filter Samples', 'mydomain' ),
		];
	}

};
