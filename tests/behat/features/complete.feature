Feature: Complete
  In order to get things done
  As a user
  I need to be able to complete item in my todo list

  Scenario: Complete item
    Given There is a todo item titled "My test item"
    When I complete item "My test item"
    Then Item "My test item" should be marked as completed