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
     * @var array
     */
    private $issue;

    /**
     * @var string
     */
    private $uri;

    public function __construct($uri, array $issue)
    {
        $this->uri = $uri;
        $this->issue = $issue;
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
     * Get issue number
     *
     * @return int issue number
     */
    public function getIssueNumber()
    {
        return $this->issue['id'];
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
