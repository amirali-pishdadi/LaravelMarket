<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($username)
    {
        $currentUser = Auth::user();
        $user = User::where("username", $username)->first();

        if ($currentUser->id === $user->id) {
            $order = Order::where("user_id", $user->id)->first();
            $orderItems = $order->orderItems();

            return view("Order.index", ["order" => $order, "orderItems" => $orderItems , "user" => $user ]);
        } else {
            return redirect("login");

        }
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
        $formFields = $request->validate([
            "quantity"   => "required|integer|min:1",
            "product_id" => "required|integer",

        ]);

        $currentUser = Auth::user();

        $product = Product::findOrFail($formFields["product_id"]);

        if ($product) {
            $order = Order::firstOrCreate(
                [
                    'user_id' => $currentUser->id,
                    'is_paid' => false,
                ],
                [
                    'order_date'       => now(),
                    'total_amount'     => 0,
                    'shipping_address' => $currentUser->address && "" // assuming there's an address field
                ],

            );

            $orderItem = $order->orderItems()->where('product_id', $product->id)->first();

            if ($orderItem) {
                $orderItem->quantity += (int) $formFields["quantity"];
                $orderItem->save();
                return response()->json(['message' => 'Quantity added to order successfully']);

            } else {
                $orderItem = new OrderItem([
                    "product_id" => (int) $formFields["product_id"],
                    "price"      => $product->price,
                    "order_id"   => (int) $order->id,
                    "quantity"   => (int) $formFields["quantity"],
                ]);

                $order->orderItems()->save($orderItem);
                return response()->json(['message' => 'Product added to order successfully', 'order' => $order]);
            }
        } else {
            return response()->json([
                'message' => "Product doesn't found ",
            ]);

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
