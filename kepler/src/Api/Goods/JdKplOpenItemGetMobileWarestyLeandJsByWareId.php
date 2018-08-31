<?php
/**
 * 获取移动端样式
 * User: smallsea
 * Date: 2018/8/29
 * Time: 14:40
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenItemGetMobileWarestyLeandJsByWareId extends KeplerBase
{
    /**
     * 商品编号
     * @var string
     */
    protected $sku;

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.item.getmobilewarestyleandjsbywareid";
    }
}