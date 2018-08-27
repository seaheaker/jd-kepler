<?php
/**
 * URL批量转换开普勒推广链接
 * User: smallsea
 * Date: 2018/8/17
 * Time: 15:05
 */

namespace Jd\Kepler\UnionService;


use Jd\Kepler\KeplerBase;

class JdKplOpenBatchConvertCpslink extends KeplerBase
{
    /**
     * 是否唤起APP 1 是 0否
     * @var string
     */
    protected $type;

    /**
     * 批量传入url链接，以逗号进行分隔（支持京东及1号店的首页、商品详情页、频道页、活动页、店铺页）
     * @var string
     */
    protected $urls;

    /**
     * 在开普勒平台创建应用生成的appkey值
     * @var string
     */
    protected $appkey;

    public function initData()
    {
        $this->setType("0");
    }

    /**
     *
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
     * @return mixed
     */
    public function getUrls(): string
    {
        return $this->urls;
    }

    /**
     * @param mixed $urls
     */
    public function setUrls($urls): void
    {
        $this->urls = $urls;
    }

    /**
     * @return mixed
     */
    public function getAppkey(): string
    {
        return $this->appkey;
    }

    /**
     * @param mixed $appkey
     */
    public function setAppkey($appkey): void
    {
        $this->appkey = $appkey;
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kpl.open.batch.convert.cpslink';
    }

    /**
     * 接口参数组装
     * @return array
     */
    public function getApiParams(): string
    {
        $KeplerUrlparam = [];
        $property = get_class_vars(get_class($this));
        foreach ($property as $field => $item) {
            if (null !== $this->$field) {
                $KeplerUrlparam[$field] = $this->$field;
            }
        }
        return json_encode(compact('KeplerUrlparam'), JSON_UNESCAPED_UNICODE);
    }
}