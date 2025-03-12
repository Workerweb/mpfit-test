@extends('layouts.app')
@section('content')
    <h1>Добавить товар</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Название" required>
        <select name="product_category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <textarea name="description" placeholder="Описание"></textarea>
        <input type="number" name="price" placeholder="Цена" required>
        <button type="submit">Создать</button>
    </form>
@endsection