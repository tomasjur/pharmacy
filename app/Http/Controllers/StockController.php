<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Http\Resources\StockResource;
use App\Http\Resources\StockResourceCollection;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * @return StockResourceCollection
     */
    public function index(): StockResourceCollection // GET all list
    {
        //return new StockResourceCollection(Stock::paginate());
        return new StockResourceCollection(Stock::all());
    }

    /**
     * @param Request $request
     * @return StockResource
     */
    public function store(Request $request) // POST to create
    {
        $request->validate([
            'product'       => 'required',
            'quantity'      => 'required',
        ]);

        $stock = Stock::create($request->all());
        return new StockResource ($stock);
    }

    /**
     * @param Stock $stock
     * @return StockResource
     */
    public function show(Stock $stock): StockResource // GET one by id
    {
        return new StockResource($stock);
    }

    /**
     * @param Stock $stock
     * @param Request $request
     * @return StockResource
     */
    public function update(Stock $stock, Request $request): StockResource // PUT to update
    {

        $stock->update($request->all());

        return new StockResource($stock);
    }

    /**
     * @param Stock $stock
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Stock $stock) // DELETE
    {
        $stock->delete();

        return response()->json();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index2()
    {
        $data = StockController::index();

        return view ('stock', compact('data'));
    }
}
