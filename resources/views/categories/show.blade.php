@extends('app')

@section('content')
        <div class="jumbotron">

            <h2>{{ $category->name }}</h2>
            <p>{{ $category->description }}</p>

            <p>
                <a href="{{ route('category.edit',['id'=>$category->id])  }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('category.destroy',['id'=>$category->id])  }}" class="btn btn-danger" >Delete</a>
            </p>

        </div>
@endsection