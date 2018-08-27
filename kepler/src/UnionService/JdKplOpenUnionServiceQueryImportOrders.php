<?php
/**
 * 查询引入订单列表
 * User: smallsea
 * Date: 2018/8/17
 * Time: 16:50
 */

namespace Jd\Kepler\UnionService;


use Jd\Kepler\KeplerBase;

class JdKplOpenUnionServiceQueryImportOrders extends KeplerBase
{
    protected $unionId;
    protected $startDate;
    protected $pageNo;
    protected $orderIds;
    protected $endDate;
    protected $yn;
    protected $refStatus;
    protected $clearStatus;
    protected $lastIndex;
    protected $pageSize;
    protected $sourceId;

    /**
     * @return mixed
     */
    public function getUnionId()
    {
        return $this->unionId;
    }

    /**
     * @param mixed $unionId
     */
    public function setUnionId($unionId): void
    {
        $this->unionId = $unionId;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getPageNo()
    {
        return $this->pageNo;
    }

    /**
     * @param mixed $pageNo
     */
    public function setPageNo($pageNo): void
    {
        $this->pageNo = $pageNo;
    }

    /**
     * @return mixed
     */
    public function getOrderIds()
    {
        return $this->orderIds;
    }

    /**
     * @param mixed $orderIds
     */
    public function setOrderIds($orderIds): void
    {
        $this->orderIds = $orderIds;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getYn()
    {
        return $this->yn;
    }

    /**
     * @param mixed $yn
     */
    public function setYn($yn): void
    {
        $this->yn = $yn;
    }

    /**
     * @return mixed
     */
    public function getRefStatus()
    {
        return $this->refStatus;
    }

    /**
     * @param mixed $refStatus
     */
    public function setRefStatus($refStatus): void
    {
        $this->refStatus = $refStatus;
    }

    /**
     * @return mixed
     */
    public function getClearStatus()
    {
        return $this->clearStatus;
    }

    /**
     * @param mixed $clearStatus
     */
    public function setClearStatus($clearStatus): void
    {
        $this->clearStatus = $clearStatus;
    }

    /**
     * @return mixed
     */
    public function getLastIndex()
    {
        return $this->lastIndex;
    }

    /**
     * @param mixed $lastIndex
     */
    public function setLastIndex($lastIndex): void
    {
        $this->lastIndex = $lastIndex;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getSourceId()
    {
        return $this->sourceId ? $this->sourceId : 100001;
    }

    /**
     * @param mixed $sourceId
     */
    public function setSourceId($sourceId): void
    {
        $this->sourceId = $sourceId;
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