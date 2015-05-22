<?php

function liked_icon($status)
{
    $status = $status == true ? 'up' : 'down';
    $str = "<span class='glyphicon glyphicon-thumbs-{$status}' aria-hidden='true'></span>";

    return $str;
}