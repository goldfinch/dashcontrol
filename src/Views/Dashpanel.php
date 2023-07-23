<?php

namespace Goldfinch\Dashpanel\Views;

use SilverStripe\View\ViewableData;
use SilverStripe\Security\Permission;

class Dashpanel extends ViewableData
{
    public function forTemplate()
    {
        if (!$this->authorized())
        {
            return;
        }

        return $this->renderWith('Goldfinch/Dashpanel/Views/Dashpanel');
    }

    private function authorized()
    {
        return Permission::check('ADMIN');
    }
}
