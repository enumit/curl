<?php
require_once (__DIR__ . '/../src/CurlHelper.php');

$curlHelper = new \enumit\curl\CurlHelper();

$res = $curlHelper->setUrl('https://raw.githubusercontent.com/enumit/curl/master/README.md')->send();

print_r($res);