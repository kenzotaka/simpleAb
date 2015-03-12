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
class KsySabPageExtendsSchema extends CakeSchema {
	public $name = 'KsySabPageExtends';
	
	public $file = 'ksy_sab_page_extends.php';

	public $connection = 'plugin';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $ksy_sab_page_extends = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'page_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'is_home' => array('type' => 'boolean', 'null' => false, 'default' => false),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => 0),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}