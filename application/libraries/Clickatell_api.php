<?php

class Clickatell_api {

    private $username = 'username'; // clickatell username
    private $password = 'password'; // password
    private $api_id = 'api_id'; // api id from manage my product page
    private $baseurl = 'http://api.clickatell.com'; //clickatell HTTP api url

    public function send($phone, $text) {

        // auth call
        $authurl = $this->baseurl . '/http/auth?user=' . $this->username . '&password=' . $this->password . '&api_id=' . $this->api_id;

        // do auth call
        $ret = @file&#40;$authurl);

        // explode our response. return string is on first line of the data returned
        $sess = explode(":", $ret[0]);
        if ($sess[0] == "OK") {

            $sess_id = trim($sess[1]); // remove any whitespace
            $url = $this->baseurl . '/http/sendmsg?session_id=' . $sess_id . '&to=' . $phone . '&text=' . $text;

            $ret = file&#40;$url);
            $send = explode(":", $ret[0]);

            if ($send[0] == "ID") {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return "AUTH FAILED";
        }
    }

}
