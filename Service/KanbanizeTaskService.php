<?php
/**
 * Created by PhpStorm.
 * User: joriscalabrese
 * Date: 31/08/2014
 * Time: 09:21
 */

namespace Service;


class KanbanizeTaskService implements TaskServiceInterface{

    public function addTasks($apiKey, $taskName, $boardName)
    {
        return null;
    }

    public function listTasks($apiKey, $boardId)
    {
        $apiKey = $this->userService->getKanbanizeApiKey("joris.calabrese.test@gmail.com", "test");
        $board = $this->userService->searchBoard("personal", $apiKey);

    }
} 