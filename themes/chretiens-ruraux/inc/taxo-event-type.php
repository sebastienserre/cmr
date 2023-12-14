<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

if ( ! function_exists( 'event_type' ) ) {

// Register Custom Taxonomy
	function event_type() {

		$labels = array(
			'name'                       => _x( 'Events Types', 'Taxonomy General Name', 'chretiens-rurau' ),
			'singular_name'              => _x( 'Event Type', 'Taxonomy Singular Name', 'chretiens-rurau' ),
			'menu_name'                  => __( 'Type', 'chretiens-rurau' ),
			'all_items'                  => __( 'All Types', 'chretiens-rurau' ),
			'parent_item'                => __( 'Parent type', 'chretiens-rurau' ),
			'parent_item_colon'          => __( 'Parent type:', 'chretiens-rurau' ),
			'new_item_name'              => __( 'New type Name', 'chretiens-rurau' ),
			'add_new_item'               => __( 'Add New type', 'chretiens-rurau' ),
			'edit_item'                  => __( 'Edit type', 'chretiens-rurau' ),
			'update_item'                => __( 'Update type', 'chretiens-rurau' ),
			'view_item'                  => __( 'View type', 'chretiens-rurau' ),
			'separate_items_with_commas' => __( 'Separate types with commas', 'chretiens-rurau' ),
			'add_or_remove_items'        => __( 'Add or remove types', 'chretiens-rurau' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'chretiens-rurau' ),
			'popular_items'              => __( 'Popular types', 'chretiens-rurau' ),
			'search_items'               => __( 'Search types', 'chretiens-rurau' ),
			'not_found'                  => __( 'Not Found', 'chretiens-rurau' ),
			'no_terms'                   => __( 'No types', 'chretiens-rurau' ),
			'items_list'                 => __( 'items list', 'chretiens-rurau' ),
			'items_list_navigation'      => __( 'items list navigation', 'chretiens-rurau' ),
		);
		$rewrite = array(
			'slug'                       => 'event-type',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'event_type', array( 'tribe_events' ), $args );

	}
	add_action( 'init', 'event_type', 0 );

}