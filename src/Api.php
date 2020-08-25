<?php


namespace Seekx2y\KidsWantSDK;

use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{
    const DEV_URL = 'http://orderprocesstest.haiziwang.com:8080/dap-web/pop/';
    const PRODUCTION_URL = 'http://dapopen.haiziwang.com/pop/';

    private $app;

    /**
     * Api constructor.
     * @param KidsWant $kidsWant
     */
    public function __construct(KidsWant $kidsWant)
    {
        $this->app = $kidsWant;
    }

    /**
     * @param string $interfaceName
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function request(string $interfaceName, array &$params)
    {
        $config = $this->app->getConfig();
        $params = array_merge($params, $config['common']);
        $jsonStr = json_encode($params, JSON_UNESCAPED_UNICODE);
        $url = $config['isDev'] ? static::DEV_URL : static::PRODUCTION_URL;
        $response = $this->getHttp()->request('GET', $url . $interfaceName . '?jsonStr=' . $jsonStr, ['debug' => $config['debug']]);

        return json_decode(strval($response->getBody()));
    }
}