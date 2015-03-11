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
class PageBehavior extends ModelBehavior {

/**
 * Page::setup
 *
 * @param CakeEvent $event
 * @return boolean
 */
	public function setup(Model $Model, $settings = array()) {
		if ($Model->name == 'Page') {
			$Model->bindModel(
				array(
					'hasOne' => array(
						'PageExtend' => array('className' => 'ICanBuy.PageExtend'),
					)
				), false);
		}
	}

/**
 * Page::afterSave
 *
 * @param CakeEvent $event
 * @return boolean
 */
	public function afterSave(Model $Model, $created, $options = array()) {
		// $created : true = insert / false = update
		if ($created) {
			$page_id = $Model->getInsertID();
		} else {
			$page_id = $Model->data['Page']['id'];
		}
		// page_idでPageExtendを保存する
		$Model->data['PageExtend']['page_id'] = $page_id;
		$Model->PageExtend->save($Model->data);
	}
		
/**
 * Page::afterDelete
 *
 * @param CakeEvent $event
 * @return boolean
 */
	public function afterDelete(Model $Model) {
		// 対応するPageExtendも削除する
		$page_id = $Model->data['Page']['id'];
		if (!isset($Model->data['PageExtend']) || empty($Model->data['PageExtend']) || empty($Model->data['PageExtend']['id'])) {
			$pageExtend = $Model->PageExtend->findByPageId($page_id);
			$pageExtendId = $pageExtend['PageExtend']['id'];
		} else {
			$pageExtendId = $Model->data['PageExtend']['id'];
		}
		$Model->PageExtend->delete($pageExtendId);
	}
	
}