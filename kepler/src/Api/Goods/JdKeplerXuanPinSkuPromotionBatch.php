<?php
/**
 * 批量获取sku推广信息
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:43
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinSkuPromotionBatch extends KeplerBase
{

    /**
     * 批量获取sku推广信息
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
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.xuanpin.sku.promotion.batch';
    }
}