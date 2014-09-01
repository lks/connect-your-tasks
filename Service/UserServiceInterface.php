<?php
/**
 * Created by PhpStorm.
 * User: j.calabrese
 * Date: 29/08/14
 * Time: 11:29
 */

namespace Service;


use Entity\Board;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

interface UserServiceInterface {

    /**
     * Get the Kanbanize User Information from the login and the password given.
     * @param $login
     * @param $password
     * @return ApiKey String
     * @throws NotFoundResourceException
     */
    public function getKanbanizeApiKey($login, $password);

    /**
     * Search in the list of boards associated to the user a board with the given name
     * @param $boardName
     * @param $apiKey
     * @return Board Object
     */
    public function searchBoard($boardName, $apiKey);
} 