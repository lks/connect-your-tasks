<?php
/**
 * Created by PhpStorm.
 * User: j.calabrese
 * Date: 29/08/14
 * Time: 11:29
 */

namespace Service;


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
} 