@extends('layouts.store')

@section('content')
    <h1>Orders</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Itens</th>
                <th>Total</th>
                <th>Status</th>
                <th>pagseguro id</th>
            </tr>
            </thead>
            <tbody>
            @each('store.orders.item', $orders, 'order', 'store.categories.no-items')
            </tbody>
        </table>

    </div>
@endsection
