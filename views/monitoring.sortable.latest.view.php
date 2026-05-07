<?php declare(strict_types = 0);

/**
 * @var CView $this
 * @var array $data
 */

$this->addJsFile('layout.mode.js');
$this->addJsFile('class.tagfilteritem.js');
$this->addJsFile('class.tabfilter.js');
$this->addJsFile('class.tabfilteritem.js');
$this->addJsFile('class.expandable.subfilter.js');
$this->addJsFile('items.js');
$this->addJsFile('multilineinput.js');

$this->includeJsFile('monitoring.latest.view.js.php');

$this->enableLayoutModes();
$web_layout_mode = $this->getLayoutMode();

if ($data['uncheck']) {
	uncheckTableRows('latest');
}

$html_page = (new CHtmlPage())
	->setTitle(_('Sortable Latest data'))
	->setWebLayoutMode($web_layout_mode)
	->setDocUrl(CDocHelper::getUrl(CDocHelper::MONITORING_LATEST_VIEW))
	->setControls(
		(new CTag('nav', true, (new CList())->addItem(get_icon('kioskmode', ['mode' => $web_layout_mode]))))
			->setAttribute('aria-label', _('Content controls'))
	);

if ($web_layout_mode == ZBX_LAYOUT_NORMAL) {
	$filter = (new CTabFilter())
		->setId('monitoring_latest_filter')
		->setOptions($data['tabfilter_options'])
		->addTemplate(new CPartial($data['filter_view'], $data['filter_defaults']));

	if ($data['mandatory_filter_set'] && $data['items'] || $data['subfilter_set']) {
		$filter->addSubfilter(new CPartial('monitoring.latest.subfilter',
			array_intersect_key($data, array_flip(['subfilters', 'subfilters_expanded'])))
		);
	}

	foreach ($data['filter_tabs'] as $tab) {
		$tab['tab_view'] = $data['filter_view'];
		$filter->addTemplatedTab($tab['filter_name'], $tab);
	}

	// Set javascript options for tab filter initialization in monitoring.latest.view.js.php file.
	$data['filter_options'] = $filter->options;
	$html_page->addItem($filter);
}
else {
	$data['filter_options'] = null;
}

$html_page
	->addItem(new CPartial('monitoring.sortable.latest.view.html', array_intersect_key($data,
		array_flip(['filter', 'sort_field', 'sort_order', 'view_curl', 'paging', 'hosts', 'items', 'history', 'config',
			'tags', 'maintenances', 'items_rw', 'mandatory_filter_set', 'subfilter_set'
		])
	)))
	->show();

(new CScriptTag('
	view.init('.json_encode([
		'filter_options' => $data['filter_options'],
		'refresh_url' => $data['refresh_url'],
		'refresh_data' => $data['refresh_data'],
		'refresh_interval' => $data['refresh_interval'],
		'checkbox_object' => 'itemids',
		'filter_set' => $data['mandatory_filter_set'] || $data['subfilter_set']
	]).');
'))
	->setOnDocumentReady()
	->show();
