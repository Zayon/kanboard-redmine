<?php

namespace Kanboard\Plugin\Redmine\Helper;

use Kanboard\Core\Base;
use Kanboard\Plugin\Redmine\RedmineTask;

class RedmineHelper extends Base
{
    /**
     * Get the complete link for an issue
     * Is used to create links to original issue in Redmine
     * 
     * @param  RedmineTask
     * @return string
     */
    public function getFullIssueLink(RedmineTask $task)
    {
        $redmineRootUrl = $this->getRedmineRootUrl();
        if ($redmineRootUrl) {
            return $redmineRootUrl . $task->getUri();
        } else {
            return '';
        }
    }
    
    /**
     * Get the base redmine url in integration config
     * 
     * @param  boolean $addSlash wheter or not you want to add the '/' at the end of url
     * @return string
     */
    public function getRedmineRootUrl($addSlash = true)
    {
        $redmineRootUrl = $this->configModel->get('redmine_url');
        if ($addSlash && $redmineRootUrl !== '' && substr($redmineRootUrl, -1) !== '/') {
            $redmineRootUrl .= '/';
        }
        return $redmineRootUrl;
    }
}