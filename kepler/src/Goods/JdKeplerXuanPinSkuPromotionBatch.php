<?php
/**
 * 批量获取sku推广信息
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:43
 */

namespace Jd\Kepler\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinSkuPromotionBatch extends KeplerBase
{

    protected $skuIds;

    /**
     * @return array
     */
    public function getSkuIds(): array
    {
        return $this->skuIds;
    }

    /**
     * @param array $skuIds
     */
    public function setSkuIds(array $skuIds): void
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