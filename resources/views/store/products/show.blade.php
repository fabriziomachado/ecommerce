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
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">

                    {{-- first_images_of($product) --}}
                    @include('store.products.images.first', ['product'=> $product])

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">

                            {{-- list_images_of($product) --}}
                            @each('store.products.images.item', $product->images, 'image', 'store.products.images.no-items')

                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

                    <p>{{ $product->description }}</p>
                    <span>
                        <span>R$ {{ money_format('%i', $product->price) }}</span>
                            <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Adicionar no Carrinho
                            </a>
                    </span>
                </div>
                <!--/product-information-->

                <div class="product-tags">

                    <h4><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Tags:</h4>

                    {{-- list_tags_of($product) --}}
                    @each('store.products.tags.item', $product->tags, 'tag', 'store.products.tags.no-items')

                </div>
            </div>
        </div>
        <!--/product-details-->
    </div>

@stop