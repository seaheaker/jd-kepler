<?php
/**
 * 开普勒订单详情接口
 * User: smallsea
 * Date: 2018/8/17
 * Time: 16:38
 */

namespace Jd\Kepler\Api\UnionService;


use Jd\Kepler\KeplerBase;

class JdKeplerOrderGetList extends KeplerBase
{
    /**
     * 查询起始时间 yyyyMMddhhmmss格式
     * @var string
     */
    protected $beginTime;

    /**
     * 查询截止时间 yyyyMMddhhmmss格式
     * @var string
     */
    protected $endTime;

    /**
     * 分页查询的页码，必须大于0
     * @var integer default 1
     */
    protected $pageIndex;

    /**
     * 每页查询数量，必须大于0，如果超过20，默认按20计算
     * @var integer default 20
     */
    protected $pageSize;

    /**
     * 可选参数，如果传了orderId则只匹配该订单号，返回对应的订单信息；如果未传orderId，则根据其他参数返回时间段范围内的订单详情列表
     * @var integer
     */
    protected $orderId;

    /**
     * 起始时间
     * @return mixed
     */
    public function getBeginTime(): string
    {
        return $this->beginTime;
    }

    /**
     * 设置起始时间
     * @param mixed $beginTime
     */
    public function setBeginTime($beginTime): void
    {
        $this->beginTime = $beginTime;
    }

    /**
     * 截止时间
     * @return mixed
     */
    public function getEndTime(): string
    {
        return $this->endTime;
    }

    /**
     * 设置截止时间
     * @param mixed $endTime
     */
    public function setEndTime($endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * 页码
     * @return mixed
     */
    public function getPageIndex(): int
    {
        return $this->pageIndex;
    }

    /**
     * 设置页码
     * @param mixed $pageIndex
     */
    public function setPageIndex($pageIndex): void
    {
        $this->pageIndex = $pageIndex;
    }

    /**
     * 分页大小
     * @return mixed
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * 设置分页大小
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    /**
     * 订单ID
     * @return mixed
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * 设置订单ID
     * @param mixed $orderId
     */
    public function setOrderId($orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * 初始化数据(设置默认值)
     */
    public function initData()
    {
        $this->setVersion("2.0");
        $this->setPageIndex(1);
        $this->setPageSize(20);
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.order.getlist';
    }
}