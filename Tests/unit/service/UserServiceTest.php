<?php

namespace Tests\Unit\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;
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
        /**
         * $content = array("apikey" => "e1aeonDS57KHJMz1xaQqQo97AY07gXUNHjl6XuIc");
        $apikeyCallMock = new Mock([
            new Response(200, new Stream((resource) $content))]);
        $clientMock = new Client();
        $clientMock->getEmitter()->attach($apikeyCallMock);
         * */

        $apiKey = $this->userService->getKanbanizeApiKey("joris.calabrese.test@gmail.com", "test");
        $this->assertEquals("e1aeonDS57KHJMz1xaQqQo97AY07gXUNHjl6XuIc", $apiKey);
    }

    public function testSearchBoard_NominalCase()
    {
        $apiKey = $this->userService->getKanbanizeApiKey("joris.calabrese.test@gmail.com", "test");
        $board = $this->userService->searchBoard("personal", $apiKey);
        $this->assertNotNull($board);
        $this->assertEquals(3, $board->getId());

    }
}