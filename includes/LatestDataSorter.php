<?php

namespace Modules\SortableLatestData\Includes;

class LatestDataSorter
{
    static function sortByLastValue($history, $items, $sort_order): array
    {
        // Sort history array by last value.
        uasort($history, function ($a, $b) use ($sort_order) {
            $a = $a[0]['value'];
            $b = $b[0]['value'];

            if ($sort_order === ZBX_SORT_UP) {
                return (($a === $b) ? 0 : (($a < $b) ? -1 : 1));
            }
            else {
                return (($a === $b) ? 0 : (($a > $b) ? -1 : 1));
            }
        });

        // Get sorted items keys.
        $sorted_items_keys = array_keys($history);

        // Create sorted items.
        $sorted_items = [];
        foreach ($sorted_items_keys as $key) {
            $sorted_items[$key] = $items[$key];
        }

        // Add rest of items.
        $rest_items = array_diff_key($items, $sorted_items);
        return $sorted_items + $rest_items;
    }
}
