@extends('layouts.store')

@section('content')

    <h1>Editing Product: {{ $product->name  }}</h1>

    @include('errors.list')

    {!! Form::model($product, ['route'=>['products.update', $product->id], 'method'=>'patch']) !!}
        @include('products._form', ['submit_button_text' => trans('app.update_product')])
    {!! Form::close() !!}

@endsection