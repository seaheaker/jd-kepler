<?php
/**
 * 查询图书大字段
 * User: smallsea
 * Date: 2018/8/31
 * Time: 15:01
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenItemQueryBookBigField extends KeplerBase
{
    /**
     *    商品id，英文逗号分隔，最多100个
     * @var string
     */
    protected $skus;

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
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.item.querybookbigfield";
    }
}