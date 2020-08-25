# 孩子王 SDK

Based on [foundation-sdk](https://github.com/HanSon/foundation-sdk)


## Requirement
- PHP >= 7.1
- **[composer](https://getcomposer.org/)**

## Installation
```
composer require seek-x2y/kidswant-sdk -vvv
```
## Usage
```php
$config = [
    'common' => [
        'loginName' => 'w1000125',
        'appkey' => 'DAD3BBF2098B4F1B9F85B66523254F78',
    ],
    'debug' => true
];

$api = new KidsWant($this->config);
$res = $api['orders']->getOrderList();
var_dump($res);
```

## License

MIT
