<?php

namespace Kanboard\Plugin\Redmine;

use Kanboard\Core\Base;
use Kanboard\Core\ExternalTask\ExternalTaskInterface;
use Kanboard\Core\ExternalTask\ExternalTaskProviderInterface;
use Kanboard\Core\ExternalTask\NotFoundException;

/**
 * Redmine Task Provider
 *
 * @package  redmine
 * @author   Pablo Godinez
 */
class RedmineTaskProvider extends Base implements ExternalTaskProviderInterface
{
    /**
     * Get provider name (visible in the user interface)
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'Redmine';
    }

    /**
     * Retrieve task from external system or cache
     *
     * @access public
     * @throws \Kanboard\Core\ExternalTask\ExternalTaskException
     * @param  string $uri
     * @return ExternalTaskInterface
     */
    public function fetch($uri, $projectID)
    {
        $issue = $this->RedmineClient->get($uri);

        if (empty($issue)) {
            throw new NotFoundException(t('Redmine Issue not found.'));
        }

        return new RedmineTask($uri, $issue['issue']);
    }

    /**
     * Save external task to another system
     *
     * @throws \Kanboard\Core\ExternalTask\ExternalTaskException
     * @param  string $uri
     * @param  array  $formValues
     * @param  array  $formErrors
     * @return bool
     */
    public function save($uri, array $formValues, array &$formErrors)
    {
        return true;
    }

    /**
     * Get task import template name
     *
     * @return string
     */
    public function getImportFormTemplate()
    {
        return 'Redmine:task/import';
    }

    /**
     * Get creation form template
     *
     * @return string
     */
    public function getCreationFormTemplate()
    {
        return 'Redmine:task/creation';
    }

    /**
     * Get modification form template
     *
     * @return string
     */
    public function getModificationFormTemplate()
    {
        return 'Redmine:task/modification';
    }

    /**
     * Get task view template name
     *
     * @return string
     */
    public function getViewTemplate()
    {
        return 'Redmine:task/view';
    }

    /**
     * Build external task URI based on import form values
     *
     * @param  array $formValues
     * @return string
     */
    public function buildTaskUri(array $formValues)
    {
        return 'issues/' . intval(str_replace('#', '', $formValues['number']));
    }
    
    /**
     * Set menu icon
     */
    public function getIcon()
    {
      return '<i class="fa fa-bug fa-fw"></i>';
    }

    /**
     * Set menu title
     */
    public function getMenuAddLabel()
    {
      return t('Import Redmine task');
    }
}
