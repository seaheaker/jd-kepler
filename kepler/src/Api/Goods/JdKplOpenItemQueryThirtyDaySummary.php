<?php
/**
 * 近30日销量
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:53
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenItemQueryThirtyDaySummary extends KeplerBase
{
    /**
     * 商品id
     * @var int
     */
    protected $sku;

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
        return 'jd.kpl.open.item.querythirtydaysummary';
    }
}