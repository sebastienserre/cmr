<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 99999 );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/cmr.css', array( 'oceanwp-style', 'elementor-frontend', 'parent-style' ) );
}

add_filter('tribe_events_register_event_type_args', 'cmr_tec_cat' );
function cmr_tec_cat($post_type_args){
	array_push( $post_type_args['taxonomies'], 'category');
	return $post_type_args;
}

function wpc_unregister_job_listing_type() {
	unregister_taxonomy('tribe_events_cat'); // Specify the taxonomy to unregister
}
add_action('init', 'wpc_unregister_job_listing_type');

add_action( 'after_setup_theme', 'cmr_load_files' );
function cmr_load_files() {
	include get_stylesheet_directory() . '/inc/taxo-event-type.php';
}

/**
 * Filtre les paramètres du shortcode ecs-list-events pour matcher la bonne catégorie
 */
add_filter( 'ecs_atts_pre_query', 'cmr_event_sc', 10, 3);
/**
 * @param $atts array array de paramètres du shortcode ecs-list-events
 *
 * @return $atts array.
 * @url https://support.ecclesial.fr/index.php?page=ticket&id=954
 * @author Sébastien SERRE
 *
 */
function cmr_event_sc( $atts ){
	if ( !empty ( $atts['cats'] ) ) {
		unset( $atts['event_tax'] );
		if ( strpos( $atts['cat'], "," ) !== false ) {
			$atts['cats'] = explode( ",", $atts['cat'] );
			$atts['cats'] = array_map( 'trim', $atts['cats'] );
		} else {
			$atts['cats'] = array( trim( $atts['cat'] ) );
		}

		foreach ( $atts['cats'] as $cat ) {
			$atts['event_tax'] = array(
				'relation' => 'OR',
			);

			$atts['event_tax'][] = array(
				'taxonomy' => 'category',
				'field'    => 'name',
				'terms'    => $cat,
			);
			$atts['event_tax'][] = array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $cat,
			);
		}
	}
	return $atts;
}

/** Change The Blog Related Query Arguments
 * @return date, author, categories, comments
 */
function thfo_oceanwp_blog_post_related_query_args( $args ) {

	// Remove tax_query parameter so it doesn't try and display items from the same category
	//$args['tax_query'] = NULL;

	// Change orderby parameter from random to date
	$args['orderby'] = 'date';

	// Return args
	return $args;

}
add_filter( 'ocean_blog_post_related_query_args', 'thfo_oceanwp_blog_post_related_query_args' );

add_filter( 'ocean_display_page_header', function ( $display ){
	if ( is_home() || is_front_page() ){
		return false;
	}
	return $display;
} );