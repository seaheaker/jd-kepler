<?php
/**
 * 查询引入订单列表
 * User: smallsea
 * Date: 2018/8/17
 * Time: 16:50
 */

namespace Jd\Kepler\Api\UnionService;

use Jd\Kepler\KeplerBase;

class JdKplOpenUnionServiceQueryImportOrders extends KeplerBase
{
    /**
     * 联盟ID
     * @var int
     */
    protected $unionId;

    /**
     * 开始时间(精确到毫秒)
     * @var string
     */
    protected $startDate;

    /**
     * 页码号(默认1)
     * @var int
     */
    protected $pageNo;

    /**
     * 订单ID列表
     * @var int|int[]
     */
    protected $orderIds;

    /**
     * 结束时间(精确到毫秒)
     * @var string
     */
    protected $endDate;

    /**
     * 1未删除(有效)，0删除(取消订单),-1:父单,传入-255表示此参数无效
     * @var int
     */
    protected $yn;

    /**
     * 作弊标示 0非作弊 50人工违规 其他值都是作弊，传入-255表示此参数无效
     * @var int
     */
    protected $refStatus;

    /**
     *    订单清洗状态 1清洗正常 -1cookie不在有效期 -2校园订单 -3企消订单 -4团购订单 -5增值税，需传入-255表示此参数无效
     * @var int
     */
    protected $clearStatus;

    /**
     * 最后一条记录的ID
     * @var int
     */
    protected $lastIndex;

    /**
     * 查询数量(最大500)
     * @var int
     */
    protected $pageSize;

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
     * 初始化方法
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
        return 'jd.kpl.open.unionservice.queryimportorders';
    }

    /**
     * 接口参数组装
     * @return array
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