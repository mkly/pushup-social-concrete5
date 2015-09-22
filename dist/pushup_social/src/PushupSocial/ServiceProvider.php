<?php
namespace Concrete\Package\PushupSocial\Src\PushupSocial;

use Concrete\Core\Foundation\Service\Provider as FoundationServiceProvider;
use Package;
use View;

class ServiceProvider extends FoundationServiceProvider
{

    public function register()
    {
        $this->app->bind('pushup_social/configuration', function() {
            return new Configuration\Configuration(Package::getByHandle('pushup_social')->getConfig());
        });
        $this->app->bind('pushup_social/snippet', function() {
            return new Snippet\Snippet(View::getInstance());
        });
    }
}
