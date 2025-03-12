@extends('layouts.app')
@section('content')
    <h1>Добро пожаловать в систему управления товарами и заказами</h1>
    <p><a href="{{ route('products.index') }}">Перейти к товарам</a></p>
    <p><a href="{{ route('orders.index') }}">Перейти к заказам</a></p>
@endsection