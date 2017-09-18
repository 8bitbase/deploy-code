<?php
    if (isset($_POST)){
        $code = $_POST['code'];
        $lang = $_POST['lang'];
        $token = $_POST['token'];

        $ch = curl_init();
        $fields = array(
            "lang" => $lang,
            "code" => $code,
            "token" => $token
        );
        $postvars = '';
        foreach($fields as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
        }
        $url = "http://api.8bitbase.com/deploy/execute";
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        $response = curl_exec($ch);
        curl_close ($ch);
        print_r($response);
        // Return
        /*
        {"error":"","message":"OK","result":"Hello, world!\r\n","stats":"Compilation time: 0,12 sec, absolute running time: 0,08 sec, cpu time: 0,08 sec, average memory usage: 13 Mb, average nr of threads: 2"}
        */
    }