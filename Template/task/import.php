<div class="page-header">
    <h2><?= $this->text->e($project['name']) ?> &gt; <?= t('Redmine Issue') ?><?= $this->task->getNewBoardTaskButton(array('id' => $values['swimlane_id']), array('id' => $values['column_id'], 'project_id' => $project['id'] )) ?></h2>
</div>

<?= $this->form->label(t('Issue ID'), 'number') ?>
<?= $this->form->text('number', $values, array(), array('required')) ?>
