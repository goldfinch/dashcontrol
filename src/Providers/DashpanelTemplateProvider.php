<?php

namespace Goldfinch\Dashpanel\Providers;

use Goldfinch\Dashpanel\Views\Dashpanel;
use SilverStripe\View\TemplateGlobalProvider;

class DashpanelTemplateProvider implements TemplateGlobalProvider
{
    /**
     * @return array|void
     */
    public static function get_template_global_variables(): array
    {
        return ['Dashpanel'];
    }

    /**
     * @return string
     */
    public static function Dashpanel()
    {
        return Dashpanel::create();
    }
}
