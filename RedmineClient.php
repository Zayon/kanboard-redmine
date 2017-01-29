<?php

namespace Kanboard\Plugin\Redmine;

require_once __DIR__ . '/vendor/autoload.php';

class RedmineClient {

    /**
     * Client
     * 
     * @var \Redmine\Client
     */
    private $client;

    /**
     * RedmineClient constructor
     * 
     * @param string $redmineUrl root url of redmine
     * @param string $apikey     redmine apiKey of current user
     */
    public function __construct($redmineUrl ,$apikey)
    {
        $this->setClient(new \Redmine\Client($redmineUrl, $apikey));
    }

    /**
     * Client getter
     * @return Redmine\Client
     */
    private function getClient()
    {
        return $this->client;
    }

    /**
     * Client setter
     * @param Redmine\Client $client
     */
    private function setClient(\Redmine\Client $client)
    {
        $this->client = $client;
    }

    /**
     * Retrive data from redmine
     * 
     * @param  string $path Path to the desired resource
     * @return array        Data returned by redmine
     */
    public function get($path)
    {
        return $this->getClient()->get($path . '.json');
    }

    /**
     * Push data to redmine
     * 
     * @param  string $path Path to push data to
     * @param  string $data Json-formatted data to push
     * @return mixed        Redmine return (may be boolean, XML or string)
     */
    public function put($path, $data)
    {
        return $this->getClient()->put($path . '.json', $data);
    }

}