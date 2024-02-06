<?php

class HyQuery {
    private $url;
    private $token;

    public function __construct($url, $token) {
        $this->url = $url;
        $this->token = $token;
    }

    public function sendQuery($query) {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token,
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));
        
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);

        return json_decode($result, true);
    }
}
