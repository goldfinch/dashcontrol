<?php

namespace Goldfinch\Dashpanel\Helpers;

use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;

class BuildHelper
{
    public static function isProduction()
    {
        if (
          Director::isDev() &&
          is_dir(Director::baseFolder() . '/vendor/goldfinch/dashpanel/client/src') &&
          is_dir(Director::baseFolder() . '/vendor/goldfinch/dashpanel/client/public')
        )
        {
            $port = 5173;
            $host = 'https://' . Director::host() . ':' . $port;
            // $host = 'https://[::1]:' . $port;
            // $host = 'https://127.0.0.1:' . $port;

            Requirements::insertHeadTags('
            <script type="module" src="' . $host . '/@vite/client"></script>
            <link rel="stylesheet" href="' . $host . '/src/dashpanel.scss">
            <script type="module" src="' . $host . '/src/dashpanel2.js"></script>
            ');

            return false;
        }
        else
        {
            return true;
        }
    }
}
