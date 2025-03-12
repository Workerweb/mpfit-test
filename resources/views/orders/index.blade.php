@extends('layouts.app')
@section('title', 'Заказы')
@section('content')
    <h1>Список заказов</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Добавить заказ</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th><th>ФИО</th><th>Дата</th><th>Статус</th><th>Цена</th><th>Действия</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->total_price }} ₽</td>
            <td>
                @if($order->status == 'new')
                <form action="{{ route('orders.complete', $order) }}" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn-success btn-sm">Сменить статус</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection
