<?php
    /*
     * Notification API */
    $type = $_GET["type"];
    
    sleep(3);

    // fetch new data
    if($type == null) {
        // notification json
        $data = "";
        $data .= '{
            "icon": "ico-instagram2 bgcolor-teal", 
            "text": "Lorem ipsum <span class=\"text-primary semibold\">dolor sit</span> amet, consectetur adipisicing elit.",
            "meta": {"time": "5m ago"}
        },';
        $data .= '{
            "icon": "ico-queen", 
            "text": "Ut <span class=\"text-primary semibold\">enim</span> ad minim veniam, aliquip ex ea commodo.",
            "meta": {"time": "10m ago"}
        },';
        $data .= '{
            "icon": "ico-file-check bgcolor-success", 
            "text": "Excepteur sint <span class=\"text-primary semibold\">occaecat cupidatat</span> non laborum.",
            "meta": {"time": "1h ago"}
        }';

        echo '{';
        echo '"data": [';
        echo $data;
        echo ']';
        echo '}';
    }