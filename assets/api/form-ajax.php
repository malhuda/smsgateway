<?php 
    sleep(5);

    $data = "";
    $data .= '{';
    $data .= '"code": "200",';
    $data .= '"text": "Your form was successfully submitted!"';
    $data .= '}';

    echo $data;
