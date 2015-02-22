<?php namespace Todo\Services;

use Todo\Domain\Item;
use Todo\Domain\Title;
use Todo\Repositories\ItemRepository;

class ItemService
{
    /**
     * @var ItemRepository
     */
    private $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * Add new item
     *
     * @param string $title
     * @return Item
     */
    public function add($title)
    {
        $title = new Title($title);

        $item = new Item($title);

        $this->itemRepository->create($item);

        return $item;
    }
} 