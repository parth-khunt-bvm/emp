<?php
use App\Models\Details;
use App\Models\Banner;
use App\Models\Menuaccess;

function ccd($value){
    echo "<pre>";
    print_r($value);
    die();
}

function numberformat($value){
    return number_format((float)$value, 2, '.', '');
}

function date_formate($date){
    return date("d-M-Y", strtotime($date));
}

function date_time_formate($date){
    return date("d/m/Y h:i:s A", strtotime($date));
}

?>
