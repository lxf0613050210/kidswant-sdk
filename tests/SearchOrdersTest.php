<?php

namespace Tests\Unit;

use Seekx2y\KidsWantSDK\KidsWant;
use Seekx2y\KidsWantSDK\Orders;
use PHPUnit\Framework\TestCase;

class SearchOrdersTest extends TestCase
{

    private $config;

    public function setUp(): void
    {
        $this->config = [
            'common' => [
                'loginName' => 'w1000125',
                'appkey' => 'DAD3BBF2098B4F1B9F85B66523254F78',
            ],
            'debug' => true
        ];
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDevEnv()
    {
        $api = new KidsWant($this->config);
        $res = $api['orders']->getOrderList();
        var_dump($res);
        $this->assertObjectHasAttribute('success', $res);
        $this->assertEquals('成功', $res->success);
    }
}
