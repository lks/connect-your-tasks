Feature: Task management
  In order to list, edit, add tasks
  As a customer
  I need to be able to do these actions from the app

  Scenario: List my Kanbanize Tasks
    Given I am a Kanbanize User
    And I have 3 tasks in my personal board
    When I want to list my tasks
    Then I should see my 3 tasks

  Scenario: Consult a given Kanbanize Task
    Given I am a Kanbanize User
    When I want to consult a given task
    Then I should see the details of the given task
