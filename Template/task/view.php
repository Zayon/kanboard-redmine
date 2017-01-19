<h2>
    <?= t('Redmine Issue') ?>
    <a href="<?= $this->text->e(substr($task['external_uri'], 0, strpos($task['external_uri'], '.json'))) ?>" target="_blank">
        <?= '#' . $external_task->getIssueNumber() ?>
    </a>
</h2>