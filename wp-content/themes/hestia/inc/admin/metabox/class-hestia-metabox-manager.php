<?php
/**
 * Page settings metabox.
 *
 * @package Hestia
 */

/**
 * Class Manager
 *
 * @package Hestia
 */
class Hestia_Metabox_Manager {

	/**
	 * Init function
	 */
	public function init() {
		add_action( 'add_meta_boxes', array( $this, 'add' ) );
	}

	/**
	 * Register meta box to control layout on pages and posts.
	 */
	public function add() {

		if ( $this->should_add_meta() === false ) {
			return;
		}

		$current_theme = wp_get_theme();
		$metabox_label = $current_theme->get( 'Name' ) . ' ' . esc_html__( 'General Settings', 'hestia' );

		add_meta_box(
			'hestia-page-settings',
			$metabox_label,
			array( $this, 'render_metabox' ),
			array( 'post', 'page', 'jetpack-portfolio' ),
			'side',
			'low'
		);
	}

	/**
	 * The metabox content.
	 */
	public function render_metabox() {
		do_action( 'hestia_settings_render_metabox_controls' );
	}

	/**
	 * Decide if the metabox should be visible.
	 *
	 * @return bool
	 */
	public function should_add_meta() {
		global $post;

		if ( empty( $post ) ) {
			return false;
		}

		$restricted_pages_id = array(
			get_option( 'woocommerce_pay_page_id' ),
			get_option( 'woocommerce_view_order_page_id' ),
			get_option( 'woocommerce_terms_page_id' ),
		);

		if ( in_array( $post->ID, $restricted_pages_id ) ) {
			return false;
		}

		return true;
	}
}
