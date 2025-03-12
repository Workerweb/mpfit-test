@extends('layouts.app')
@section('content')
    <h1>Создать заказ</h1>
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <input type="text" name="customer_name" placeholder="ФИО" required>
        <select name="product_id" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity" placeholder="Количество" required min="1">
        <textarea name="comment" placeholder="Комментарий"></textarea>
        <button type="submit">Создать</button>
    </form>
@endsection