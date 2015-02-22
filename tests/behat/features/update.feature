Feature: Update
  In order to make changes to an existing todo item
  As a user
  I need to be able to update that todo item

  Scenario: Update todo item
    Given There is a todo item titled "My todo item"
    When I update title of todo item "My todo item" to "My updated todo item"
    Then Todo item "My todo item" should have title "My updated todo item"