@extends('layouts.store')


@section('content')

    <section id="cart_items">
        <div class="container">

            <div class="table-responsive cart_info">
                <table class="table">
                    <thead>
                    <tr class="cart_menu">
                        <td>Item:</td>
                        <td>Name:</td>
                        <td>Price:</td>
                        <td>Qtd:</td>
                        <td>Total</td>
                        <td></td>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">

                                <img src="{{ asset('uploads/'. $item['image']) }}" width="80" alt=""/>

                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
                                <p>Código: {{ $k  }}</p>
                            </td>
                            <td class="cart_price">R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                            <td class="cart_quantity" width="50">
                                {!! Form::text('qtd', $item['qtd'], ['class'=>'form-control', 'id'=>'qtd']) !!}</td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    R$ {{  number_format($item['price'] *  $item['qtd'], 2, ',', '.')  }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['id' => $k]) }}"
                                   class="cart_quantity_delete">Deletar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="container" colspan="6">Empty Cart</td>
                        </tr>
                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span>Total: R$ {{ number_format($cart->getTotal(), 2, ',', '.') }}</span>
                                <a href="#" class="btn btn-success">Checkout</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </section>

@section('javascripts')
    @parent
    <script>
        ;(function($)
        {
            'use strict';
            $(document).ready(function()
            {
                window.console.log('executado está!');
                var $qtd = $('#qtd');
                //    $categories = $('#categories'),
                //    $users = $('#users');
                //
                //$owner.select2();
                //$categories.select2();
                //$users.select2();
                window.console.log( $qtd.value() );

            });
        })(window.jQuery);
    </script>
@stop

@stop