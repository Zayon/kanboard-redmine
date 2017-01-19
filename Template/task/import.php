<div class="page-header">
    <h2><?= $this->text->e($project['name']) ?> &gt; <?= t('Redmine Issue') ?><?= $this->task->getNewTaskDropdown($project['id'], $values['swimlane_id'], $values['column_id']) ?></h2>
</div>

<?= $this->form->label(t('Issue ID'), 'number') ?>
<?= $this->form->text('number', $values, array(), array('required')) ?>
