@extends('app')

@section('content')

        <h1>{{ trans('app.create_category') }}</h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'categories.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit( trans('app.save_category'), ['class'=>'btn btn-primary']) !!}
                <a class="btn btn-default" href="{{ route('categories.index') }}">{{ trans('app.back') }}</a>
            </div>
        {!! Form::close() !!}


@endsection