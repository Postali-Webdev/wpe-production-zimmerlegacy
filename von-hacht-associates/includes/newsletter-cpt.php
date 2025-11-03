<?php
/**
 * Newsletter Custom Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function newsletter() {
	$labels = array(
		'name'               => __( 'Newsletters', 'post type general name' ),
		'singular_name'      => __( 'Newsletter', 'post type singular name' ),
		'add_new'            => __( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Newsletter' ),
		'edit_item'          => __( 'Edit Newsletter' ),
		'new_item'           => __( 'New Newsletter' ),
		'all_items'          => __( 'All Newsletters' ),
		'view_item'          => __( 'View Newsletters' ),
		'search_items'       => __( 'Search Newsletters' ),
		'not_found'          => __( 'No Newsletters found' ),
		'not_found_in_trash' => __( 'No Newsletters found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Newsletters'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'All of my Newsletters',
		'public'        => true,
		'menu_position' => 7,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => 6232,
		'menu_icon'		=> 'dashicons-text-page',
        'rewrite' => array( 'slug' => 'our-newsletter', 'with_front' => false ),

	);
	register_post_type( 'newsletter', $args );	
}
add_action( 'init', 'newsletter' );