<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreateRequest;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view("kitchen.dish", compact("dishes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("kitchen.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishCreateRequest $request)
    {
        $request->validated($request->all());

        $dish = new Dish();
        $dish->name = $request->name;
        $dish->category_id = $request->category_id;

        // image format & store path
        $imageName = date('YmdHis') . "." . request()->dish_image->getClientOriginalExtension();
        request()->dish_image->move(public_path("images"), $imageName);

        $dish->dish_image = $imageName;
        $dish->save();

        return redirect('dish')->with('success','Dish created successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $categories = Category::all();
        return view('kitchen.edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        // dd($request->all());
        request()->validate([
            'name'=> 'required',
            'category_id'=> 'required',
        ]);

        $dish->name = $request->name;
        $dish->category_id = $request->category_id;

        if ($request->dish_image) {
            $imageName = date('YmdHis') . "." . request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path("images"), $imageName);
            $dish->dish_image = $imageName;
        }

        $dish->save();
        return redirect('dish')->with('success','Dish updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect('dish');
    }



    // --=--=--=--=--=--=--=--=--=--=--=--=--=--

    // Order Listing Panal

    public function order() {
        $status = array_flip(config('res.order_status'));
        $orders = Order::whereIn('status', [1,2])->get();
        return view('kitchen.order', compact('orders', 'status'));

    }

    public function approve(Order $order) {
        $order->status = config('res.order_status.processing');
        $order->save();
        return redirect('order');
    }

    public function cancel(Order $order) {
        $order->status = config('res.order_status.cancel');
        $order->save();
        return redirect('order');
    }

    public function ready(Order $order) {
        $order->status = config('res.order_status.ready');
        $order->save();
        return redirect('order');
    }
}
