<?php

namespace Goldfinch\Dashpanel\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\Security\Permission;

class DashpanelExtension extends Extension
{
    public function onAfterInit()
    {
        if (Permission::check('CMS_ACCESS_CMSMain')) {

          $production = false;

          if ($production)
          {
              Requirements::css('/build-dashpanel/assets/app.css');
              Requirements::javascript('/build-dashpanel/assets/app.js');
          }
          else
          {
              $host = 'http://[::1]:5173';
              // $host = 'http://127.0.0.1:5173';

              Requirements::insertHeadTags('
              <script type="module" src="' . $host . '/@vite/client"></script>
              <link rel="stylesheet" href="' . $host . '/src/app.scss">
              <script type="application/javascript" src="' . $host . '/src/app.js"></script>
              ');
          }
        }
    }
}
