<?php
/**
 * 查询商品介绍接口
 * User: smallsea
 * Date: 2018/8/31
 * Time: 14:36
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenKeplerQuerySkuDescription extends KeplerBase
{
    /**
     * 查询的skuids
     * @var int|int[]
     */
    protected $skuIds;

    /**
     * @return int|int[]
     */
    public function getSkuIds()
    {
        return $this->skuIds;
    }

    /**
     * @param int|int[] $skuIds
     */
    public function setSkuIds($skuIds): void
    {
        $this->skuIds = $skuIds;
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.kepler.query.skudescription";
    }
}