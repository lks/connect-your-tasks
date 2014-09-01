<?php
/**
 * Created by PhpStorm.
 * User: j.calabrese
 * Date: 29/08/14
 * Time: 11:28
 */

namespace Service;

use Entity\Board;
use GuzzleHttp\Client;


class UserService implements UserServiceInterface
{
    /**
     * @var Guzzle client
     */
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
                    'apikey' => 'e1aeonDS57KHJMz1xaQqQo97AY07gXUNHjl6XuIc'
                ]
            ]);

        $children = $res->xml()->children();
        return "" . $children->apikey;
    }

    public function searchBoard($boardName, $apiKey)
    {
        $res = $this->client->post('http://kanbanize.com/index.php/api/kanbanize/get_projects_and_boards',
            [
                'headers' =>[
                    'apikey' => 'e1aeonDS57KHJMz1xaQqQo97AY07gXUNHjl6XuIc'
                ]
            ]);
        $children = $res->xml()->children();
        $projects = $children->projects;

        foreach ($projects->item as $project) {
            foreach ($project->boards->item as $board) {
                if ($board->name == $boardName) {
                    return  new Board("" . $board->id, $board->name);
                }
            }
        }
        return null;
    }
} 