<h2>
    <?= t('Redmine Issue') ?>

    <a href="<?= $this->text->e($this->redmine->getFullIssueLink($external_task)) ?>" target="_blank">
        <?= '#' . $external_task->getIssueNumber() ?>
    </a>
</h2>