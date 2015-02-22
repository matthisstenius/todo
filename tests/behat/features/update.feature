Feature: Update
  In order to make changes to an existing todo item
  As a user
  I need to be able to update that todo item

  Scenario: Update todo item
    Given There is a todo item named "My todo item"
    When I update name of todo item "My todo item" to "My updated todo item"
    Then Todo item "My todo item" should have name "My updated todo item"