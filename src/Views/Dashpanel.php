<?php

namespace Goldfinch\Dashpanel\Views;

use SilverStripe\View\ViewableData;
use SilverStripe\Security\Permission;
use Goldfinch\Dashpanel\Services\PanelService;

class Dashpanel extends ViewableData
{
    public function forTemplate()
    {
        if (!$this->authorized())
        {
            return;
        }

        $data = PanelService::getPanelInitialData();

        return $this->customise(['jsonData' => $data ? json_encode($data) : null])->renderWith('Goldfinch/Dashpanel/Views/Dashpanel');
    }

    private function authorized()
    {
        return Permission::check('ADMIN');
    }
}
