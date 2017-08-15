<?php
    /*
     * Message API */
    $type = $_GET["type"];
    
    sleep(3);

    // fetch new data
    if($type == null) {
        // message json
        $data = "";
        $data .= '{
            "name": "Arthur Abbott", 
            "picture": "avatar6.jpg", 
            "text": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.",
            "meta": {"attachment": true, "time": "1h", "reply": false, "star": false}
        },';
        $data .= '{
            "name": "Elvis Christensen", 
            "picture": "avatar2.jpg", 
            "text": "Duis aute irure dolor in reprehenderit in voluptate velit esse.",
            "meta": {"attachment": true, "time": "2h", "reply": false, "star": false}
        }';

        echo '{';
        echo '"data": [';
        echo $data;
        echo ']';
        echo '}';
    }