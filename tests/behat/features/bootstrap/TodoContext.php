<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Todo\Domain\Item;

class TodoContext implements SnippetAcceptingContext
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @Given There is a todo named :arg1
     */
    public function thereIsATodoNamed($name)
    {
        $todo = Item::add($name);
    }

    /**
     * @When I want to see all my todos
     */
    public function iWantToSeeAllMyTodos()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be able to see a list containing :arg1 todos with name :arg2
     */
    public function iShouldBeAbleToSeeAListContainingTodosWithName($arg1, $arg2)
    {
        throw new PendingException();
    }
} 