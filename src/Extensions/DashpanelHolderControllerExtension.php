<?php

namespace Goldfinch\Dashpanel\Extensions;

use SilverStripe\Core\Extension;

class DashpanelHolderControllerExtension extends Extension
{
    public function updateForTemplateTemplate(&$template)
    {
        if (isset($_GET['CMSPreview']))
        {
            // don't do anything in CMSPreview (Split/Preview mode)
        }
        else
        {
            if ($template == 'DNADesign\Elemental\ElementHolder')
            {
                $template = 'Goldfinch\Dashpanel\Elemental\ElementHolder';
            }
        }

        return $template;
    }
}
