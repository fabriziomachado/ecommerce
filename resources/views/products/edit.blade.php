@extends('app')

@section('content')
    <h1>Editing Product: {{ $product->name  }}</h1>

    @if ($errors->any())

        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}
        <div class="well well-lg">
            <div class="form-group">
                {!! Form::label('category', 'Category:') !!}
                {!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
        </div>

        <div class="checkbox-inline">
            <label for="featured">
                {!! Form::checkbox('featured', 1, $product->featured) !!} Featured
            </label>
        </div>
        <div class="checkbox-inline">
            <label for="recommend">
                {!! Form::checkbox('recommend', 1, $product->recommend) !!} Recommend
            </label>
        </div>

        <div class="form-group">
            {!! Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('products.index') }}">{{ trans('app.back') }}</a>
        </div>
    {!! Form::close() !!}
@endsection