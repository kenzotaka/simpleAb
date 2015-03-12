<?php
/**
 * Simple A/B <baserCMS plugin>
 *
 * @copyright		Copyright 2015, Kaseya Factory LLC.
 * @link			http://www.ksy.jpn.com
 * @package			SimpleAb
 * @since			Baser v 3.6.0
 * @license			http://barket.jp/files/baser_market_license.pdf
 */
App::uses('BcPluginAppController', 'Controller');

class PageExtendController extends BcPluginAppController {
	
	public $components = array('Cookie', 'BcAuth');
	public $uses = array('Page', 'SimpleAb.PageExtend');
	
	public function beforeFilter() {
		parent::beforeFilter();
		// 認証設定
		$this->BcAuth->allow();
	}
	
	/**
	 * TOPページをランダムに出力する
	 */
	public function home() {
		$exList = $this->PageExtend->find('list', array('fields'=>'PageExtend.page_id', 'conditions'=> array('PageExtend.is_home' => true)));
		$options = array();
		$options['order'] = 'rand()';
		$options['conditions'] = array('Page.id' => array_values($exList));
		$options['conditions'] = am($options['conditions'], $this->Page->getConditionAllowPublish());
		$pages = $this->Page->find('first', $options);
		if (count($pages) != 0) {
			$url = $pages['Page']['url'];
			return $this->redirect($url);
		}
		$this->notFound();
	}
	
	/**
	 * 特定のURLでA/Bテスト向けにランダムに内容を切り替える
	 */
	public function group() {
		$path = func_get_args();
		if (is_array($path) && count($path) == 1) {
			$path = explode('/', $path[0]);
		}
		$key = implode('/', $path);
		$exList = $this->PageExtend->find('list', array('fields'=>'PageExtend.page_id', 'conditions'=> array('PageExtend.name' => $key)));
		$options = array();
		$options['order'] = 'rand()';
		$options['conditions'] = array('Page.id' => array_values($exList));
		$options['conditions'] = am($options['conditions'], $this->Page->getConditionAllowPublish());
		$pages = $this->Page->find('first', $options);
		if (count($pages) != 0) {
			$url = $pages['Page']['url'];
			return $this->redirect($url);
		}
		$this->notFound();
	}
	
}
