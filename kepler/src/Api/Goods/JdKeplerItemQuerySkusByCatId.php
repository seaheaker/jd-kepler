<?php
/**
 * 查询三级分类商品
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:32
 */

namespace Jd\Kepler\Api\Goods;

use Jd\Kepler\KeplerBase;

class JdKeplerItemQuerySkusByCatId extends KeplerBase
{
    /**
     * 分类id
     * @var int
     */
    protected $catId;

    /**
     * 游标
     * @var string
     */
    protected $scrollId;

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * @param int $catId
     */
    public function setCatId(int $catId): void
    {
        $this->catId = $catId;
    }

    /**
     * @return string
     */
    public function getScrollId(): string
    {
        return $this->scrollId;
    }

    /**
     * @param string $scrollId
     */
    public function setScrollId(string $scrollId): void
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