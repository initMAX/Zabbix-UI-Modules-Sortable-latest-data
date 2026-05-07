<?php

/**
 * @var CView $this
 * @var array $data
 */

$output = [
	'body' => (new CPartial('monitoring.sortable.latest.view.html', $data['results']))->getOutput(),
];

if ($data['results']['mandatory_filter_set'] && $data['results']['items'] || $data['results']['subfilter_set']) {
	$output['subfilter'] = (new CPartial('monitoring.latest.subfilter',
		array_intersect_key($data, array_flip(['subfilters', 'subfilters_expanded']))
	))->getOutput();
}

if (($messages = getMessages()) !== null) {
	$output['messages'] = $messages->toString();
}

echo json_encode($output);
