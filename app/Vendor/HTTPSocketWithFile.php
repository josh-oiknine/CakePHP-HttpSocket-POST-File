<?php

App::uses('HttpSocket', 'Network/Http');

class HttpSocketWithFile extends HttpSocket {

    public function postFile($url=null, $data=array('file'=>array())) {
        if( !$url ) return false;
        if( empty($data['file']) ) return false;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
        curl_setopt($ch, CURLOPT_URL, urlencode($url));
        curl_setopt($ch, CURLOPT_POST, true);

        $post = arra();

        foreach ($data['file'] as $key => $value) {
            $post[$key] = "@".$value;
        }
        unset($data['file']);

        foreach ($data as $key => $value) {
            $post[$key] = $value;       
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}

?>