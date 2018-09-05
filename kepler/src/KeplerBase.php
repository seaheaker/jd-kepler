<?php
/**
 * 基类
 * User: smallsea
 * Date: 2018/8/27
 * Time: 11:29
 */

namespace Jd\Kepler;


class KeplerBase implements KeplerApi
{

    /**
     * @var string API版本号
     */
    protected $version;

    public function __construct()
    {
        //初始化数据
        $this->initData();
    }

    /**
     * 初始化数据
     */
    protected function initData()
    {
        $this->setVersion('1.0');
    }

    /**
     * API版本号
     * @return mixed
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * 设置API版本号
     * @param mixed $version
     */
    public function setVersion($version): void
    {
        $this->version = $version;
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "";
    }

    /**
     * 接口参数
     * @return string|array|mixed
     */
    public function getApiParams(): string
    {
        $apiParams = [];
        $property = get_class_vars(get_class($this));

        //删除不必要的属性
        if (isset($property['version']))
            unset($property['version']);

        foreach ($property as $field => $item) {
            if (null !== $this->$field || !empty($this->$field)) {
                $apiParams[$field] = $this->$field;
            }
        }
        return json_encode($apiParams, JSON_UNESCAPED_UNICODE);
    }
}