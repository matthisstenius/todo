<?php namespace Todo\Domain;

use Eloquent;

class Item extends Eloquent
{
    protected $fillable = ['title', 'completed'];

    /**
     * Add new item
     *
     * @param Title $title
     * @return Item
     */
    public static function add(Title $title)
    {
        $completed = false;

        return new self(compact('title', 'completed'));
    }

    /**
     * Update title
     *
     * @param Title $title
     */
    public function updateTitle(Title $title)
    {
        $this->title = $title;
    }
}