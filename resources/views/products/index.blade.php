@extends('app')

@section('content')
    <h1>Products</h1>

    <p><a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a></p>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Recommend</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id  }}</td>
                    <td>
                        <a href="{{ route('products.edit',['id'=>$product->id])  }}" class="">{{ $product->name  }}</a>
                    </td>
                    <td>{{ str_limit($product->description, $limit=100, $end='...') }}</td>
                    <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->category->name  }}</td>
                    <td>{!! liked_icon($product->featured) !!}</td>
                    <td>{!! liked_icon($product->recommend) !!}</td>
                    <td>
                        <a href="{{ route('products.images',['id'=>$product->id])  }}" class="btn btn-xs btn-default">Images</a>
                        <a href="{{ route('products.edit',['id'=>$product->id])  }}" class="btn btn-xs btn-primary">Edit</a>
                        <a href="{{ route('products.destroy',['id'=>$product->id])  }}" class="btn btn-xs btn-danger" >Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products->render() !!}

    </div>
@endsection