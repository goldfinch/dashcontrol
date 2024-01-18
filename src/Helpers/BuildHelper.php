<?php

namespace Goldfinch\Dashpanel\Helpers;

use SilverStripe\Core\Environment;
use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;

class BuildHelper
{
    public static function isProduction()
    {
        if (
            Environment::getEnv('SS_DASHPANEL') &&
            Director::isDev() &&
            Environment::getEnv('GOLDFINCH_DASHPANEL_DEV')
        ) {
            $port = 5173;
            $host = 'https://' . Director::host() . ':' . $port;

            Requirements::insertHeadTags(
                '
            <script type="module" src="' .
                    $host .
                    '/@vite/client"></script>
            <link rel="stylesheet" href="' .
                    $host .
                    '/src/dashpanel-style.scss">
            <script type="module" src="' .
                    $host .
                    '/src/dashpanel.js"></script>
            ',
            );

            return false;
        } else {
            return true;
        }
    }
}
