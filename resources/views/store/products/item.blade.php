<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">

                {!! first_image_of($product) !!}

                <h2>R$ {{ number_format($product->price, 2, ',', '.') }}</h2>

                <p>{{ $product->name }}</p>

                <a href="{{ route('product', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i
                            class="fa fa-crosshairs"></i>Mais detalhes</a>

                <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i
                            class="fa fa-shopping-cart"></i>Adicionar
                    no carrinho</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>R$ {{ number_format($product->price, 2, ',', '.') }}</h2>

                    <p>{{ $product->name }}</p>
                    <a href="{{ route('product', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i
                                class="fa fa-crosshairs"></i>Mais detalhes</a>

                    <a href="{{ route('cart.add', ['id' => $product->id]) }}"
                       class="btn btn-default add-to-cart"><i
                                class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
            </div>
        </div>
    </div>
</div>