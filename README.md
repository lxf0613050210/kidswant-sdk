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
        'loginName' => '',
        'appkey' => '',
    ],
    'isDev' => true, // 是否使用测试环境URL
    'debug' => true // // 是否查看http请求详情
];

$api = new KidsWant($this->config);
$res = $api['orders']->getOrderList();
var_dump($res);
```

## License

MIT
