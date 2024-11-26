<?php
/**
 * Frontend functionality.
 */

namespace um_ext\um_cpt\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Class Frontend.
 *
 * @package um_ext\um_cpt\core
 */
class Frontend {


	/**
	 * Frontend constructor.
	 */
	public function __construct() {
		if ( defined( 'um_groups_version' ) ) {
			add_shortcode( 'um_single_group', array( $this, 'single_group' ) );
		}
		if ( defined( 'JB_VERSION' ) ) {
			add_shortcode( 'um_single_job', array( $this, 'single_job' ) );
		}
		add_action( 'init', array( $this, 'init' ), 20 );
	}


	/**
	 * Hooks.
	 */
	public function init() {
		if ( defined( 'um_groups_version' ) ) {
			remove_filter( 'the_content', 'groups_single_remove_content', 10 );
			add_filter( 'the_content', array( $this, 'single_group_content' ), 20, 1 );
		}
		if ( defined( 'JB_VERSION' ) ) {
			JB()->options()->update( 'job-template', 'default' );
			remove_filter( 'the_content', array( JB()->frontend()->templates(), 'cpt_content' ), 10 );
			add_filter( 'the_content', array( $this, 'single_job_content' ), 20, 1 );
		}
	}


	/**
	 * Single group shortcode.
	 *
	 * @param array $attr {
	 *		Attributes of the shortcode.
	 *
	 *		@type int    group_id     The group ID.
	 *		@type string avatar_size  Avatar size. Accepts 'small'. Default ''.
	 *		@type int    show_actions Show a section with buttons if 1. Default 1.
	 *		@type int    show_author  Show the group author if 1. Default 1.
	 * }
	 * @return string
	 */
	public function single_group( $attr ) {
		if ( 'um_groups' === get_post_type() ) {
			$attr['group_id'] = get_the_ID();
			return UM()->Groups()->shortcode()->single( $attr );
		}
	}


	/**
	 * Render the group view.
	 *
	 * Called via the 'the_content' hook with priority 20.
	 *
	 * @param string $content The post content.
	 *
	 * @return string The post content.
	 */
	public function single_group_content( $content ) {
		if ( is_single() && 'um_groups' === get_post_type() ) {
			$page_id = um_get_predefined_page_id( 'cpt_group' );
			if ( $page_id ) {
				$page = get_post( $page_id );
				if ( $page && false !== strpos( $page->post_content, '[um_single_group]' ) ) {
					$template = wpautop( $page->post_content );
					if ( function_exists( 'um_convert_tags' ) ) {
						$template = um_convert_tags( $template, array(), false );
					}

					$content = apply_shortcodes( $template );
					if ( $content ) {
						$content = str_replace( ']]>', ']]&gt;', $content );
					}
				}
			}
		}
		return $content;
	}


	/**
	 * Single job shortcode.
	 *
	 * @param array $attr {
	 *		Attributes of the shortcode.
	 *
	 *		@type int  id            The job ID.
	 *		@type bool ignore_status Internal argument. Default false.
	 * }
	 * @return string
	 */
	public function single_job( $attr ) {
		if ( 'jb-job' === get_post_type() ) {
			$attr['id']            = get_the_ID();
			$attr['ignore_status'] = true;
			return JB()->frontend()->shortcodes()->single_job( $attr );
		}
	}


	/**
	 * Render the job view.
	 *
	 * Called via the 'the_content' hook with priority 20.
	 *
	 * @param string $content The post content.
	 *
	 * @return string The post content.
	 */
	public function single_job_content( $content ) {
		if ( is_single() && 'jb-job' === get_post_type() ) {
			$page_id = um_get_predefined_page_id( 'cpt_job' );
			if ( $page_id ) {
				$page = get_post( $page_id );
				if ( $page && false !== strpos( $page->post_content, '[um_single_job]' ) ) {
					$template = wpautop( $page->post_content );
					if ( function_exists( 'um_convert_tags' ) ) {
						$template = um_convert_tags( $template, array(), false );
					}

					$content = apply_shortcodes( $template );
					if ( $content ) {
						$content = str_replace( ']]>', ']]&gt;', $content );
					}
				}
			}
		}
		return $content;
	}

}
