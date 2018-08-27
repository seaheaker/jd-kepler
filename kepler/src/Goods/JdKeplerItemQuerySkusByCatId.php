<?php
/**
 * 查询三级分类商品
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:32
 */

namespace Jd\Kepler\Goods;

use Jd\Kepler\KeplerBase;

class JdKeplerItemQuerySkusByCatId extends KeplerBase
{
    protected $catId;

    protected $scrollId;

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * @param mixed $catId
     */
    public function setCatId($catId): void
    {
        $this->catId = $catId;
    }

    /**
     * @return mixed
     */
    public function getScrollId()
    {
        return $this->scrollId;
    }

    /**
     * @param mixed $scrollId
     */
    public function setScrollId($scrollId): void
    {
        $this->scrollId = $scrollId;
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.item.queryskusbycatid';
    }
}