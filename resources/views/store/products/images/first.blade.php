@if(count($product->images))
    <img src="{{ asset('uploads/'.$product->images->first()->photo) }}" width="100%" alt=""/>
@else
    <img src="{{ asset('uploads/no-img.jpg') }}" alt="" width="100%"/>
@endif