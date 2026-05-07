<?php declare(strict_types = 0);

namespace Modules\SortableLatestData\Actions;

use CControllerResponseData;
use CHousekeepingHelper;
use CPagerHelper;
use CTabFilterProfile;
use CUrl;
use Modules\SortableLatestData\Includes\LatestDataSorter;

/**
 * Controller for the "Sortable Latest data" asynchronous refresh page.
 */
class CControllerSortableLatestViewRefresh extends CControllerSortableLatestView {

	protected function doAction(): void {
		if ($this->getInput('filter_counters', 0) != 0) {
			$profile = (new CTabFilterProfile(static::FILTER_IDX, static::FILTER_FIELDS_DEFAULT))->read();
			$filters = $this->hasInput('counter_index')
				? [$profile->getTabFilter($this->getInput('counter_index'))]
				: $profile->getTabsWithDefaults();

			$filter_counters = [];

			foreach ($filters as $index => $tabfilter) {
				$tabfilter = self::sanitizeFilter($tabfilter);

				if (!$tabfilter['filter_show_counter']
						|| (!self::isMandatoryFilterFieldSet($tabfilter) && !self::isSubfilterSet($tabfilter))) {
					$filter_counters[$index] = 0;

					continue;
				}

				$prepared_data = $this->prepareData($tabfilter, $tabfilter['sort'], $tabfilter['sortorder']);
				$subfilters_fields = self::getSubfilterFields($tabfilter);
				self::getSubfilters($subfilters_fields, $prepared_data);
				$filter_counters[$index] = count(self::applySubfilters($prepared_data['items']));
			}

			$this->setResponse(
				(new CControllerResponseData([
					'main_block' => json_encode(['filter_counters' => $filter_counters])
				]))->disableView()
			);
		}
		else {
			$filter = static::FILTER_FIELDS_DEFAULT;
			$this->getInputs($filter, array_keys($filter));
			$filter = $this->cleanInput($filter);
			$filter = self::sanitizeFilter($filter);
			$mandatory_filter_set = self::isMandatoryFilterFieldSet($filter);
			$subfilter_set = self::isSubfilterSet($filter);
			$prepared_data = [
				'hosts' => [],
				'items' => [],
				'items_rw' => []
			];

			if ($mandatory_filter_set || $subfilter_set) {
				$prepared_data = $this->prepareData($filter, $filter['sort'], $filter['sortorder']);
			}

			// Prepare subfilter data.
			$subfilters_fields = self::getSubfilterFields($filter);
			$subfilters = self::getSubfilters($subfilters_fields, $prepared_data);
			$prepared_data['items'] = self::applySubfilters($prepared_data['items']);

			if ($filter['state'] != -1) {
				$subfilters['state'] = [];
			}

			$page = $this->getInput('page', 1);
			$view_url = (new CUrl('zabbix.php'))->setArgument('action', 'sortable.latest.view');
			$paging_arguments = array_filter(array_intersect_key($filter, self::FILTER_FIELDS_DEFAULT));
			array_map([$view_url, 'setArgument'], array_keys($paging_arguments), $paging_arguments);
			$paging = CPagerHelper::paginate($page, $prepared_data['items'], ZBX_SORT_UP, $view_url);

			$this->extendData($prepared_data);

			if ($filter['sort'] === 'lastvalue') {
				$prepared_data['items'] = LatestDataSorter::sortByLastValue(
					$prepared_data['history'], 
					$prepared_data['items'],
					$filter['sortorder'],
				);
			}

			// make response
			$data = [
				'results' => [
					'filter' => $filter,
					'mandatory_filter_set' => $mandatory_filter_set,
					'subfilter_set' => $subfilter_set,
					'view_curl' => $view_url,
					'sort_field' => $filter['sort'],
					'sort_order' => $filter['sortorder'],
					'paging' => $paging,
					'config' => [
						'hk_trends' => CHousekeepingHelper::get(CHousekeepingHelper::HK_TRENDS),
						'hk_trends_global' => CHousekeepingHelper::get(CHousekeepingHelper::HK_TRENDS_GLOBAL),
						'hk_history' => CHousekeepingHelper::get(CHousekeepingHelper::HK_HISTORY),
						'hk_history_global' => CHousekeepingHelper::get(CHousekeepingHelper::HK_HISTORY_GLOBAL)
					],
					'tags' => makeTags($prepared_data['items'], true, 'itemid', (int) $filter['show_tags'],
						$filter['tags'], array_key_exists('tags', $subfilters_fields) ? $subfilters_fields['tags'] : [],
						(int) $filter['tag_name_format'], $filter['tag_priority']
					)
				] + $prepared_data,
				'subfilters' => $subfilters,
				'subfilters_expanded' => array_flip($this->getInput('subfilters_expanded', []))
			];

			$response = new CControllerResponseData($data);
			$this->setResponse($response);
		}
	}
}
