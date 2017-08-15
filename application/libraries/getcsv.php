// -------------------------------Library--------------------------- //
//application/libraries/getcsv.php

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getcsv {

private $file_path = "";
private $handle = "";



function query_to_csv( $query, $filename, $attachment = false, $headers = true) {

    if($attachment) {
        // send response headers to the browser
        header( 'Content-Type: text/csv' );
        header( 'Content-Disposition: attachment;filename='.$filename);
        $fp = fopen('php://output', 'w');
    } else {
        $fp = fopen($filename, 'w');
    }

    $result = mysql_query($query);

    if($headers) {
        // output header row (if at least one row exists)
        $row = mysql_fetch_assoc($result);
        if($row) {
            fputcsv($fp, array_keys($row));
            // reset pointer back to beginning
            mysql_data_seek($result, 0);
        }
    }

    while($row = mysql_fetch_assoc($result)) {
        fputcsv($fp, $row);
    }

    fclose($fp);
    exit;
}

}