@extends('layouts.store')

@section('content')
    <h1>Orders</h1>

    <p><a href="#" class="btn btn-primary">New Order</a></p>



        <div id="error"></div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)

                <tr>
                    <td>
                        {{ $order->id }}
                    </td>
                    <td>
                      {{ $order->user->name }} ({{ $order->user->email }})
                    </td>
                    <td>
                        {{ date('d/m/Y \à\s H:i', strtotime($order->created_at )) }}
                    </td>
                    <td>
                        R$ {{ number_format($order->total, 2, ',', '.') }}
                    </td>
                    <td>


                        {!! Form::model($order, ['route'=>['products.update', $order->id], 'method'=>'patch']) !!}

                             {!! Form::select('status', $order->statusList, $order->status, ['order-id' =>  $order->id] ) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

        {!! $orders->render() !!}
@endsection