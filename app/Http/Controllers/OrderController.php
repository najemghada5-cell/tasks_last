<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function calculateInvoice($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $product = DB::table('products')->where('id', $order->product_id)->first();
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $totalPrice = $product->price * $order->quantity;

        return response()->json([
            'order_id'     => $order->id,
            'product_name' => $product->name,
            'quantity'     => $order->quantity,
            'unit_price'   => $product->price,
            'total_price'  => $totalPrice
        ], 200);
    }
}
