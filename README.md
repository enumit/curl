# Curl Helper
PHP curl request hepler

Handle HTTP requests to the REST API

Installation
---
Use composer
```
composer require enumit/curl
```

Usage
---
```php
$curlHelper = new \enumit\curl\CurlHelper();

$res = $curlHelper->setUrl('https://api.mydomain.com/order')
                ->setRequestMethod('PUT')
                ->setHeader(['Content-Type: application/json'])
                ->setQueryData(['order_number'=>'123456', 'amount'=>'154.33'])
                ->send();

```