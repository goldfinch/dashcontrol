<?php

namespace Goldfinch\Dashpanel\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\Security\Permission;
use Goldfinch\Dashpanel\Helpers\BuildHelper;

class DashpanelExtension extends Extension
{
    public function onAfterInit()
    {
        if (Permission::check('CMS_ACCESS_CMSMain'))
        {
            if (BuildHelper::isProduction())
            {
                Requirements::css('goldfinch/dashpanel:client/dist/dashpanel-style.css');
                Requirements::javascript('goldfinch/dashpanel:client/dist/dashpanel.js');
            }
        }
    }
}
