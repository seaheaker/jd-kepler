<?php
/**
 * 中小件生鲜接口
 * todo::待优化接口
 * User: smallsea
 * Date: 2018/8/31
 * Time: 14:43
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenPromiseDosConfig extends KeplerBase
{
    /**
     * 请求来源（kepler）
     * @var string
     */
    protected $source;

    /**
     * 用户pin，传当前时间戳（毫秒）
     * @var string
     */
    protected $userPin;

    /**
     * 省份ID
     * @var int
     */
    protected $provinceId;

    /**
     * 城市ID
     * @var int
     */
    protected $cityId;

    /**
     * 县ID（ > 0 ）
     * @var int
     */
    protected $countyId;

    /**
     * 城镇ID（ >= 0 。为零表示此级地址为空，取第三级地址）
     * @var int
     */
    protected $townId;

    /**
     * 商品编号
     * @var int
     */
    protected $sku;

    /**
     * 商家类型
     * @var int
     */
    protected $venderType;

    /**
     * 冷链标记,1：控温（10 -18℃） 2：冷藏（0-8 ℃） 3：冷冻（零下12- 零下18 ℃） 4：深冷（零下30 ℃ ） 0或null：未设置
     * @var int
     */
    protected $storeProperty;

    /**
     * 结果的二进制形式的不同位表示sku不同的标识
     * @var int
     */
    protected $skuMark;

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getUserPin(): string
    {
        return $this->userPin;
    }

    /**
     * @param string $userPin
     */
    public function setUserPin(string $userPin): void
    {
        $this->userPin = $userPin;
    }

    /**
     * @return int
     */
    public function getProvinceId(): int
    {
        return $this->provinceId;
    }

    /**
     * @param int $provinceId
     */
    public function setProvinceId(int $provinceId): void
    {
        $this->provinceId = $provinceId;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * @param int $cityId
     */
    public function setCityId(int $cityId): void
    {
        $this->cityId = $cityId;
    }

    /**
     * @return int
     */
    public function getCountyId(): int
    {
        return $this->countyId;
    }

    /**
     * @param int $countyId
     */
    public function setCountyId(int $countyId): void
    {
        $this->countyId = $countyId;
    }

    /**
     * @return int
     */
    public function getTownId(): int
    {
        return $this->townId;
    }

    /**
     * @param int $townId
     */
    public function setTownId(int $townId): void
    {
        $this->townId = $townId;
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
     * @return int
     */
    public function getVenderType(): int
    {
        return $this->venderType;
    }

    /**
     * @param int $venderType
     */
    public function setVenderType(int $venderType): void
    {
        $this->venderType = $venderType;
    }

    /**
     * @return int
     */
    public function getStoreProperty(): int
    {
        return $this->storeProperty;
    }

    /**
     * @param int $storeProperty
     */
    public function setStoreProperty(int $storeProperty): void
    {
        $this->storeProperty = $storeProperty;
    }

    /**
     * @return int
     */
    public function getSkuMark(): int
    {
        return $this->skuMark;
    }

    /**
     * @param int $skuMark
     */
    public function setSkuMark(int $skuMark): void
    {
        $this->skuMark = $skuMark;
    }

    /**
     * 初始化数据
     */
    public function initData()
    {
        parent::initData();

        $this->setSource('kepler');
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.promise.dos.config";
    }

    /**
     * 接口参数
     * @return string|array|mixed
     */
    public function getApiParams(): string
    {
        $req = [];

        $skuProperties = [
            'sku'           => $this->getSku(),
            'storeProperty' => $this->getStoreProperty(),
        ];

        if (!empty($this->getSkuMark())) {
            $skuProperties['skuMark'] = $this->getSkuMark();
        }

        if (!empty($this->getVenderType())) {
            $skuProperties['venderType'] = $this->getVenderType();
        }

        $property = get_class_vars(get_class($this));
        unset($property['venderType'], $property['skuMark']);
        foreach ($property as $field => $item) {
            if (isset($skuProperties[$field]))
                continue;

            if (null !== $this->$field) {
                $req[$field] = $this->$field;
            }
        }
        $req['skuProperties'] = $skuProperties;
        return json_encode(compact('req'), JSON_UNESCAPED_UNICODE);
    }
}