<?php

namespace Bulldog;

class Mailgun
{
    private $domain;

    private $key;

    private $version = '3';

    private $url = 'https://api.mailgun.net';

    private $response;

    public function __construct($domain, $key)
    {
        $this->domain = $domain;
        $this->key = $key;
    }

    public function send($to, $from, $subject, $text, $data = [])
    {
        $data['to'] = $to;
        $data['from'] = $from;
        $data['subject'] = $subject;
        $data['text'] = $text;

        $this->results = $this->call('messages', $data);

        return $this;
    }

    public function response()
    {
        return $this->response;
    }

    private function call($endpoint, $data)
    {
        $options = [
            CURLOPT_URL => $this->url.'/v'.$this->version.'/'.$this->domain.'/'.$endpoint,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_USERPWD => 'api:'.$this->key,
        ];

        $curl = curl_init();
        curl_setopt_array($curl, $options);

        $results = curl_exec($curl);
        curl_close($curl);

        return $results;
    }
}
