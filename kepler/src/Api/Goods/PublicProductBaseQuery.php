<?php
/**
 * 商品基本信息查询
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:25
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class PublicProductBaseQuery extends KeplerBase
{
    /**
     * 地区，格式1_72_2799_0
     * @var string
     */
    protected $areaId;

    /**
     * 商品编号
     * @var int
     */
    protected $sku;

    /**
     * @return string
     */
    public function getAreaId(): string
    {
        return $this->areaId;
    }

    /**
     * @param string $areaId
     */
    public function setAreaId(string $areaId): void
    {
        $this->areaId = $areaId;
    }

    /**
     * @return int
     */
    public function getSku(): int
    {
        return $this->sku;
    }

    /**
     * @param int $sku
     */
    public function setSku(int $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'public.product.base.query';
    }
}