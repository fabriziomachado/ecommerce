@extends('layouts.store')

@section('categories')
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Categories</h2>

            @include('store.categories.list')

        </div>
    </div>
@stop

@section('content')
    <div class="col-sm-9 padding-right">

        @if(isset($products_featureds))
            <!--features_items-->
            <div class="features_items">
                <h2 class="title text-center">Em destaque</h2>

                @include('store.products.list', ['products' => $products_featureds])

            </div>
            <!--features_items-->
        @endif

        @if(isset($products_recommendeds))
            <!--recommended-->
            <div class="features_items">
                <h2 class="title text-center">Recomendados</h2>

                @include('store.products.list', ['products' => $products_recommendeds])

            </div>
            <!--recommended-->
        @endif


        @if(isset($products) AND $products->count() > 0)
            <div class="features_items"><!--all_items-->
                <h2 class="title text-center">Products of Category: {{ $products->first()->category->name }} </h2>

                @include('store.products.list', ['products' => $products ])

            </div>
            <!--all_items-->
        @endif


    </div>
@stop
