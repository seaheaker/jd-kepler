<?php
/**
 * 根据分类搜索skuId列表
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:46
 */

namespace Jd\Kepler\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinSearchSkuByCategory extends KeplerBase
{
    protected $category;

    protected $pageSize;

    protected $pageNo;

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize ? $this->pageSize : 20;
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
    public function getPageNo()
    {
        return $this->pageNo ? $this->pageNo : 1;
    }

    /**
     * @param mixed $pageNo
     */
    public function setPageNo($pageNo): void
    {
        $this->pageNo = $pageNo;
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.xuanpin.search.sku.by.category';
    }
}