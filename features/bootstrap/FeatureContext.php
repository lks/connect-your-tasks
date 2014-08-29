<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use GuzzleHttp\Client;

/**
 * Behat context class.
 */
class FeatureContext implements SnippetAcceptingContext
{
    protected $client;
    protected $kanbanizeApiKey;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @Given I am a Kanbanize User
     */
    public function iAmAKanbanizeUser()
    {
        $this->kanbanizeApiKey = $this->userService->getKanbanizeApiKey('kanbanizeUser1', 'kanbanizePass1');

        $res = $this->client->get('http://kanbanize.com/index.php/api/kanbanize/get_projects_and_boards/',
            [
                'headers' =>[
                    'apikey' => 'saL5YcK6vQgklKJr5fBLiHH6AjgG4EbyRHly1tbM'
                ]
            ]);
    }

    /**
     * @And I have (\d+) tasks in my personal board
     */
    public function iHaveTasksInMyPersonalBoard($nbTasks)
    {
        for ($i = 0; $i < $nbTasks; $i++){
            $this->kanbanizeTaskService->addKanbanizeTasks($this->kanbanizeApiKey, $taskName, $boardName);
        }
        $tasks = $this->kanbanizeTaskService->listTasks($this->kanbanizeApiKey, $boardName);

        if(count($tasks) != $nbTasks){
            throw new Exception();
        }
    }


    /**
     * @When I want to list my tasks
     */
    public function iWantToListMyTasks()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see all my tasks from Kanbanize Tool
     */
    public function iShouldSeeAllMyTasksFromKanbanizeTool()
    {
        throw new PendingException();
    }

    /**
     * @When I want to consult a given task
     */
    public function iWantToConsultAGivenTask()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the details of the given task
     */
    public function iShouldSeeTheDetailsOfTheGivenTask()
    {
        throw new PendingException();
    }

    /**
     * @Given I am
     */
    public function iAm()
    {
        throw new PendingException();
    }
}
