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
App::uses('SimpleAb.PageExtend', 'Model');

class SimpleAbHelperEventListener extends BcHelperEventListener {
/**
 * 登録イベント
 *
 * @var array
 */
	public $events = array('Form.afterForm');

/**
 * コンストラクタ
 *
 * @param object $View 
 * @param array $settings 
 * @return void
 */
	public function __construct() {
		parent::__construct();
	}
	
/**
 * afterForm
 *
 * @param CakeEvent $event
 * @return boolean
 */
	public function formAfterForm(CakeEvent $event) {
		$View = $event->subject();
		if ($View->name == 'Pages') {
			$event->data['fields'][] = array(
				'title'	=> 'TOPページグループ',
				'input'	=> $View->BcForm->input('PageExtend.is_home', array('type' => 'checkbox')),
			);
			$event->data['fields'][] = array(
				'title'	=> 'A/Bテストグループ',
				'input'	=> $View->BcForm->input('PageExtend.name', array('type' => 'input'))
					. $View->BcForm->input('PageExtend.id', array('type' => 'hidden'))
					. $View->BcForm->input('PageExtend.page_id', array('type' => 'hidden')),
			);
		}
	}
}