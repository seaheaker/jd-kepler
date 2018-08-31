<?php
/**
 * 京东开普勒
 * User: smallsea
 * Date: 2018/8/27
 * Time: 14:18
 */

namespace Jd\Kepler;

use Exception;
use Jd\Kepler\Api\Goods\JdKeplerItemQueryCategoriesByFid;
use Jd\Kepler\Api\Goods\JdKeplerItemQuerySkusByCatId;
use Jd\Kepler\Api\Goods\JdKeplerSkuProductService;
use Jd\Kepler\Api\Goods\JdKeplerXuanPinGetPkgList;
use Jd\Kepler\Api\Goods\JdKeplerXuanPinGetSkuIdList;
use Jd\Kepler\Api\Goods\JdKeplerXuanPinSearchSku;
use Jd\Kepler\Api\Goods\JdKeplerXuanPinSearchSkuByCategory;
use Jd\Kepler\Api\Goods\JdKeplerXuanPinSkuPromotionBatch;
use Jd\Kepler\Api\Goods\JdKplOpenItemFindJoinActives;
use Jd\Kepler\Api\Goods\JdKplOpenItemGetMobileWarestyLeandJsByWareId;
use Jd\Kepler\Api\Goods\JdKplOpenItemGetWarestyLeandJsByWareId;
use Jd\Kepler\Api\Goods\JdKplOpenItemQueryBookBasicField;
use Jd\Kepler\Api\Goods\JdKplOpenItemQueryBookBigField;
use Jd\Kepler\Api\Goods\JdKplOpenItemQueryCommentInfoySkus;
use Jd\Kepler\Api\Goods\JdKplOpenItemQueryStock;
use Jd\Kepler\Api\Goods\JdKplOpenItemQueryThirtyDaySummary;
use Jd\Kepler\Api\Goods\JdKplOpenKeplerQuerySkuDescription;
use Jd\Kepler\Api\Goods\JdKplOpenPromiseDosConfig;
use Jd\Kepler\Api\Goods\JdKplOpenXuanPinSearchGoods;
use Jd\Kepler\Api\Goods\JingDongNewWareMobileBigFieldGet;
use Jd\Kepler\Api\Goods\PublicProductBaseQuery;
use Jd\Kepler\Api\Marketing\JdKplOpenPromotionPidGetPid;
use Jd\Kepler\Api\Marketing\JdKplOpenPromotionPidUrlConvert;
use Jd\Kepler\Api\Marketing\JdKplOpenPromotionPidValidatePid;
use Jd\Kepler\Api\UnionService\JdKeplerOrderGetList;
use Jd\Kepler\Api\UnionService\JdKeplerServicePromotionGoodsInfo;
use Jd\Kepler\Api\UnionService\JdKplOpenBatchConvertCpslink;
use Jd\Kepler\Api\UnionService\JdKplOpenCpsConvertKeplerUrl;
use Jd\Kepler\Api\UnionService\JdKplOpenTradeTencentOrderList;
use Jd\Kepler\Api\UnionService\JdKplOpenUnionServiceQueryCommisions;
use Jd\Kepler\Api\UnionService\JdKplOpenUnionServiceQueryImportOrders;
use Jd\Kepler\Api\UnionService\JdMMiaoShaAreaList;

class Kepler
{
    use KeplerUtil;

    private $appKey;

    private $appSecret;

    private $accessToken;

    private $version;

    private $format;

    private $signMethod;

    private $paramJson;

    private $serverUrl;

    /**
     * 接口类表
     * @var array
     */
    public $classMap = [
        'jd.kepler.item.querycategoriesbyfid'               => JdKeplerItemQueryCategoriesByFid::class,
        'jd.kepler.item.queryskusbycatid'                   => JdKeplerItemQuerySkusByCatId::class,
        'jd.kepler.sku.ProductService'                      => JdKeplerSkuProductService::class,
        'jd.kepler.xuanpin.getpkglist'                      => JdKeplerXuanPinGetPkgList::class,
        'jd.kepler.xuanpin.getskuidlist'                    => JdKeplerXuanPinGetSkuIdList::class,
        'jd.kepler.xuanpin.search.sku'                      => JdKeplerXuanPinSearchSku::class,
        'jd.kepler.xuanpin.search.sku.by.category'          => JdKeplerXuanPinSearchSkuByCategory::class,
        'jd.kepler.xuanpin.sku.promotion.batch'             => JdKeplerXuanPinSkuPromotionBatch::class,
        'jd.kpl.open.item.findjoinactives'                  => JdKplOpenItemFindJoinActives::class,
        'jd.kpl.open.item.getmobilewarestyleandjsbywareid'  => JdKplOpenItemGetMobileWarestyLeandJsByWareId::class,
        'jd.kpl.open.item.getwarestyleandjsbywareid'        => JdKplOpenItemGetWarestyLeandJsByWareId::class,
        'jd.kpl.open.item.querybookbasicfield'              => JdKplOpenItemQueryBookBasicField::class,
        'jd.kpl.open.item.querybookbigfield'                => JdKplOpenItemQueryBookBigField::class,
        'jd.kpl.open.item.querycommentinfoyskus'            => JdKplOpenItemQueryCommentInfoySkus::class,
        'jd.kpl.open.item.querystock'                       => JdKplOpenItemQueryStock::class,
        'jd.kpl.open.item.querythirtydaysummary'            => JdKplOpenItemQueryThirtyDaySummary::class,
        'jd.kpl.open.kepler.query.skudescription'           => JdKplOpenKeplerQuerySkuDescription::class,
        'jd.kpl.open.promise.dos.config'                    => JdKplOpenPromiseDosConfig::class,
        'jd.kpl.open.xuanpin.searchgoods'                   => JdKplOpenXuanPinSearchGoods::class,
        'jingdong.new.ware.mobilebigfield.get'              => JingDongNewWareMobileBigFieldGet::class,
        'public.product.base.query'                         => PublicProductBaseQuery::class,
        'jd.kpl.open.promotion.pid.getpid'                  => JdKplOpenPromotionPidGetPid::class,
        'jd.kpl.open.promotion.pidurlconvert'               => JdKplOpenPromotionPidUrlConvert::class,
        'jd.kpl.open.promotion.pid.validatepid'             => JdKplOpenPromotionPidValidatePid::class,
        'jd.kepler.order.getlist'                           => JdKeplerOrderGetList::class,
        'jd.kepler.service.promotion.goodsinfo'             => JdKeplerServicePromotionGoodsInfo::class,
        'jd.kpl.open.batch.convert.cpslink'                 => JdKplOpenBatchConvertCpslink::class,
        'jd.kpl.open.cps.convert.keplerurl'                 => JdKplOpenCpsConvertKeplerUrl::class,
        'jd.kpl.open.trade.tencent.orderlist'               => JdKplOpenTradeTencentOrderList::class,
        'jd.kpl.open.unionservice.queryCommisions'          => JdKplOpenUnionServiceQueryCommisions::class,
        'jd.kpl.open.unionservice.queryimportorders'        => JdKplOpenUnionServiceQueryImportOrders::class,
        'jd.m.miaoShaAreaList'                              => JdMMiaoShaAreaList::class

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

        //初始化以下数据
        $this->version = '2.0';
        $this->format = 'json';
        $this->signMethod = 'md5';
        $this->paramJson = 'param_json';

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
     * 系统必要参数
     * @param $apiMethod
     * @param null $accessToken
     * @return mixed
     */
    private function systemParams($apiMethod, $apiVersion = null, $accessToken = null)
    {
        //组装必要的数据
        $params['app_key'] = $this->appKey;
        $params['timestamp'] = date('Y-m-d H:i:s');
        $params['format'] = $this->format;
        $params['v'] = null == $apiVersion ? $this->version : $apiVersion;
        $params['sign_method'] = $this->signMethod;
        $params['access_token'] = null == $accessToken ? $this->accessToken : $accessToken;
        $params['method'] = $apiMethod;
        return $params;
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

            $requestUrl = $this->createRequestUrl($this->serverUrl, $requestParams);
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