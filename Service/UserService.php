<?php
/**
 * Created by PhpStorm.
 * User: j.calabrese
 * Date: 29/08/14
 * Time: 11:28
 */

namespace Service;

use GuzzleHttp\Client;


class UserService {

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
                    'apikey' => 'saL5YcK6vQgklKJr5fBLiHH6AjgG4EbyRHly1tbM'
                ]
            ]);

        $children = $res->xml()->children();
        var_dump("" . $children->apikey);
        return "" . $children->apikey;
    }
} 