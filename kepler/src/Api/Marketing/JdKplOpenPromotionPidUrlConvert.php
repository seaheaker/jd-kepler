<?php
/**
 * 开普勒推广链接转换接口
 * User: smallsea
 * Date: 2018/8/30
 * Time: 16:32
 */

namespace Jd\Kepler\Api\Marketing;


use Jd\Kepler\KeplerBase;

class JdKplOpenPromotionPidUrlConvert extends KeplerBase
{
    /**
     * App平台需传值，请访问京东联盟media.jd.com，推广管理--APP管理中查找AppId。小程序或微信公众号等非APP端可传0.
     * @var string
     */
    protected $webId;

    /**
     * 默认传0
     * @var int
     */
    protected $positionId;

    /**
     * 需要转换的落地页url
     * @var string
     */
    protected $materalId;

    /**
     * pid（可不传，此字段需要向联盟申请账号权限）
     * @var string
     */
    protected $pid;

    /**
     * 自定义信息，支持数字，字母，下划线，不支持中文及其他符号（需要向运营人员申请后才可使用）
     * @var string
     */
    protected $subUnionId;

    /**
     * 传1表示返回短链接，传0表示返回长链接
     * @var string
     */
    protected $shortUrl;

    /**
     * 传1为联盟格式链接，默认不传为开普勒格式链接
     * @var string
     */
    protected $kplClick;

    /**
     * @return string
     */
    public function getWebId(): string
    {
        return $this->webId;
    }

    /**
     * @param string $webId
     */
    public function setWebId(string $webId): void
    {
        $this->webId = $webId;
    }

    /**
     * @return int
     */
    public function getPositionId(): int
    {
        return $this->positionId;
    }

    /**
     * @param string $positionId
     */
    public function setPositionId(int $positionId): void
    {
        $this->positionId = $positionId;
    }

    /**
     * @return string
     */
    public function getMateralId(): string
    {
        return $this->materalId;
    }

    /**
     * @param string $materalId
     */
    public function setMateralId(string $materalId): void
    {
        $this->materalId = $materalId;
    }

    /**
     * @return string
     */
    public function getPid(): string
    {
        return $this->pid;
    }

    /**
     * @param string $pid
     */
    public function setPid(string $pid): void
    {
        $this->pid = $pid;
    }

    /**
     * @return string
     */
    public function getSubUnionId(): string
    {
        return $this->subUnionId;
    }

    /**
     * @param string $subUnionId
     */
    public function setSubUnionId(string $subUnionId): void
    {
        $this->subUnionId = $subUnionId;
    }

    /**
     * @return string
     */
    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }

    /**
     * @param string $shortUrl
     */
    public function setShortUrl(string $shortUrl): void
    {
        $this->shortUrl = $shortUrl;
    }

    /**
     * @return string
     */
    public function getKplClick(): string
    {
        return $this->kplClick;
    }

    /**
     * @param string $kplClick
     */
    public function setKplClick(string $kplClick): void
    {
        $this->kplClick = $kplClick;
    }

    /**
     * 初始化数据
     */
    public function initData()
    {
        parent::initData();

        $this->setPositionId(0);
        $this->setVersion("2.0");
        $this->setShortUrl("1");
        $this->setKplClick("1");
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.promotion.pidurlconvert";
    }
}