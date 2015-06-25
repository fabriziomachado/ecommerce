var $qtd = $('input[type=number]');
var $product_id, $val, $url, $element_total_item, $element_total_cart = null;

$qtd.change(function () {
    $product_id = $(this).attr('product-id');
    $val = $(this).val();
    if($val <= 1 ){
        $val = 1;
        $(this).val($val);
    }
    $url = '/cart/' + $product_id + '/qtd/' + $val;
    //var $token = { _token: {{csrf_token()}} };

    $.get($url, function ($data) {
        $element_total_item = "#total_item_" + $data.item_id;

        $($element_total_item).html($data.total_item);
        $("#total_cart").html($data.total_cart);

    });
});


var $order_id, $status_id = null;
$("select[name='status']").change(function () {

    $order_id = $(this).attr('order-id');
    $status_id = $(this).val();

    //alert('AQUI: ' + $order_id );
    //alert('AQUI: ' + $status_id );

    //if($val <= 1 ){
    //    $val = 1;
    //    $(this).val($val);
    //}
    $url = '/admin/orders/' + $order_id + '/status/' + $status_id;
    //var $token = { _token: {{csrf_token()}} };

    $.get($url, function ($data) {
        alert($data.message);
    });
});