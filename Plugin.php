<?php

namespace Kanboard\Plugin\Redmine;

use Kanboard\Core\Translator;
use Kanboard\Plugin\Redmine\RedmineTaskProvider;
use Kanboard\Plugin\Redmine\Action\RedmineTaskUpdateStatusColumn;
use Kanboard\Plugin\Redmine\Helper\RedmineHelper;
use Kanboard\Core\Plugin\Base;

require_once __DIR__ . '/vendor/autoload.php';

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
        $this->helper->register('redmine', '\Kanboard\Plugin\Redmine\Helper\RedmineHelper');

        $this->container['RedmineClient'] = $this->container->factory(function ($container) {
            $apiToken = $container['userMetadataCacheDecorator']->get('redmine_api_token', '');
            $redmineUrl = $container['helper']->redmine->getRedmineRootUrl();
            return new \Redmine\Client($redmineUrl, $apiToken);
        });

        $this->template->hook->attach('template:config:integrations', 'Redmine:config/integration');
        $this->template->hook->attach('template:user:integrations', 'Redmine:user/integration');
        $this->externalTaskManager->register(new RedmineTaskProvider($this->container));
        $this->actionManager->register(new RedmineTaskUpdateStatusColumn($this->container));
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
        return '1.0.3';
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
