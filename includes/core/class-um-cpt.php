<?php
/**
 * Init the extension.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class UM_CPT.
 *
 * @package um_ext\um_cpt\core
 */
class UM_CPT {


	/**
	 * An instance of the class.
	 *
	 * @var UM_CPT
	 */
	private static $instance;


	/**
	 * Creates an instance of the class.
	 *
	 * @return UM_CPT
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}


	/**
	 * UM_CPT constructor.
	 */
	public function __construct() {
		$this->common();
		if( UM()->is_ajax() ) {

		} elseif ( UM()->is_request( 'admin' ) ) {

		} elseif ( UM()->is_request( 'frontend' ) ) {
			$this->frontend();
		}
	}


	/**
	 * Common functionality.
	 * 
	 * @return um_ext\um_cpt\core\Common()
	 */
	public function common() {
		if ( empty( UM()->classes['um_cpt_common'] ) ) {
			require_once um_cpt_path . 'includes/core/class-common.php';
			UM()->classes['um_cpt_common'] = new um_ext\um_cpt\core\Common();
		}
		return UM()->classes['um_cpt_common'];
	}


	/**
	 * Frontend functionality.
	 *
	 * @return um_ext\um_cpt\core\Frontend()
	 */
	public function frontend() {
		if ( empty( UM()->classes['um_cpt_frontend'] ) ) {
			require_once um_cpt_path . 'includes/core/class-frontend.php';
			UM()->classes['um_cpt_frontend'] = new um_ext\um_cpt\core\Frontend();
		}
		return UM()->classes['um_cpt_frontend'];
	}
}
