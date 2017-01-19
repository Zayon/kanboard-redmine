<h3>Redmine</h3>
<div class="panel">
    <?= $this->form->label(t('Redmine URL'), 'redmine_url') ?>
    <?= $this->form->text('redmine_url', $values) ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue">
    </div>
</div>
