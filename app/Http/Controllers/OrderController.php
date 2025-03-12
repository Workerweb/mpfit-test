<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order) {
        return view('orders.show', compact('order'));
    }

    public function create() {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'customer_name' => 'required',  
            'comment' => 'nullable', 
            'product_id' => 'required', 
            'quantity' => 'required|min:1' 
        ]);
        $product = Product::findOrFail($data['product_id']);
        $data['total_price'] = $product->price * $data['quantity'];
        Order::create($data);
        return redirect()->route('orders.index')->with('success', 'Заказ создан');
    }

    public function updateStatus(Order $order) {
        $order->update(['status' => 'completed']);
        return redirect()->route('orders.index')->with('success', 'Статус заказа обновлён');
    }
}
