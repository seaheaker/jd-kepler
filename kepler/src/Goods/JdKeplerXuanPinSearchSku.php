<?php
/**
 * 商品基本信息搜索接口
 * User: smallsea
 * Date: 2018/8/17
 * Time: 10:54
 */

namespace Jd\Kepler\Goods;



use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinSearchSku extends KeplerBase
{
    protected $keywords;
    protected $cids1;
    protected $cids2;
    protected $cids3;
    protected $sellerType;
    protected $minPrice;
    protected $maxPrice;

    protected $pageNum;
    protected $pageSize;
    protected $orderField;

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getCids1()
    {
        return $this->cids1;
    }

    /**
     * @param mixed $cids1
     */
    public function setCids1($cids1): void
    {
        $this->cids1 = $cids1;
    }

    /**
     * @return mixed
     */
    public function getCids2()
    {
        return $this->cids2;
    }

    /**
     * @param mixed $cids2
     */
    public function setCids2($cids2): void
    {
        $this->cids2 = $cids2;
    }

    /**
     * @return mixed
     */
    public function getCids3()
    {
        return $this->cids3;
    }

    /**
     * @param mixed $cids3
     */
    public function setCids3($cids3): void
    {
        $this->cids3 = $cids3;
    }

    /**
     * @return mixed
     */
    public function getSellerType()
    {
        //设置默认值
        return $this->sellerType ? $this->sellerType : 2;
    }

    /**
     * @param mixed $sellerType
     */
    public function setSellerType($sellerType): void
    {
        $this->sellerType = $sellerType;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param mixed $minPrice
     */
    public function setMinPrice($minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param mixed $maxPrice
     */
    public function setMaxPrice($maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }

    /**
     * @return mixed
     */
    public function getPageNum()
    {
        //设置默认值
        return $this->pageNum ? $this->pageNum : 1;
    }

    /**
     * @param mixed $pageNum
     */
    public function setPageNum($pageNum): void
    {
        $this->pageNum = $pageNum;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize ? $this->pageSize : 200;
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
    public function getOrderField()
    {
        return $this->orderField ? $this->orderField : 0;
    }

    /**
     * @param mixed $orderField
     */
    public function setOrderField($orderField): void
    {
        $this->orderField = $orderField;
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
            'sellerType'    => $this->getSellerType(),
        ];

        $pageParam = [
            'pageNum'       => $this->getPageNum(),
            'pageSize'      => $this->getPageSize()
        ];


        $property = get_class_vars(JdKeplerXuanPinSearchSku::class);
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