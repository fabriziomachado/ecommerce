<tr>
    <td><a href="#" class="">{{ $order->id  }}</a></td>
    <td>
        <ul>
            @foreach($order->items as $item)
                <li>{{ $item->product->name }}</li>
            @endforeach
        </ul>
    </td>

    <td>{{ number_format($order->total, 2, ',', '.') }}</td>
    <td>{{ $order->statuslabel() }}</</td>
    <td>{{ $order->pagseguro_trans_id }}</</td>
</tr>

