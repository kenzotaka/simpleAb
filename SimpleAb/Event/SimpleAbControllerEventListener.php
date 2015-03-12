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
App::uses('SimpleAb.Page', 'Model/Behavior');

class SimpleAbControllerEventListener extends BcControllerEventListener {
/**
 * 登録イベント
 *
 * @var array
 */
	public $events = array('Pages.initialize');

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
 * PagesController.initialize Event Listener
 * called before beforeFilter()
 */
	public function pagesInitialize(CakeEvent $event) {
		$event->subject->Page->Behaviors->attach('SimpleAb.Page');
	}
}