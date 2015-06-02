<?php

function liked_icon($status)
{
    $status = $status == true ? 'up' : 'down';
    $str = "<span class='glyphicon glyphicon-thumbs-{$status}' aria-hidden='true'></span>";

    return $str;
}

function first_image_of($product)
{
    $str = "<img src='" . asset('uploads/no-img.jpg') . "' alt = '' />";
    if ($product->images->count() > 0) {
        $str = "<img src='" . asset('uploads/' . $product->images->first()->photo) . "' alt ='' />";
    }

    return $str;
}