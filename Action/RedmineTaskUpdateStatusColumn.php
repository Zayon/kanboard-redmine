<?php

namespace Kanboard\Plugin\Redmine\Action;

use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;


/**
 * Update task status in Redmine
 *
 * @package action
 * @author  Pablo Godinez
 */
class RedmineTaskUpdateStatusColumn extends Base
{
    /**
     * Get automatic action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Update redmine status when the task is moved to a specific column');
    }

    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_MOVE_COLUMN,
        );
    }

    /**
     * Get the required parameter for the action (defined by the user)
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
            'column_id' => t('Column'),
            'status_id' => t('Status id')
        );
    }

    /**
     * Get the required parameter for the event
     *
     * @access public
     * @return string[]
     */
    public function getEventRequiredParameters()
    {
        return array(
            'task' => array(
                'external_provider',
                'external_uri',
                'column_id'
            )
        );
    }

    /**
     * Execute the action
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
        $updateStatusJson = $this->getUpdateStatusJson($this->getParam('status_id'));
        return $this->RedmineClient->put($data['task']['external_uri'], $updateStatusJson);
    }

    /**
     * Returns json to send in order to update issue's status to the status defined by the 
     * automatic task 
     *
     * @access private
     * @param  int   $status_id   Id of status in Redmine
     * @return string             json
     */
    private function getUpdateStatusJson($status_id)
    {
        return json_encode(array(
            'issue' => array(
                'status_id' => $status_id
            )
        ));
    }

    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return $data['task']['column_id'] == $this->getParam('column_id') && 
            $data['task']['external_provider'] == 'Redmine';
    }
}
