<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Todo\Domain\Item;
use Todo\Domain\Name;
use PHPUnit_Framework_TestCase as PHPUnit;

class TodoContext implements SnippetAcceptingContext
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @Given The following todo items exist
     */
    public function thereIsATodoNamed(TableNode $table)
    {
        $hash = $table->getHash();

        foreach ($hash as $item) {
            $name = new Name($item['name']);

            $todoItem = Item::add($name);
            $this->data['items'][] = $todoItem;
        }
    }

    /**
     * @When I want to see all my todos
     */
    public function iWantToSeeAllMyTodos()
    {

    }

    /**
     * @Then I should be able to see a list containing :arg1 todo items
     */
    public function iShouldBeAbleToSeeATodoWithName($count)
    {

        PHPUnit::assertCount((int)$count, $this->data['items']);
    }
} 