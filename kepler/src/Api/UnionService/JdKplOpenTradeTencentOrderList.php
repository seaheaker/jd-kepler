<?php
/**
 * 腾讯系订单列表
 * User: smallsea
 * Date: 2018/8/31
 * Time: 15:33
 */

namespace Jd\Kepler\Api\UnionService;


use Jd\Kepler\KeplerBase;

class JdKplOpenTradeTencentOrderList extends KeplerBase
{
    /**
     * 客户流程, 微信unionId传34，QQ opendId传35
     * @var int
     */
    protected $clientFlow;

    /**
     * 微信unionId 或者 QQ opendId
     * @var string
     */
    protected $uid;

    /**
     * 客户端IP
     * @var string
     */
    protected $userIp;

    /**
     * uuid用于跟踪日志
     * @var string
     */
    protected $logId;

    /**
     * 每页数量
     * @var int
     */
    protected $size;

    /**
     * 当前页码
     * @var int
     */
    protected $page;

    /**
     * 查询的订单状态 等待付款=1、等待自提=32、等待收获=128、已取消=-1、已完成=1024、有效=2048、全部=4096（默认）
     * @var int
     */
    protected $state;

    /**
     * 查询的起始日期 格式：yyyy-MM-dd H:i:s    例如：2018-08-31 15:40:00
     * @var string
     */
    protected $startDate;

    /**
     * 查询的结束日期 格式：yyyy-MM-dd H:i:s    例如：2018-08-31 15:40:00
     * @var string
     */
    protected $endDate;

    /**
     * @return int
     */
    public function getClientFlow(): int
    {
        return $this->clientFlow;
    }

    /**
     * @param int $clientFlow
     */
    public function setClientFlow(int $clientFlow): void
    {
        $this->clientFlow = $clientFlow;
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     */
    public function setUid(string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * @return string
     */
    public function getUserIp(): string
    {
        return $this->userIp;
    }

    /**
     * @param string $userIp
     */
    public function setUserIp(string $userIp): void
    {
        $this->userIp = $userIp;
    }

    /**
     * @return string
     */
    public function getLogId(): string
    {
        return $this->logId;
    }

    /**
     * @param string $logId
     */
    public function setLogId(string $logId): void
    {
        $this->logId = $logId;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState(int $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * 初始化数据
     */
    public function initData()
    {
        parent::initData();

        $this->setPage(0);
        $this->setSize(40);
        $this->setState(4096);
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.trade.tencent.orderlist";
    }

    /**
     * 接口参数
     * @return string|array|mixed
     */
    public function getApiParams(): string
    {
        $client = [];

        $orderListReq = [
            'size'  => $this->getSize(),
            'page'  => $this->getPage(),
            'state' => $this->getState()
        ];

        if (!empty($this->getStartDate())) {
            $orderListReq['startDate'] = $this->getStartDate();
        }

        if (!empty($this->getEndDate())) {
            $orderListReq['endDate'] = $this->getEndDate();
        }

        $property = get_class_vars(get_class($this));
        unset($property['startDate'], $property['endDate']);
        foreach ($property as $field => $item) {
            if (isset($orderListReq[$field]))
                continue;

            if (null !== $this->$field) {
                $client[$field] = $this->$field;
            }
        }

        return json_encode(compact('client', 'orderListReq'), JSON_UNESCAPED_UNICODE);
    }
}