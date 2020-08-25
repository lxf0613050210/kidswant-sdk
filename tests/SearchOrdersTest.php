<?php

namespace Tests\Unit;

use Seekx2y\KidsWantSDK\KidsWant;
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
            'isDev' => true, // 必填，是否使用测试环境URL
            'debug' => true // 非必填，是否查看http请求详情
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
