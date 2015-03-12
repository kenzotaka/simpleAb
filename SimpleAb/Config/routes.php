<?php

App::uses('BaserPluginAppModel', 'Model');

try {
	$PageExtend = ClassRegistry::init('SimpleAb.PageExtend');
} catch (Exception $ex) {
	$PageExtend = null;
}
if ($PageExtend) {
	$homes = $PageExtend->isHome();
	if (count($homes)>0) {
		Router::connect('/', array('plugin' => 'simple_ab', 'controller' => 'page_extend', 'action' => 'home'));
	}
	$groups = $PageExtend->redirGroup();
	if (count($groups)>0) {
		foreach ($groups as $group) {
			$url = '/' .	$group['PageExtend']['name'];
			Router::connect($url, array('plugin' => 'simple_ab', 'controller' => 'page_extend', 'action' => 'group', $group['PageExtend']['name']));
		}
	}
}
