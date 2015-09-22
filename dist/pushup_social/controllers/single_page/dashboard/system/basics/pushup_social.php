<?php
namespace Concrete\Package\PushupSocial\Controller\SinglePage\Dashboard\System\Basics;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Core;
use Package;

class PushupSocial extends DashboardPageController
{

    public function view()
    {
        $this->set('configuration', Core::make('pushup_social/configuration'));
        $this->set('form', Core::make('helper/form'));
        $this->set('imageSrc', Package::getByHandle('pushup_social')->getRelativePath() . '/img/pushup.png');
    }

    public function save()
    {
        if (!$this->token->validate('save_settings')) {
            $this->error->add($this->token->getErrorMessage());
            return $this->view();
        }

        $configuration = Core::make('pushup_social/configuration');
        $configuration->updateCommunityId($this->post('communityId'));
        $configuration->updateEnabled($this->post('isEnabled') !== null);
        return $this->redirect('/dashboard/system/basics/pushup_social/updated');
    }

    public function updated()
    {
        $this->set('message', t('Settings updated'));
        return $this->view();
    }

}
