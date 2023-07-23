<?php

namespace Goldfinch\Dashpanel\Providers;

use SilverStripe\View\TemplateGlobalProvider;
use Goldfinch\Dashpanel\Views\Dashpanel;

class DashpanelTemplateProvider implements TemplateGlobalProvider
{
    /**
     * @return array|void
     */
    public static function get_template_global_variables(): array
    {
        return [
            'Dashpanel',
        ];
    }

    /**
     * @return string
     */
    public static function Dashpanel()
    {
        return Dashpanel::create();
    }
}
