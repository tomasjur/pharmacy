<?php

namespace App\Http\Controllers;

use App\Order;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderResourceCollection;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @return OrderResourceCollection
     */
    public function index(): OrderResourceCollection // GET all list
    {
        //return new OrderResourceCollection(Order::paginate());
        return new OrderResourceCollection(Order::all());
    }

    /**
     * @param Request $request
     * @return OrderResource
     */
    public function store(Request $request) // POST to create
    {
        $request->validate([
            'supplier'  => 'required',
            'product'   => 'required',
            'quantity'  => 'required',
            'price'     => 'required',
        ]);

        $order = Order::create($request->all());
        return new OrderResource ($order);
    }

    /**
     * @param Order $order
     * @return OrderResource
     */
    public function show(Order $order): OrderResource // GET one by id
    {
        return new OrderResource($order);
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return OrderResource
     */
    public function update(Order $order, Request $request): OrderResource // PUT to update
    {

        $order->update($request->all());

        return new OrderResource($order);
    }

    /**
     * @param Order $order
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Order $order) // DELETE
    {
        $order->delete();

        return response()->json();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index2()
    {
        $data = OrderController::index();
        return view ('order', compact('data'));
    }

    // ADD
    public function add()
    {
        return view ('orderAdd');
    }
    public function store2(Request $request)
    {
        $response = OrderController::store($request);
        return redirect('/orders')->with('success', 'Successfully added!');
    }
}
