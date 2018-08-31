<?php
/**
 * 开普勒批量转换推广链接
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:22
 */

namespace Jd\Kepler\Api\UnionService;


use Jd\Kepler\KeplerBase;

class JdKplOpenCpsConvertKeplerUrl extends KeplerBase
{
    /**
     * 可不传此值，默认14
     * @var string
     */
    protected $sourceEmt;

    /**
     * 联盟ID,media.jd.com的账户管理中查看联盟ID值。
     * @var string
     */
    protected $unionId;

    /**
     * 应用的APPID，media.jd.com，CPS管理--推广管理--APP管理中查找。
     * @var string
     */
    protected $webId;

    /**
     * 商品的skuId，最多支持100个，以英文逗号分隔。  "11302031,6603011"
     * @var string
     */
    protected $skuList;

    /**
     * 传递应用程序的appKey值
     * @var string
     */
    protected $appKey;

    /**
     * 是否呼起京东APP。type:1 呼起京东APP；type:0 不呼起京东APP
     * @var string
     */
    protected $type;

    /**
     * @return mixed
     */
    public function getSourceEmt(): string
    {
        return $this->sourceEmt;
    }

    /**
     * @param mixed $sourceEmt
     */
    public function setSourceEmt($sourceEmt): void
    {
        $this->sourceEmt = $sourceEmt;
    }

    /**
     * @return mixed
     */
    public function getUnionId(): string
    {
        return $this->unionId;
    }

    /**
     * @param mixed $unionId
     */
    public function setUnionId($unionId): void
    {
        $this->unionId = $unionId;
    }

    /**
     * @return mixed
     */
    public function getWebId(): string
    {
        return $this->webId;
    }

    /**
     * @param mixed $webId
     */
    public function setWebId($webId): void
    {
        $this->webId = $webId;
    }

    /**
     * @return mixed
     */
    public function getSkuList(): string
    {
        return $this->skuList;
    }

    /**
     * @param mixed $skuList
     */
    public function setSkuList($skuList): void
    {
        $this->skuList = $skuList;
    }

    /**
     * @return mixed
     */
    public function getAppKey(): string
    {
        return $this->appKey;
    }

    /**
     * @param mixed $appKey
     */
    public function setAppKey($appKey): void
    {
        $this->appKey = $appKey;
    }

    /**
     * @return mixed
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * 初始化数据
     */
    public function initData()
    {
        $this->setSourceEmt('14');
        $this->setType('1');
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kpl.open.cps.convert.keplerurl';
    }

    /**
     * 接口参数组装
     * @return array
     */
    public function getApiParams(): string
    {
        $request = [];
        $property = get_class_vars(get_class($this));
        foreach ($property as $field => $item) {
            if (null !== $this->$field) {
                $request[$field] = $this->$field;
            }
        }
        return json_encode(compact('request'), JSON_UNESCAPED_UNICODE);
    }
}