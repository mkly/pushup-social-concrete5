<?php defined('C5_EXECUTE') or die("Access Denied.") ?>

<form method="post" action="<?= $view->action('save') ?>">
    <?= $this->controller->token->output('save_settings') ?>
    <div class="row">
        <div class="col-12" style="margin-bottom: 30px;">
            <img src="<?= h($imageSrc) ?>" />
            <h2><?= t('Add an online community to your website in minutes') ?></h2>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>
                    <?= $form->checkbox('isEnabled', 1, $configuration->isEnabled()) ?>
                    <?= t('Enable Pushup') ?>
                </label>
            </div>
            <div class="form-group">
                <?= $form->label('communityId', t('Community Id')) ?>
                <?= $form->text('communityId', $configuration->getCommunityId()) ?>
            </div>
        </div>
    </div>

    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <?php echo $interface->submit(t('Save'), 'url-form', 'right', 'btn-primary'); ?>
        </div>
    </div>
</form>
