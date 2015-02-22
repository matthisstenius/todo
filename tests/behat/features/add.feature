Feature: Add
  In order to see more todo items
  As a user
  I need to be able to add a new todo item

  Scenario: Add todo item
    When I add a new todo item with title "My todo item"
    Then I should be able to see a todo item with title "My todo item"