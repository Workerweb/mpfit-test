<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function create() {
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request) {
        $product = Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Товар добавлен');
    }

    public function edit(Product $product) {
        $categories = ProductCategory::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product) {
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success', 'Товар обновлён');
    }

    public function destroy(Product $product) {
        if ($product->orders()->exists()) {
            return redirect()->route('products.index')->with('error', 'Нельзя удалить товар, так как есть связанные заказы');
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Товар удалён');
    }
}