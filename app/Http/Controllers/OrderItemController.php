<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $product_id)
    {
        $currentUser = Auth::user();
        $order = Order::where("user_id", $currentUser->id)->where("is_paid", false)->first();
        if ($order) {
            $orderItem = $order->orderItems()->where("id", $id)->where("product_id", $product_id)->first();
            if ($orderItem) {
                if ($orderItem->quantity >= 1) {
                    $orderItem->quantity -= 1;
                    $orderItem->save();
                    return back()->with(['message' => "Quantity removed succsesfully"]);

                } else {
                    $orderItem->delete();
                    return back()->with(['message' => "Product removed succsesfully"]);
                }
            } else {
                return response()->json(['message' => "Product not found"], 403);
            }



        } else {
            return response()->json(['message' => "You don't have any Order "], 403);

        }

    }
}
