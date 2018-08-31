<?php
/**
 * 公共
 * User: smallsea
 * Date: 2018/8/31
 * Time: 16:12
 */

namespace Jd\Kepler;


use Jd\Kepler\Exception\HttpException;

trait KeplerUtil
{
    public $connectTimeout = 0;

    public $readTimeout = 0;

    /**
     * 请求地址生成
     * @param $requestParams
     * @return string
     */
    public function createRequestUrl($serverUrl, $requestParams)
    {
        $requestUrl = $serverUrl . "?";
        foreach ($requestParams as $sysParamKey => $sysParamValue) {
            $requestUrl .= "$sysParamKey=" . urlencode($sysParamValue) . "&";
        }
        return $requestUrl;
    }

    /**
     * JSON数据格式化
     * @param $response
     * @return mixed
     */
    public function jsonFormatResponseData($response)
    {
        $responseObject = json_decode($response);
        if (null !== $responseObject) {
            foreach ($responseObject as $propKey => $propValue) {
                $responseObject = $propValue;
            }
        }
        return $responseObject;
    }

    /**
     * CURL发起请求操作
     * @param $url
     * @param null $postFields
     * @return mixed
     * @throws HttpException
     */
    public function curl($url, $postFields = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($this->readTimeout) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
        }
        if ($this->connectTimeout) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        }
        //https 请求
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        if (is_array($postFields) && 0 < count($postFields)) {
            $postBodyString = "";
            $postMultipart = false;
            foreach ($postFields as $k => $v) {
                //判断是不是文件上传,文件上传用multipart/form-data，否则用www-form-urlencoded
                if ("@" != substr($v, 0, 1)) {
                    $postBodyString .= "$k=" . urlencode($v) . "&";
                } else {
                    $postMultipart = true;
                }
            }
            unset($k, $v);
            curl_setopt($ch, CURLOPT_POST, true);
            if ($postMultipart) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString, 0, -1));
            }
        }
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new HttpException(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new HttpException($response, $httpStatusCode);
            }
        }
        curl_close($ch);
        return $response;
    }
}