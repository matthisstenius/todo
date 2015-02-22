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

        $item = Item::add($title);

        $this->itemRepository->create($item);

        return $item;
    }

    /**
     * Update item title
     *
     * @param int $itemId
     * @param string $title
     * @return Item
     */
    public function updateTitle($itemId, $title)
    {
        $title = new Title($title);

        $item = $this->itemRepository->find($itemId);

        $item->updateTitle($title);

        $this->itemRepository->update($item);

        return $item;
    }
} 