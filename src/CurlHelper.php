<?php
namespace enumit\curl;

/**
 * CurlHelper class - Handle HTTP requests to the REST API
 * @author Wei Deng
 * @version 1.0
 *
 */
class CurlHelper
{
    private $url;
    private $requestMethod;
    private $header;
    private $queryData;
    private $timeout;

    public function __construct($url = '', $queryData = null, $requestMethod = 'GET', $header = [], $timeout = 30)
    {
        $this->url = $url;
        $this->queryData = $queryData;
        $this->requestMethod = $requestMethod;
        $this->header = $header;
        $this->timeout = $timeout;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setMethod($method)
    {
        $this->requestMethod = $method;
        return $this;
    }

    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    public function setQueryData($queryData)
    {
        $this->queryData = $queryData;
        return $this;
    }

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function send()
    {
        $req = curl_init($this->url);

        curl_setopt($req, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($req, CURLOPT_CUSTOMREQUEST, $this->requestMethod);
        curl_setopt($req, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($req, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($req, CURLOPT_SSL_VERIFYHOST, 2);

        if(!empty($this->header)) {
            curl_setopt($req, CURLOPT_HTTPHEADER, $this->header);
        }

        if (!is_null($this->queryData)) {
            if(is_array($this->queryData)) {
                $this->queryData = http_build_query($this->queryData);
            }
            curl_setopt($req, CURLOPT_POSTFIELDS, $this->queryData);
        }

        $res = curl_exec($req);
        curl_close($req);

        return $res;
    }
}