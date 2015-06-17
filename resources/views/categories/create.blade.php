@extends('layouts.store')

@section('content')

    <h1>{{ trans('app.create_category') }}</h1>

    @include('errors.list')

    {!! Form::model($category, ['route'=>'categories.store', 'method'=>'post']) !!}
        @include('categories._form',['submit_button_text' => trans('app.create_category')])
    {!! Form::close() !!}

@endsection