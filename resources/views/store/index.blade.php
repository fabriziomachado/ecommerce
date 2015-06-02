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

        @if(isset($products_featureds) AND $products_featureds->count() > 0)
            <!--features_items-->
            <div class="features_items">
                <h2 class="title text-center">Em destaque</h2>

                @each('store.products.item', $products_featureds, 'product', 'store.products.no-items')

            </div>
            <!--features_items--

        @elseif(isset($products_recommendeds) AND $products_recommendeds->count() > 0)
            <!--recommended-->
            <div class="features_items">
                <h2 class="title text-center">Recomendados</h2>

                @each('store.products.item', $products_recommendeds, 'product', 'store.products.no-items')

            </div>
            <!--recommended-->
        @elseif(isset($products) AND $products->count() > 0)
            <div class="features_items"><!--all_items-->
                <h2 class="title text-center">Products of Category: {{ $products->first()->category->name }} </h2>

                @each('store.products.item', $products, 'product', 'store.products.no-items')

            </div>
            <!--all_items-->
        @else
            @include('store.products.no-items')
        @endif


    </div>
@stop
