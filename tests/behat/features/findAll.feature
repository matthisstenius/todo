@user @ip
Feature: See all todos
  In order to se all my todo items
  As a user
  I need to be able to get a list of all my todos

  Scenario: Get list of all todos
    Given There is a todo named <name>
    When I want to see all my todos
    Then I should be able to see a list containing "3" todos with name <name>

    Examples:
      | name |
      | 'My first todo' |
      | 'My second todo' |
      | 'My third todo' |