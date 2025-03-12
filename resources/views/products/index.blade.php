@extends('layouts.app')
@section('title', 'Товары')
@section('content')
    <h1>Список товаров</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить товар</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th><th>Название</th><th>Категория</th><th>Цена</th><th>Действия</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->price }} ₽</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Редактировать</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection