<?php
/**
 * 商品列表搜索
 * User: smallsea
 * Date: 2018/8/17
 * Time: 10:54
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinSearchSku extends KeplerBase
{
    /**
     * 关键词
     * @var string
     */
    protected $keywords;

    /**
     * 一级分类，暂时仅支持单条
     * @var string[]
     */
    protected $cids1;

    /**
     * 二级分类，暂时仅支持单条
     * @var string[]
     */
    protected $cids2;

    /**
     * 三级分类，暂时仅支持单条
     * @var string[]
     */
    protected $cids3;

    /**
     * 商品类型：2：自营；4：POP
     * @var int
     */
    protected $sellerType;

    /**
     *    最低价格
     * @var double
     */
    protected $minPrice;

    /**
     * 最高价格
     * @var double
     */
    protected $maxPrice;

    /**
     * 请求页码
     * @var int
     */
    protected $pageNum;

    /**
     * 每页大小，最大200
     * @var int
     */
    protected $pageSize;

    /**
     * 排序属性，0:综合排序;5:销量排序;6:新品排序
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
     * @return string[]
     */
    public function getCids1(): array
    {
        return $this->cids1;
    }

    /**
     * @param string[] $cids1
     */
    public function setCids1(array $cids1): void
    {
        $this->cids1 = $cids1;
    }

    /**
     * @return string[]
     */
    public function getCids2(): array
    {
        return $this->cids2;
    }

    /**
     * @param string[] $cids2
     */
    public function setCids2(array $cids2): void
    {
        $this->cids2 = $cids2;
    }

    /**
     * @return string[]
     */
    public function getCids3(): array
    {
        return $this->cids3;
    }

    /**
     * @param string[] $cids3
     */
    public function setCids3(array $cids3): void
    {
        $this->cids3 = $cids3;
    }


    /**
     * @return int
     */
    public function getSellerType(): int
    {
        return $this->sellerType;
    }

    /**
     * @param int $sellerType
     */
    public function setSellerType(int $sellerType): void
    {
        $this->sellerType = $sellerType;
    }

    /**
     * @return float
     */
    public function getMinPrice(): float
    {
        return $this->minPrice;
    }

    /**
     * @param float $minPrice
     */
    public function setMinPrice(float $minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return float
     */
    public function getMaxPrice(): float
    {
        return $this->maxPrice;
    }

    /**
     * @param float $maxPrice
     */
    public function setMaxPrice(float $maxPrice): void
    {
        $this->maxPrice = $maxPrice;
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
        $this->setPageSize(40);
        $this->setSellerType(2);
        $this->setOrderField(0);
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.xuanpin.search.sku';
    }

    /**
     * 接口参数组装
     * @return array
     */
    public function getApiParams(): string
    {

        $queryParam = [
            'sellerType' => $this->getSellerType(),
        ];

        $pageParam = [
            'pageNum' => $this->getPageNum(),
            'pageSize' => $this->getPageSize()
        ];


        $property = get_class_vars(get_class($this));
        unset($property['version'], $property['orderField']);
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