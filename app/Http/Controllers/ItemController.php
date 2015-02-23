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
	 * @return Response
	 */
	public function store()
	{
		
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
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $name = $request->input('name');

		$this->itemService->updateTitle($id, $name);

        return response()->json(200);
	}

    public function updateMultiple(Request $request)
    {

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

}
