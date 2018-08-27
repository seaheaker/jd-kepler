<?php
/**
 * 根据三级类目id查询自营商品列表
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:50
 */

namespace Jd\Kepler\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinSearchSkuByCategory extends KeplerBase
{
    protected $cateId;

    protected $page;

    protected $pageSize;

    /**
     * @return mixed
     */
    public function getCateId()
    {
        return $this->cateId;
    }

    /**
     * @param mixed $cateId
     */
    public function setCateId($cateId): void
    {
        $this->cateId = $cateId;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page ? $this->page : 1;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page): void
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize ? $this->pageSize : 40;
    }

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
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