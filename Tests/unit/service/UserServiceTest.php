<?php

namespace Tests\Unit\Service;

use Service\UserService;

/**
 * Created by PhpStorm.
 * User: j.calabrese
 * Date: 29/08/14
 * Time: 11:33
 */

class UserServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetKanbanizeApiKey()
    {
        $userService = new UserService();
        $apiKey = $userService->getKanbanizeApiKey("joris.calabrese@gmail.com", "3yNGXq2Y");
        $this->assertEquals("F9nqTym0jeagU2TyuXqkcrGuESlemiFTFiiUmsMB", $apiKey);
    }
}