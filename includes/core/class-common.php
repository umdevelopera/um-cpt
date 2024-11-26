<?php
/**
 * Common functionality.
 */

namespace um_ext\um_cpt\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Class Common.
 *
 * @package um_ext\um_cpt\core
 */
class Common {


	/**
	 * Common constructor.
	 */
	public function __construct() {
		add_filter( 'um_core_pages', array( $this, 'core_pages' ) );
		add_filter( 'um_setup_predefined_page_content', array( $this, 'pages_content' ), 10, 2 );
	}


	/**
	 * Add pages.
	 *
	 * @param array $pages Predefined pages.
	 *
	 * @return array Predefined pages.
	 */
	function core_pages( $pages ) {
		if ( defined( 'um_groups_version' ) ) {
			$pages['cpt_group'] = array(
				'title' => __( 'Single Group template', 'um-cpt' ),
			);
		}
		if ( defined( 'JB_VERSION' ) ) {
			$pages['cpt_job'] = array(
				'title' => __( 'Single Job template', 'um-cpt' ),
			);
		}
		return $pages;
	}


	/**
	 * Predefined pages content.
	 *
	 * @param string $content Predefined page content.
	 * @param string $slug    Predefined page slug (key).
	 *
	 * @return string Predefined page content.
	 */
	public function pages_content( $content, $slug ) {
		if ( 'cpt_group' === $slug ) {
			$content = '[um_single_group]';
		} elseif ( 'cpt_job' === $slug ) {
			$content = '[um_single_job]';
		}
		return $content;
	}

}
