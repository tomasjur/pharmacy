<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Http\Resources\SaleResource;
use App\Http\Resources\SaleResourceCollection;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * @return SaleResourceCollection
     */
    public function index(): SaleResourceCollection // GET all list
    {
        //return new SaleResourceCollection(Sale::paginate());
        return new SaleResourceCollection(Sale::all());
    }

    /**
     * @param Request $request
     * @return SaleResource
     */
    public function store(Request $request) // POST to create
    {
        $request->validate([
            'product'       => 'required',
            'quantity'      => 'required',
            'price'         => 'required',
        ]);

        $sale = Sale::create($request->all());
        return new SaleResource ($sale);
    }

    /**
     * @param Sale $sale
     * @return SaleResource
     */
    public function show(Sale $sale): SaleResource // GET one by id
    {
        return new SaleResource($sale);
    }

    /**
     * @param Sale $sale
     * @param Request $request
     * @return SaleResource
     */
    public function update(Sale $sale, Request $request): SaleResource // PUT to update
    {

        $sale->update($request->all());

        return new SaleResource($sale);
    }

    /**
     * @param Sale $sale
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Sale $sale) // DELETE
    {
        $sale->delete();

        return response()->json();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index2()
    {
        $data = SaleController::index();

        return view ('sale', compact('data'));
    }
}
