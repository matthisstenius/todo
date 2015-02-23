<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Laracasts\Behat\Context\Migrator;
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
            $todoItem = $this->itemService->add($item['title']);
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

    /**
     * @When I add a new todo item with title :arg1
     * @Given There is a todo item titled :arg1
     */
    public function iAddANewTodoItemWithTitle($title)
    {
        $todoItem = $this->itemService->add($title);

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

        $updatedItem = $this->itemService->updateTitle($currentItem->id, $updatedTitle);

        $this->data['item'] = $updatedItem;
    }

    /**
     * @Then Todo item :arg1 should have title :arg2
     */
    public function todoItemShouldHaveName($arg1, $updatedTitle)
    {
        $item = $this->data['item'];

        PHPUnit::assertEquals($updatedTitle, $item->title);
    }

    /**
     * @When I remove that item :arg1
     */
    public function iRemoveThatItem($arg1)
    {
        $item = $this->data['item'];

        $this->itemService->remove($item->id);
    }

    /**
     * @Then Item :arg1 should not be in my list of todos
     */
    public function itemShouldNotBeInMyListOfTodos($arg1)
    {
        $items = $this->itemService->findAll();

        PHPUnit::assertNotContains($this->data['item'], $items);
    }
} 