@extends('layouts.app')
@section('content')
    <h1>Заказ #{{ $order->id }}</h1>
    <p>ФИО: {{ $order->customer_name }}</p>
    <p>Статус: {{ $order->status }}</p>
    <p>Товар: {{ $order->product->name }}</p>
    <p>Количество: {{ $order->quantity }}</p>
    <p>Итоговая цена: {{ $order->total_price }} руб.</p>
    <form method="POST" action="{{ route('orders.complete', $order) }}">
        @csrf
        @method('PATCH')
        <button type="submit">Отметить как выполненный</button>
    </form>
@endsection