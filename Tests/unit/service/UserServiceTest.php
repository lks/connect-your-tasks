<?php

namespace Tests\Unit\Service;

use Service\UserService;

class UserServiceTest extends \PHPUnit_Framework_TestCase
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function testGetKanbanizeApiKey()
    {
        $apiKey = $this->userService->getKanbanizeApiKey("test.j.calabrese@gmail.com", "test");
        $this->assertEquals("10kjxMkyZ2lKO5gJj9kLAJRXsF8rpEKWYdl2pfBU", $apiKey);
    }

    public function testSearchBoard_NominalCase()
    {
        $apiKey = $this->userService->getKanbanizeApiKey("test.j.calabrese@gmail.com", "test");
        $board = $this->userService->searchBoard("personal", $apiKey);
        $this->assertEquals(3, $board->getName());

    }
}