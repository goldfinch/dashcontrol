<?php

namespace Goldfinch\Dashpanel\Extensions;

use Composer\InstalledVersions;
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
            if (isset($_GET['CMSPreview']))
            {
                // do not load dashpanel in CMSPreview (Split/Preview mode)
            }
            else
            {
                if (BuildHelper::isProduction())
                {
                    Requirements::css('goldfinch/dashpanel:client/dist/dashpanel-style.css');
                    Requirements::javascript('goldfinch/dashpanel:client/dist/dashpanel.js');
                }

                // extra assets
                Requirements::css('goldfinch/extra-assets:client/dist/font-opensans.css');

                // ? could be uneccessary here if using .svg instead of .svg within this package
                if (!InstalledVersions::isInstalled('goldfinch/enchantment'))
                {
                    Requirements::css('goldfinch/extra-assets:client/dist/bootstrap-icons.css');
                }
            }
        }
    }
}
