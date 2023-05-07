<?php
/**
 * Plugin Name: Block Editor Sidebar Resize
 * Description: Makes the sidebar for the block editor resizeable with css on viewports larger than 782px.
 * Version: 1.0
 * Author: Kevin Clark
 * Author URI: https://thisbailiwick.com
 * Text Domain: block-editor-sidebar-resize
 **/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Enqueue the custom CSS for admin edit pages using the block editor.
 */
function block_editor_sidebar_resize_enqueue() {
	$screen = get_current_screen();

	if ( 'post' === $screen->base && function_exists( 'use_block_editor_for_post_type' ) && use_block_editor_for_post_type( $screen->post_type ) ) {
		wp_enqueue_style( 'block-editor-sidebar-resize', plugin_dir_url( __FILE__ ) . 'block-editor-sidebar-resize.css', [], '1.0.0', 'all' );
	}
}

add_action( 'admin_enqueue_scripts', 'block_editor_sidebar_resize_enqueue' );
