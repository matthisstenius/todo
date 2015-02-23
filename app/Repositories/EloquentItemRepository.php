<?php namespace Todo\Repositories;

use Todo\Domain\Item;

class EloquentItemRepository implements ItemRepository
{
    /**
     * Create new item
     *
     * @param Item $item
     * @return Item
     */
    public function create(Item $item)
    {
        return $item->save();
    }

    /**
     * Update item
     *
     * @param Item $item
     * @return Item
     */
    public function update(Item $item)
    {
        return $item->update();
    }

    /**
     * Find item by ID
     *
     * @param int $id
     * @return Item
     */
    public function find($id)
    {
        return Item::find($id);
    }

    /**
     * Find all items
     *
     * @return Collection
     */
    public function findAll()
    {
        return Item::all();
    }

    /**
     * Destroy item
     *
     * @param Item $item
     */
    public function destroy(Item $item)
    {
        $item->delete();
    }
}