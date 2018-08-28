<?php
/**
 * 对外
 * User: smallsea
 * Date: 2018/8/27
 * Time: 14:18
 */

namespace Jd\Kepler;


use Exception;
use Jd\Kepler\Goods\JdKeplerItemQueryCategoriesByFid;
use Jd\Kepler\Goods\JdKeplerXuanPinSearchSku;
use Jd\Kepler\Goods\JdKplOpenItemQueryCommentInfoySkus;
use Jd\Kepler\Goods\JingDongNewWareMobileBigFieldGet;
use Jd\Kepler\Goods\PublicProductBaseQuery;
use Jd\Kepler\UnionService\JdKeplerOrderGetList;
use Jd\Kepler\UnionService\JdKeplerServicePromotionGoodsInfo;
use Jd\Kepler\UnionService\JdKplOpenBatchConvertCpslink;
use Jd\Kepler\UnionService\JdKplOpenCpsConvertKeplerUrl;
use Jd\Kepler\UnionService\JdKplOpenUnionServiceQueryCommisions;
use Jd\Kepler\UnionService\JdKplOpenUnionServiceQueryImportOrders;

class Kepler
{
    private $appKey;

    private $appSecret;

    private $accessToken;

    private $version = "2.0";

    private $format = "json";

    private $signMethod = 'md5';

    private $paramJson = 'param_json';

    private $serverUrl;

    private $connectTimeout = 0;

    private $readTimeout = 0;

    public $classMap = [
        'jd.kepler.item.querycategoriesbyfid'           => JdKeplerItemQueryCategoriesByFid::class,
        'jd.kepler.xuanpin.search.sku'                  => JdKeplerXuanPinSearchSku::class,
        'jd.kepler.service.promotion.goodsinfo'         => JdKeplerServicePromotionGoodsInfo::class,
        'jd.kpl.open.batch.convert.cpslink'             => JdKplOpenBatchConvertCpslink::class,
        'jd.kepler.order.getlist'                       => JdKeplerOrderGetList::class,
        'jd.kpl.open.unionservice.queryimportorders'    => JdKplOpenUnionServiceQueryImportOrders::class,
        'jd.kpl.open.unionservice.queryCommisions'      => JdKplOpenUnionServiceQueryCommisions::class,
        'jd.kpl.open.cps.convert.keplerurl'             => JdKplOpenCpsConvertKeplerUrl::class,
        'jd.kpl.open.item.querycommentinfoyskus'        => JdKplOpenItemQueryCommentInfoySkus::class,
        'public.product.base.query'                     => PublicProductBaseQuery::class,
        'jingdong.new.ware.mobilebigfield.get'          => JingDongNewWareMobileBigFieldGet::class
    ];

    public function __construct(array $config = [])
    {
        //初始化数据
        $this->initData($config);
    }

    /**
     * 初始化配置参数
     * @param $config
     */
    private function initData($config)
    {
        foreach ($config as $field => $item) {
            $this->$field = $item;
        }
    }

    /**
     * 签名生成
     * @param $params
     * @return string
     */
    protected function generateSign($params)
    {
        ksort($params);
        $stringToBeSigned = $this->appSecret;
        foreach ($params as $k => $v) {
            if ("@" != substr($v, 0, 1)) {
                $stringToBeSigned .= "$k$v";
            }
        }
        unset($k, $v);
        $stringToBeSigned .= $this->appSecret;
        return strtoupper(md5($stringToBeSigned));
    }

    /**
     * 发起请求
     * @param $url
     * @param null $postFields
     * @return mixed
     * @throws Exception
     */
    private function curl($url, $postFields = null)
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
            throw new Exception(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new Exception($response, $httpStatusCode);
            }
        }
        curl_close($ch);
        return $response;
    }

    /**
     * 系统必要参数
     * @param $apiMethod
     * @param null $accessToken
     * @return mixed
     */
    private function systemParams($apiMethod, $apiVersion = null, $accessToken = null)
    {
        //组装必要的数据
        $params['app_key']      = $this->appKey;
        $params['timestamp']    = date('Y-m-d H:i:s');
        $params['format']       = $this->format;
        $params['v']            = null== $apiVersion ? $this->version : $apiVersion;
        $params['sign_method']  = $this->signMethod;
        $params['access_token'] = null == $accessToken ? $this->accessToken : $accessToken;
        $params['method']       = $apiMethod;
        return $params;
    }

    /**
     * 请求地址生成
     * @param $requestParams
     * @return string
     */
    private function createRequestUrl($requestParams)
    {
        $requestUrl = $this->serverUrl . "?";
        foreach ($requestParams as $sysParamKey => $sysParamValue) {
            $requestUrl .= "$sysParamKey=" . urlencode($sysParamValue) . "&";
        }
        return $requestUrl;
    }

    /**
     * 获取对象
     * @param $api_method
     * @return object|null
     */
    public function createObject($api_method)
    {
        if (!isset($this->classMap[$api_method])) {
            return NULL;
        }

        $object = new $this->classMap[$api_method]();
        return $object ? $object : NULL;
    }

    /**
     * JSON数据格式化
     * @param $response
     * @return mixed
     */
    private function jsonFormatResponseData($response)
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
     * 获取数据相关操作
     * @param Object $apiObject
     * @param string $accessToken
     * @return object|array|mixed
     */
    public function execute($apiObject, $accessToken = null)
    {
        //发起HTTP请求
        try {
            //组装系统必要参数
            $requestParams = $this->systemParams($apiObject->getApiMethod(), $apiObject->getVersion(), $accessToken);

            //组装API业务参数
            $apiParams = $apiObject->getApiParams();
            $requestParams[$this->paramJson] = $apiParams;

            //生成签名
            $sign = $this->generateSign($requestParams);
            $requestParams['sign'] = $sign;

            $requestUrl = $this->createRequestUrl($requestParams);
            $response = $this->curl($requestUrl, $apiParams);

            //解析数据
            $formatMethod = "{$this->format}FormatResponseData";
            $data = $this->$formatMethod($response);
            if (null == $data || !property_exists($data, 'code')) {
                throw new Exception('接口无返回数据');
            }

            if ($data->code != 0) {
                throw new Exception($data->searchMsg);
            }
            return $data;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}