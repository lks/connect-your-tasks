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
    protected $userService;
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
        $this->userService = new \Service\UserService();
    }

    /**
     * @Given I am a Kanbanize User
     */
    public function iAmAKanbanizeUser()
    {
        $this->kanbanizeApiKey = $this->userService->getKanbanizeApiKey('joris.calabrese.test@gmail.com', 'test');
    }

    /**
     * @Given I have :nbTasks tasks in my personal board
     */
    public function iHaveTasksInMyPersonalBoard($nbTasks)
    {
        //tasks list

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
     * @Then I should see my :arg1 tasks
     */
    public function iShouldSeeMyTasks($arg1)
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
