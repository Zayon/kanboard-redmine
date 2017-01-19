<?php

namespace Kanboard\Plugin\Redmine;

use Kanboard\Core\Translator;
use Kanboard\Plugin\Redmine\RedmineTaskProvider;
use Kanboard\Core\Plugin\Base;

/**
 * Redmine Plugin
 *
 * @package  redmine
 * @author   Pablo Godinez
 */
class Plugin extends Base
{
    public function initialize()
    {
        $this->externalTaskManager->register(new RedmineTaskProvider($this->container));
        $this->template->hook->attach('template:config:integrations', 'Redmine:config/integration');
        $this->template->hook->attach('template:user:integrations', 'Redmine:user/integration');
    }

    public function getPluginName()
    {
        return 'Redmine Import Tool';
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginDescription()
    {
        return t('Import Redmine Issues in Kanboard');
    }

    public function getPluginAuthor()
    {
        return 'Pablo Godinez';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/Zayon/kanboard-redmine';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.37';
    }
}
