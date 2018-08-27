<?php
/**
 * 获取推广商品信息接口
 * User: smallsea
 * Date: 2018/8/17
 * Time: 14:44
 */

namespace Jd\Kepler\UnionService;


use Jd\Kepler\KeplerBase;

class JdKeplerServicePromotionGoodsInfo extends KeplerBase
{
    /**
     * 商品编号,支持同时查询100个sku;使用,进行隔开
     * @var string
     */
    protected $skuIds;

    /**
     * 商品编号
     * @return mixed
     */
    public function getSkuIds(): string
    {
        return $this->skuIds;
    }

    /**
     * 设置商品编号
     * @param mixed $skuIds
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
        return 'jd.kepler.service.promotion.goodsinfo';
    }
}