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
                        <span>R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                            <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Adicionar no Carrinho
                            </a>
                    </span>
                </div>
                <!--/product-information-->
<style>
    .project_details {
        padding: 0px;
        margin: 70px 0px 0px 0px;
    }
    .project_details span {
        padding: 5px 0px;
        margin: 0px 0px 0px 0px;
        font-size: 14px;
        font-weight: bold;
        color: #454545;
        float: left;
        width: 100%;
        border-bottom: 1px solid #e3e3e3;
    }
    .project_details strong {
        padding: 0px 0px;
        margin: 0px 0px 0px 0px;
        font-size: 13px;
        font-weight: bold;
        color: #727272;
        float: left;
        width: 40%;
    }
    .project_details em {
        padding: 0px 0px;
        margin: 0px 0px 0px 0px;
        font-size: 13px;
        font-weight: normal;
        font-style: normal;
        color: #727272;
        float: left;
        width: 60%;
    }
    .project_details span a {
        padding: 3px 10px;
        margin: 0px 0px 0px 3px;
        font-size: 11px;
        line-height: 30px;
        font-weight: normal;
        font-style: normal;
        color: #727272;
        background-color: #e3e3e3;
        border-radius:3px;
    }
    .project_details span a:hover {
        background-color: #ddd;
    }
</style>
                <div class="project_details">
                    <h4>Project Details</h4>
                    <span><strong>Date</strong> <em>18 December 2014</em></span>
                    <span><strong>Categories</strong> <em><a href="#">Ecommerce</a> <a href="#">Wordpress</a> <a href="#">Woocommerce</a> <a href="#">OnlineStore</a> </em></span>
                    <span><strong>Author</strong> <em>InvoInn Solution</em></span>
                    <div class="clearfix margin_top5"></div>
                    <a href="http://naturalhair.se/" class="but_goback"><i class="fa fa-hand-o-right fa-lg"></i> Visit Site</a>
                </div>

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