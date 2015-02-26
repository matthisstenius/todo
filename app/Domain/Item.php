<?php namespace Todo\Domain;

use Eloquent;

class Item extends Eloquent
{
    protected $fillable = ['title', 'completed'];

    protected $primaryKey = '_id';

    protected $casts = [
        'completed' => 'boolean'
    ];

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

    /**
     * Mark item as completed
     * @param bool $completed
     */
    public function complete($completed)
    {
        $this->completed = $completed;
    }

    /**
     * Check if item is completed
     *
     * @return bool
     */
    public function isCompleted()
    {
        return (bool) $this->completed;
    }
}