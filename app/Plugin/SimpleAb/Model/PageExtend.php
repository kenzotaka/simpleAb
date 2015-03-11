<?php
/**
 * ページ拡張モデル
 * Simple A/B <baserCMS plugin>
 *
 * @copyright		Copyright 2015, Kaseya Factory LLC.
 * @link			http://www.ksy.jpn.com
 * @package			SimpleAb
 * @since			Baser v 3.6.0
 * @license			http://barket.jp/files/baser_market_license.pdf
 */

/**
 * Include files
 */
App::uses('BcPluginAppModel', 'Model');

/**
 * ページ拡張モデル
 *
 */
class PageExtend extends BcPluginAppModel {

/**
 * クラス名
 *
 * @var string
 * @access public
 */
	public $name = 'PageExtend';

/**
 * テーブル名
 *
 * @var string
 * @access public
 */
	public $useTable = 'ksy_sab_page_extends';
	
/**
 * ビヘイビア
 * 
 * @var array
 * @access public
 */
	public $actsAs = array('BcCache');

/**
 * belongsTo
 * 
 * @var array
 * @access public
 */
	public $belongsTo = array(
		'Page' => array('className' => 'Page',
			'foreignKey' => 'page_id'));

	
/**
 * バリデーション
 *
 * @var array
 * @access	public
 */
	public $validate = array(
	);
	
/**
 * Home属性のページ
 */
	public function isHome() {
		return $this->find('all', array('conditions' => array('is_home' => true)));
	}
	
/**
 * redirect元の一覧
 */
	public function redirGroup() {
		$options = array();
		$options['fields'] = 'DISTINCT name';
		$options['conditions'] = array(
			'NOT' => array('name' => ""),
		);
		return $this->find('all', $options);
	}
	
}