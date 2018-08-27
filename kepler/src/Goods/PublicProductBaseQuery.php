<?php
/**
 * 商品基本信息查询
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:25
 */

namespace Jd\Kepler\Goods;


use Jd\Kepler\KeplerBase;

class PublicProductBaseQuery extends KeplerBase
{
    protected $areaId;
    protected $sku;

    /**
     * @return mixed
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * @param mixed $areaId
     */
    public function setAreaId($areaId): void
    {
        $this->areaId = $areaId;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param mixed $sku
     */
    public function setSku($sku): void
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