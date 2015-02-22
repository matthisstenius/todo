<?php namespace Todo\Repositories;
use Todo\Domain\Item;

interface ItemRepository
{
    /**
     * Create new item
     *
     * @param Item $item
     * @return Item
     */
    public function create(Item $item);

    /**
     * Update item
     *
     * @param Item $item
     * @return Item
     */
    public function update(Item $item);

    /**
     * Find item by ID
     *
     * @param int $id
     * @return Item
     */
    public function find($id);

    /**
     * Find all items
     *
     * @return Collection
     */
    public function findAll();

    /**
     * Destroy item
     *
     * @param Item $item
     */
    public function destroy(Item $item);
} 