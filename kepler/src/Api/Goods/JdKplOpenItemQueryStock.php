<?php
/**
 * 查询库存信息
 * User: smallsea
 * Date: 2018/8/31
 * Time: 14:31
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenItemQueryStock extends KeplerBase
{
    /**
     * 商品编号和数量对，例如：SKU1,数量;SKU2,数量
     * @var string
     */
    protected $skus;

    /**
     * 四级地址，“，”分隔
     * @var string
     */
    protected $area;

    /**
     * @return string
     */
    public function getSkus(): string
    {
        return $this->skus;
    }

    /**
     * @param string $skus
     */
    public function setSkus(string $skus): void
    {
        $this->skus = $skus;
    }

    /**
     * @return string
     */
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * @param string $area
     */
    public function setArea(string $area): void
    {
        $this->area = $area;
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.item.querystock";
    }
}