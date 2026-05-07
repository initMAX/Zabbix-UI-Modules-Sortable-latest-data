<?php
namespace Modules\SortableLatestData;

use Zabbix\Core\CModule;
use APP;
use CMenuItem;

class Module extends CModule
{
    public function init(): void
    {
        $menuItem = new CMenuItem(_('Sortable Latest data'));
        $menuItem->setAction('sortable.latest.view');

        APP::Component()
            ->get('menu.main')
            ->find(_('Monitoring'))
            ->getSubMenu()
            ->insertAfter(_('Latest data'), $menuItem);
    }
}
