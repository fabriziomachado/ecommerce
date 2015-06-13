@extends('layouts.store')

@section('categories')
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Categories</h2>
            <!--categories-products-->
            <div class="panel-group category-products" id="accordian">

                @each('store.categories.item', $categories, 'category', 'store.categories.no-items')

            </div>
            <!--categories-products-->

        </div>
    </div>
@stop

@section('content')
    <div class="col-sm-9 padding-right">


            @if($cart == 'empty')
                <h2 class="title text-center">Carrinho de compras vazio!</h2>

            @else
                <h2 class="title text-center">Pedido realizado com sucesso!</h2>
                <p>O pedido #{{ $order->id }}, foi realizado com sucesso.</p>
            @endif


    </div>
@stop
