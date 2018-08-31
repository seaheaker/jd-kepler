<?php
/**
 * 基础
 * User: smallsea
 * Date: 2018/8/27
 * Time: 11:27
 */

namespace Jd\Kepler;


interface KeplerApi
{
    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string;

    /**
     * 接口参数
     * @return string|array|mixed
     */
    public function getApiParams(): string;
}