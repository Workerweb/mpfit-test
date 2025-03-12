@extends('layouts.app')
@section('content')
    <h1>Редактировать товар</h1>
    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" required>
        <select name="product_category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <textarea name="description">{{ $product->description }}</textarea>
        <input type="number" name="price" value="{{ $product->price }}" required>
        <button type="submit">Сохранить</button>
    </form>
@endsection