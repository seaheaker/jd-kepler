<?php
/**
 * 商品搜索接口
 * User: smallsea
 * Date: 2018/8/31
 * Time: 11:04
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenXuanPinSearchGoods extends KeplerBase
{
    /**
     * 关键词
     * @var string
     */
    protected $keywords;

    /**
     * 商品编号“只支持同时查询一个商品编号，如使用关键词查询可不用输入商品编号"
     * @var string
     */
    protected $skuId;

    /**
     * 页码，若为第一页可不填
     * @var int
     */
    protected $pageNum;

    /**
     *    每页显示条数“最多可显示200条”
     * @var int
     */
    protected $pageSize;

    /**
     * 排序属性，0:综合排序;5:销量排序;6:新品排序,9佣金排序
     * @var int
     */
    protected $orderField;

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getSkuId(): string
    {
        return $this->skuId;
    }

    /**
     * @param string $skuId
     */
    public function setSkuId(string $skuId): void
    {
        $this->skuId = $skuId;
    }

    /**
     * @return int
     */
    public function getPageNum(): int
    {
        return $this->pageNum;
    }

    /**
     * @param int $pageNum
     */
    public function setPageNum(int $pageNum): void
    {
        $this->pageNum = $pageNum;
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
    public function getOrderField(): int
    {
        return $this->orderField;
    }

    /**
     * @param int $orderField
     */
    public function setOrderField(int $orderField): void
    {
        $this->orderField = $orderField;
    }

    /**
     * 初始化数据
     */
    public function initData()
    {
        parent::initData();

        $this->setPageNum(1);
        $this->setPageSize(100);
        $this->setOrderField(0);
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.xuanpin.searchgoods";
    }

    /**
     * 接口参数
     * @return string|array|mixed
     */
    public function getApiParams(): string
    {
        $queryParam = [];

        $pageParam = [
            'pageNum' => $this->getPageNum(),
            'pageSize' => $this->getPageSize()
        ];


        $property = get_class_vars(get_class($this));
        unset($property['orderField']);
        foreach ($property as $field => $item) {
            if (isset($pageParam[$field]))
                continue;

            if (null !== $this->$field) {
                $queryParam[$field] = $this->$field;
            }
        }

        $orderField = $this->getOrderField();
        return json_encode(compact('queryParam', 'pageParam', 'orderField'), JSON_UNESCAPED_UNICODE);
    }
}