<?php
/**
 * 查询业绩订单
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:07
 */

namespace Jd\Kepler\Api\UnionService;


use Jd\Kepler\KeplerBase;

class JdKplOpenUnionServiceQueryCommisions extends KeplerBase
{
    /**
     * 联盟ID
     * @var int
     */
    protected $unionId;

    /**
     * 订单ID列表
     * @var int|int[]
     */
    protected $orderIds;

    /**
     * 开始时间(兼容其他语言，精确到毫秒) 如果查询引入，表示下单时间； 如果查询业绩，表示完成时间；时间跨度最大允许30天。
     * @var int
     */
    protected $startDate;

    /**
     * 结束时间(兼容其他语言，精确到毫秒) 如果查询引入，表示下单时间； 如果查询业绩，表示完成时间。支持查询范围1小时
     * @var int
     */
    protected $endDate;

    /**
     * 1未删除(有效)，0删除(取消订单),-1:父单,如果不想传该参数的值，需要填一个-255，因为如果任何值都不传会默认int的0
     * @var int
     */
    protected $yn;

    /**
     * 作弊标示 0非作弊 50人工违规 其他值都是作弊，如果不想传该参数的值，需要填一个-255，因为如果任何值都不传会默认int的0
     * @var int
     */
    protected $refStatus;

    /**
     * 订单清洗状态 1清洗正常 -1cookie不在有效期 -2校园订单 -3企消订单 -4团购订单 -5增值税，如果不想传该参数的值，需要填一个-255，因为如果任何值都不传会默认int的0
     * @var int
     */
    protected $clearStatus;

    /**
     * 页码号(默认1)
     * @var int
     */
    protected $pageNo;

    /**
     * 查询数量(最大500)
     * @var int
     */
    protected $pageSize;

    /**
     * 最后一条记录的ID
     * @var int
     */
    protected $lastIndex;

    /**
     * 开普勒客户固定传值：100001。注意：不可修改！不可修改！不可修改！
     * @var int
     */
    protected $sourceId;

    /**
     * @return int
     */
    public function getUnionId(): int
    {
        return $this->unionId;
    }

    /**
     * @param int $unionId
     */
    public function setUnionId(int $unionId): void
    {
        $this->unionId = $unionId;
    }

    /**
     * @return int|int[]
     */
    public function getOrderIds()
    {
        return $this->orderIds;
    }

    /**
     * @param int|int[] $orderIds
     */
    public function setOrderIds($orderIds): void
    {
        $this->orderIds = $orderIds;
    }

    /**
     * @return int
     */
    public function getStartDate(): int
    {
        return $this->startDate;
    }

    /**
     * @param int $startDate
     */
    public function setStartDate(int $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return int
     */
    public function getEndDate(): int
    {
        return $this->endDate;
    }

    /**
     * @param int $endDate
     */
    public function setEndDate(int $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getYn(): int
    {
        return $this->yn;
    }

    /**
     * @param int $yn
     */
    public function setYn(int $yn): void
    {
        $this->yn = $yn;
    }

    /**
     * @return int
     */
    public function getRefStatus(): int
    {
        return $this->refStatus;
    }

    /**
     * @param int $refStatus
     */
    public function setRefStatus(int $refStatus): void
    {
        $this->refStatus = $refStatus;
    }

    /**
     * @return int
     */
    public function getClearStatus(): int
    {
        return $this->clearStatus;
    }

    /**
     * @param int $clearStatus
     */
    public function setClearStatus(int $clearStatus): void
    {
        $this->clearStatus = $clearStatus;
    }

    /**
     * @return int
     */
    public function getPageNo(): int
    {
        return $this->pageNo;
    }

    /**
     * @param int $pageNo
     */
    public function setPageNo(int $pageNo): void
    {
        $this->pageNo = $pageNo;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return int
     */
    public function getLastIndex(): int
    {
        return $this->lastIndex;
    }

    /**
     * @param int $lastIndex
     */
    public function setLastIndex(int $lastIndex): void
    {
        $this->lastIndex = $lastIndex;
    }

    /**
     * @return int
     */
    public function getSourceId(): int
    {
        return $this->sourceId;
    }

    /**
     * @param int $sourceId
     */
    public function setSourceId(int $sourceId): void
    {
        $this->sourceId = $sourceId;
    }

    /**
     * 初始化数据
     */
    public function initData()
    {
        parent::initData();

        $this->setYn(-255);
        $this->setRefStatus(-255);
        $this->setClearStatus(-255);

        $this->setPageNo(1);
        $this->setPageSize(100);

        $this->setSourceId(100001);
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kpl.open.unionservice.queryCommisions';
    }

    /**
     * 接口参数
     * @return string
     */
    public function getApiParams(): string
    {
        $param = [];
        $property = get_class_vars(get_class($this));
        unset($property['sourceId']);
        foreach ($property as $field => $item) {
            if (null !== $this->$field) {
                $param[$field] = $this->$field;
            }
        }
        $sourceId = $this->getSourceId();
        return json_encode(compact('param', 'sourceId'), JSON_UNESCAPED_UNICODE);
    }
}