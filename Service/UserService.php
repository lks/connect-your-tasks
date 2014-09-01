<?php
/**
 * Created by PhpStorm.
 * User: j.calabrese
 * Date: 29/08/14
 * Time: 11:28
 */

namespace Service;

use GuzzleHttp\Client;


class UserService implements UserServiceInterface
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getKanbanizeApiKey($login, $password)
    {

        $res = $this->client->post('http://kanbanize.com/index.php/api/kanbanize/login/email/'. urlencode($login) . '/pass/' . $password,
            [
                'headers' =>[
                    'apikey' => 'F9nqTym0jeagU2TyuXqkcrGuESlemiFTFiiUmsMB'
                ]
            ]);

        $children = $res->xml()->children();
        return "" . $children->apikey;
    }

    public function searchBoard($boardName, $apiKey)
    {
        return null;
    }
} 