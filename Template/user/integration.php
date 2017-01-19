<h3>Redmine</h3>
<div class="panel">
    <?= $this->form->label(t('Redmine API token'), 'redmine_api_token') ?>
    <?= $this->form->text('redmine_api_token', $values) ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue">
    </div>
</div>
