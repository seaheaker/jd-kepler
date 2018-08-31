<?php
/**
 * 根据分类搜索skuId列表
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:46
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinSearchSkuByCategory extends KeplerBase
{
    /**
     * 一二三级分类（格式：一级分类,二级分类,三级分类）,三级分类不能都为空，缺省的分类不填，例如：“,,三级分类”
     * @var string
     */
    protected $category;

    /**
     * 分页大小,最大200
     * @var int
     */
    protected $pageSize;

    /**
     * 当前页数
     * @var int
     */
    protected $pageNo;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
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
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.xuanpin.search.sku.by.category';
    }
}