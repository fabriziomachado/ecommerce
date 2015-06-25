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
        $str = "<img src='" . asset('uploads/' . $product->images->first()->photo) . "' alt ='' width='80' />";
    }

    return $str;
}

function list_images_of($product)
{
    $product->images->each(function($image){
        echo  "<a href='#'><img src='". asset('uploads/' . $image->photo) . "' alt ='' width='80' /></a>";

    });

}

function status_of_order($status)
{

    switch ($status)
    {
        case 0:
            return 'Pendente';
        case 1:
            return  'Autorizado';
        case 2:
            return 'Não Autorizado';

    }

}
