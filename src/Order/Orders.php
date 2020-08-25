<?php


namespace Seekx2y\KidsWantSDK\Order;

use Seekx2y\KidsWantSDK\Api;

class Orders extends Api
{

    /**
     * 获取订单列表
     * @param int $page
     * @param int $pageSize
     * @param int $dealState 订单状态订单状态：1 - 待支付2 - 待出库3 - 已出库4 - 已打包5 - 待评论6 - 已完成7 - 已取消
     * @param null $endTime
     * @param null $startTime
     * @param null $timeParamType 时间参数类型： 选填（默认下单时间）1- 下单时间，  2- 更新时间
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function getOrderList($page = 1, $pageSize = 10, $dealState = 2, $endTime = null, $startTime = null, $timeParamType = null)
    {
        $now = time();
        if (empty($endTime)) {
            $endTime = date('Y-m-d H:i:s', $now);
        }
        if (empty($startTime)) {
            $startTime = date('Y-m-d H:i:s', $now - 7200);
        }

        $param = [
            'page' => $page,
            'pagesize' => $pageSize,
            'startTime' => $startTime,// 2小时前
            'endTime' => $endTime,
            'dealState' => $dealState
        ];

        return $this->request('selectBusinessOrderList.do', $param);
    }


    /**
     * 查询订单明细接口
     * @param string $orderNum
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function getOrderDetail(string $orderNum)
    {
        $param = [
            'orderNum' => $orderNum,
        ];

        return $this->request('selectBusinessOrderList.do', $param);
    }

    /**
     * @param string $orderNum
     * @param int $expressType
     * @param string $expressId
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function delivery(string $orderNum, int $expressType, string $expressId)
    {
        $param = [
            'orderNum' => $orderNum,
            'expressType' => $expressType,
            'expressId' => $expressId
        ];

        return $this->request('submitExpresslId.do', $param);
    }
}