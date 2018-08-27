<?php
/**
 * 商品特殊属性
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:36
 */

namespace Jd\Kepler\Goods;


use App\Extend\JdKepler\JdApiInterface;

class JdKeplerSkuProductService implements JdApiInterface
{
    protected $version;

    protected $skuIdSet;

    protected $extFieldSet;

    /**
     * 接口版本
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version ? $this->version : '1.0';
    }

    /**
     * 接口版本
     * @param mixed $version
     */
    public function setVersion($version): void
    {
        $this->version = $version;
    }

    /**
     * 商品编号
     * @return mixed
     */
    public function getSkuIdSet()
    {
        return $this->skuIdSet;
    }

    /**
     * 商品编号
     * @param mixed $skuIdSet
     */
    public function setSkuIdSet($skuIdSet): void
    {
        $this->skuIdSet = $skuIdSet;
    }

    /**
     * 查询商品特殊属性 全球购：isOverseaPurchase 是否秒杀：isKO 是否预约预售：YuShou
     * @return mixed
     */
    public function getExtFieldSet()
    {
        return $this->extFieldSet;
    }

    /**
     * 查询商品特殊属性 全球购：isOverseaPurchase 是否秒杀：isKO 是否预约预售：YuShou
     * @param mixed $extFieldSet
     */
    public function setExtFieldSet($extFieldSet): void
    {
        $this->extFieldSet = $extFieldSet;
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod()
    {
        return 'jd.kepler.sku.ProductService';
    }

    public function getApiParams()
    {
        $queryParams = [];
        $property = get_class_vars(JdKeplerSkuProductService::class);
        foreach ($property as $field => $item) {
            if ($field == 'version')
                continue;

            if (null !== $this->$field) {
                $queryParams[$field] = $this->$field;
            }
        }
        return json_encode($queryParams, JSON_UNESCAPED_UNICODE);
    }
}