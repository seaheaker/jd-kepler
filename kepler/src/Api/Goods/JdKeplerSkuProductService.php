<?php
/**
 * 商品特殊属性
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:36
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerSkuProductService extends KeplerBase
{
    /**
     *商品编号
     * @var int|int[]
     */
    protected $skuIdSet;

    /**
     * 查询商品特殊属性 全球购：isOverseaPurchase 是否秒杀：isKO 是否预约预售：YuShou
     * @var string|string[]
     */
    protected $extFieldSet;

    /**
     * @return int|int[]
     */
    public function getSkuIdSet()
    {
        return $this->skuIdSet;
    }

    /**
     * @param int|int[] $skuIdSet
     */
    public function setSkuIdSet($skuIdSet): void
    {
        $this->skuIdSet = $skuIdSet;
    }

    /**
     * @return string|string[]
     */
    public function getExtFieldSet()
    {
        return $this->extFieldSet;
    }

    /**
     * @param string|string[] $extFieldSet
     */
    public function setExtFieldSet($extFieldSet): void
    {
        $this->extFieldSet = $extFieldSet;
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.sku.ProductService';
    }
}