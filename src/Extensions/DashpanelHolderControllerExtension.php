<?php

namespace Goldfinch\Dashpanel\Extensions;

use SilverStripe\Core\Extension;

class DashpanelHolderControllerExtension extends Extension
{
    public function updateForTemplateTemplate(&$template)
    {
        if ($template == 'DNADesign\Elemental\ElementHolder')
        {
            $template = 'Goldfinch\Dashpanel\Elemental\ElementHolder';
        }

        return $template;
    }
}
