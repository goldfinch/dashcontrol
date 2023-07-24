<?php

namespace Goldfinch\Dashpanel\Views;

use SilverStripe\ORM\DB;
use Composer\InstalledVersions;
use SilverStripe\Core\Environment;
use SilverStripe\Security\Security;
use SilverStripe\View\ViewableData;
use SilverStripe\Control\Controller;
use SilverStripe\Security\Permission;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Core\Manifest\VersionProvider;
use SilverStripe\Security\InheritedPermissions;
use SilverStripe\ORM\Queries\SQLSelect;

class Dashpanel extends ViewableData
{
    public function forTemplate()
    {
        if (!$this->authorized())
        {
            return;
        }

        if (Controller::has_curr())
        {
            $object = Controller::curr();

            $cfg = SiteConfig::current_site_config();

            $user = Security::getCurrentUser();

            // Session info
            // $member->LoginSessions()->first();
            // $currentSessions = $member->LoginSessions()->filterAny([
            //     'Persistent' => 1,
            //     'LastAccessed:GreaterThan' => date('Y-m-d H:i:s', $maxAge)
            // ]);
            // getSchemaDataDefaults

            // MFA
            // $user->getDefaultRegisteredMethodName();
            // $user->getDefaultRegisteredMethod();

            // check for inherit
            if ($object->CanViewType === InheritedPermissions::INHERIT)
            {
                if ($object->ParentID)
                {
                    $CanViewType = $object->Parent()->CanViewType;
                }
                else
                {
                    $CanViewType = $object->getSiteConfig()->CanViewType;
                }
            }
            else
            {
                $CanViewType = $object->CanViewType;
            }

            $versionProvider = new VersionProvider;

            $installedPackages = [];

            foreach(InstalledVersions::getInstalledPackages() as $package)
            {
                $installedPackages[] = [
                  'name' => $package,
                  'version' => InstalledVersions::getVersion($package)
                ];
            }
            dd(__DIR__);
            $f = '../';
            $io = popen ( '/usr/bin/du -sh ' . $f, 'r' );
            $size = fgets ( $io, 4096);
            $size = substr ( $size, 0, strpos ( $size, "\t" ) );
            pclose ( $io );

            dd($size);

            $data = [

              'installedPackages' => $installedPackages,

              'info' => [
                'server_ip' => $_SERVER['SERVER_ADDR'],
                'server_email' => $_SERVER['SERVER_ADMIN'],
                'cdn' => isset($_SERVER['HTTP_CDN_LOOP']) ? $_SERVER['HTTP_CDN_LOOP'] : null, // cloudflare
                'server_ipcountry' => $_SERVER['HTTP_CF_IPCOUNTRY'],

                'php' => phpversion(),
                'allocated_php_memory' => (memory_get_usage() * 1000000), // mb
                'mysql' => mysqli_get_client_info(), // if used?
                'ss' => [
                  'version' => $versionProvider->getVersion(),
                  'modules' => $versionProvider->getModules(),
                ]
              ],

              'env' => Environment::getEnv('SS_ENVIRONMENT_TYPE'),
              'siteAccess' => $cfg->CanViewType,

              'page' => [
                'icon' => $object->getIconClass(),
                'classNamespace' => $object->ClassName,
                'className' => last(explode('\\', $object->ClassName)),
                'canViewType' => $CanViewType,
                'createdAt' => $object->Created,
                'updatedAt' => $object->LastEdited,
                'isOnDraft' => $object->isOnDraft(),
                'isPublished' => $object->isPublished(),
                'stagesDiffer' => $object->stagesDiffer(),
                'canPublish' => $object->canPublish(),
                'canUnpublish' => $object->canUnpublish(),
                'canEdit' => $object->canEdit(),
              ],

              'user' => [
                'email' => $user->email,
                'firstname' => $user->FirstName,
                'surname' => $user->Surname,
                'groups' => $user->Groups()->map('ID')->toArray(),
              ],
            ];
        }

        return $this->customise(['jsonData' => json_encode($data)])->renderWith('Goldfinch/Dashpanel/Views/Dashpanel');
    }

    private function authorized()
    {
        return Permission::check('ADMIN');
    }
}
