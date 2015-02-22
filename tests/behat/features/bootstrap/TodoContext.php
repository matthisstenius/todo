<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Laracasts\Behat\Context\Migrator;
use Todo\Domain\Item;
use Todo\Domain\Title;
use PHPUnit_Framework_TestCase as PHPUnit;
use Todo\Services\ItemService;

class TodoContext extends MinkContext implements SnippetAcceptingContext
{
    use Migrator;

    private $data;

    /**
     * @var ItemService
     */
    private $itemService;

    public function __construct()
    {
        $this->data = [];

        $this->itemService = app()->make('ItemService');
    }

    /**
     * @Given The following todo items exist
     */
    public function thereIsATodoNamed(TableNode $table)
    {
        $hash = $table->getHash();

        foreach ($hash as $item) {
            $this->itemService->add($item['title']);
//            $title = new Title($item['title']);
//
//            $todoItem = Item::add($title);
//            $this->data['items'][] = $todoItem;
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

    /**
     * @When I add a new todo item with title :arg1
     * @Given There is a todo item titled :arg1
     */
    public function iAddANewTodoItemWithTitle($title)
    {
        $title = new Title($title);

        $todoItem = Item::add($title);

        $this->data['item'] = $todoItem;
    }

    /**
     * @Then I should be able to see a todo item with title :arg1
     */
    public function iShouldBeAbleToSeeATodoItemWithTitle($title)
    {
        PHPUnit::assertEquals($title, $this->data['item']->title);
        PHPUnit::assertFalse($this->data['item']->completed);
    }

    /**
     * @When I update title of todo item :arg1 to :arg2
     */
    public function iUpdateNameOfTodoItemTo($arg1, $updatedTitle)
    {
        $currentItem = $this->data['item'];

        $title = new Title($updatedTitle);

        $currentItem->updateTitle($title);
    }

    /**
     * @Then Todo item :arg1 should have title :arg2
     */
    public function todoItemShouldHaveName($arg1, $updatedTitle)
    {
        $item = $this->data['item'];

        PHPUnit::assertEquals($updatedTitle, $item->title);
    }
} 