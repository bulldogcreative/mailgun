<?php

namespace Bulldog;

class Mailgun implements MailerInterface
{
    /**
     * The domain name in your Mailgun account that you want to use when
     * sending out email. Each account may have serveral domains that
     * you can use. It is used as part of the URL that we post to.
     */
    protected $domain;

    /**
     * You are given an API key when you sign-up for a Mailgun account. Each
     * request sent to the API must include an API key for authentication
     * of your account. And protect your API key like it is a password.
     */
    protected $key;

    /**
     * This is the API version of Mailgun that we are currently consuming with
     * this API client. Mailgun will increment this version if they add new
     * features that are not backwards compatible. You won't change this.
     */
    protected $version = '3';

    /**
     * Mailgun provides us with an API that is built on HTTP and is RESTful.
     * This allows us to use the PHP Curl library to send data to an API
     * endpoint for each resource. Mailgun will return a JSON response.
     */
    protected $url = 'https://api.mailgun.net';

    /**
     * The JSON response from Mailgun is stored in this protected property and
     * it can be accessed using the response method.
     */
    protected $response;

    /**
     * Pass in a domain name associated with your Mailgun account and an API
     * key that works with it. It will then set these as properties of the
     * class for use when calling the Mailgun API via PHP's CURL class.
     *
     * @param string $domain
     * @param string $key
     */
    public function __construct($domain, $key)
    {
        $this->domain = $domain;
        $this->key = $key;
    }

    /**
     * Send an email using the Mailgun API.
     *
     * @param string $to
     * @param string $from
     * @param string $subject
     * @param string $text
     * @param array  $parameters
     *
     * @see https://documentation.mailgun.com/en/latest/api-sending.html#sending
     *
     * @return MailerInterface
     */
    public function send($to, $from, $subject, $text, $parameters = [])
    {
        $parameters['to'] = $to;
        $parameters['from'] = $from;
        $parameters['subject'] = $subject;
        $parameters['text'] = $text;

        $this->response = $this->call('messages', $parameters);

        return $this;
    }

    /**
     * Get the Mailgun response.
     *
     * @return object
     */
    public function response()
    {
        return json_decode($this->response);
    }

    protected function call($endpoint, $parameters)
    {
        $options = [
            CURLOPT_URL => $this->url.'/v'.$this->version.'/'.$this->domain.'/'.$endpoint,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $parameters,
            CURLOPT_USERPWD => 'api:'.$this->key,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => 'bulldog/mailgun (https://github.com/bulldogcreative/mailgun)',
        ];

        $curl = curl_init();
        curl_setopt_array($curl, $options);

        $results = curl_exec($curl);
        curl_close($curl);

        return $results;
    }
}
