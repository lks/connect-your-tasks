<?php
/**
 * Created by PhpStorm.
 * User: joriscalabrese
 * Date: 31/08/2014
 * Time: 09:21
 */

namespace Service;


interface TaskServiceInterface {

    /**
     * Add a task on a specific board with a given name
     * @param $apiKey
     * @param $taskName
     * @param $boardName
     * @return mixed
     */
    public function addTasks($apiKey, $taskName, $boardName);
} 