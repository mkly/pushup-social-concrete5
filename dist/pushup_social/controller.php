<?php
namespace Concrete\Package\PushupSocial;

use View;
use Core;
use Page;
use Asset;
use Events;
use Package;
use AssetList;
use SinglePage;
use Concrete\Core\Foundation\Service\ProviderList;

class Controller extends Package
{
    protected $pkgHandle = 'pushup_social';
    protected $appVersionRequired = '5.7.5';
    protected $pkgVersion = '1.0.0';

    public function getPackageDescription()
    {
        return t('Add Pushup Social to your Site');
    }

    public function getPackageName()
    {
        return t('Pushup Social');
    }

    public function install()
    {
        $pkg = parent::install();
        $config = $pkg->getConfig();
        foreach (array(
            'community_id' => '',
            'enabled' => false
        ) as $key => $val) {
            $config->save($key, $val);
        }

        SinglePage::add('/dashboard/system/basics/pushup_social', $pkg);
    }

    public function on_start()
    {
        $this->registerServiceProviders(new ProviderList(Core::make('app')));

        $config = Core::make('pushup_social/configuration');
        if (!$config->isEnabled()) {
            return;
        }

        Events::addListener('on_start', function() {
            $page = Page::getCurrentPage();
            if (!$page->isSystemPage()) {
                $this->registerJavascript();
            }
        });
    }

    protected function registerJavascript()
    {
        $snippet = Core::make('pushup_social/snippet');
        $configuration = Core::make('pushup_social/configuration');
        $snippet->register($configuration->getCommunityId());
    }

    /**
     * @param ProviderList $pl
     */
    protected function registerServiceProviders(ProviderList $pl)
    {
        $pl->registerProvider('\Concrete\Package\PushupSocial\Src\PushupSocial\ServiceProvider');
    }

}
