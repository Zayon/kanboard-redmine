<?php

namespace Kanboard\Plugin\Redmine;

use Kanboard\Core\ExternalTask\ExternalTaskInterface;

/**
 * Redmine Task
 *
 * @package Kanboard\Plugin\Redmine
 * @author  Pablo Godinez
 */
class RedmineTask implements ExternalTaskInterface
{

    /**
     * Data of issue
     * 
     * @var array
     */
    private $issue;

    /**
     * Uri, format : "/issue/XXXXX" where XXXXX is issue number
     * Used to provide an url for humans
     * 
     * @var string
     */
    private $uri;

    /**
     * @param string   $jsonUri   Uri of issue
     * @param array    $issue     Issue array returned from Redmine
     */
    public function __construct($uri, array $issue)
    {
        $this->setUri($uri);
        $this->setIssue($issue);
    }

    /**
     * Get Issue
     *
     * @return stdClass
     */
    public function getIssue()
    {
        return (object) $this->issue;
    }

    /**
     * Set Issue
     * 
     * @param array $issue
     */
    private function setIssue(array $issue)
    {
        $this->issue = $issue;
    }

    /**
     * Return Uniform Resource Identifier for the task
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set Uri
     * 
     * @param string $uri
     */
    private function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * Get issue number
     *
     * @return int issue number
     */
    public function getIssueNumber()
    {
        return $this->issue['id'];
    }

    /**
     * Return a dict to populate the task form
     *
     * @return array
     */
    public function getFormValues()
    {
        return array(
            'title' => $this->issue['subject'],
            'reference' => $this->issue['id'],
            'date_started' => $this->issue['start_date'],
            'description' => $this->issue['description']
        );
    }
}
