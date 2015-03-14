<?php namespace Todo\Services;

use Illuminate\Contracts\Mail\MailQueue;
use Illuminate\Support\Facades\Log;
use Todo\Domain\Item;
use Todo\Domain\Title;
use Todo\Repositories\ItemRepository;

class ItemService
{
    /**
     * @var ItemRepository
     */
    private $itemRepository;
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(ItemRepository $itemRepository, MailQueue $mailer)
    {
        $this->itemRepository = $itemRepository;
        $this->mailer = $mailer;
    }

    /**
     * Get all items
     *
     * @return Collection
     */
    public function findAll()
    {
        return $this->itemRepository->findAll();
    }

    /**
     * Get item by id
     *
     * @param int $id
     * @return Item
     */
    public function find($id)
    {
        return $this->itemRepository->find($id);
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
     * Update item
     *
     * @param int $itemId
     * @param string $title
     * @param bool $completed
     * @return Item
     */
    public function update($itemId, $title, $completed = false)
    {
        $title = new Title($title);

        $item = $this->itemRepository->find($itemId);

        $item->updateTitle($title);

        if ($completed) {
            $item->complete();
        } else {
            $item->unComplete();
        }

        $this->itemRepository->update($item);

        return $item;
    }

    /**
     * Remove item
     *
     * @param int $id
     */
    public function remove($id)
    {
        $item = $this->find($id);

        $this->itemRepository->destroy($item);
    }

    /**
     * Mail driver is in debug mode so check the log file in storage/logs for email output
     * Will not actually queue the emails due to this being a local setup
     *
     * @param string $email
     */
    public function sendNotificationEmail($email)
    {
        $items = $this->findAll();

        $this->mailer->queue('emails.items', ['items' => $items], function($message) use ($email) {
           $message->to($email)->subject('Here is a list of your todo items!');
        });
    }
} 