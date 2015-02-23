Feature: Remove
  In order to get rid of unwanted items
  As a user
  I need to be able to remove items

  Scenario: Remove item from todo
    Given There is a todo item titled "My todo item"
    When I remove that item "My todo item"
    Then Item "My todo item" should not be in my list of todos