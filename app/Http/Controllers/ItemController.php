<?php namespace Todo\Http\Controllers;

use Todo\Http\Requests;
use Todo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Todo\Services\ItemService;

class ItemController extends Controller {

    /**
     * @var ItemService
     */
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = $this->itemService->findAll();

        return response()->json($items);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
        $this->validate($request, [
            'todo.title' => 'required'
        ]);

        $item = $this->itemService->add($request->input('todo.title'));

        $response = [
            '_id' => $item->_id,
            'title' => $item->title->toString(),
            'completed' => $item->isCompleted()
        ];

        return response()->json($response);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$item = $this->itemService->find($id);

        return response()->json($item);
	}


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id, Request $request)
	{
        $name = $request->input('todo.title');
        $completed = $request->input('todo.completed');

		$this->itemService->update($id, $name, (bool) $completed);

        return response()->json(200);
	}

    public function updateMultiple(Request $request)
    {
        $items = $request->input('todo');

        foreach ($items as $item) {
            $this->itemService->update($item['_id'], $item['title'], (bool) $item['completed']);
        }

        return response()->json(200);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->itemService->remove($id);

        return response()->json(200);
	}

    public function destroyMultiple(Request $request)
    {
        $items = $request->input('todo');

        foreach ($items as $item) {
            $this->itemService->remove($item['_id']);
        }

        return response()->json(200);
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
           'email' => 'email'
        ]);

        $this->itemService->sendNotificationEmail($request->input('email'));

        return response()->json(['status' => 200]);
    }
}
