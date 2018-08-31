<?php
/**
 * 获取PID接口
 * User: smallsea
 * Date: 2018/8/31
 * Time: 15:13
 */

namespace Jd\Kepler\Api\Marketing;


use Jd\Kepler\KeplerBase;

class JdKplOpenPromotionPidGetPid extends KeplerBase
{
    /**
     * 母账号的联盟ID
     * @var int
     */
    protected $unionId;

    /**
     * 子账号的联盟ID
     * @var int
     */
    protected $sonUnionId;

    /**
     * 子联盟账号的应用名称(如果是APP推广，应用名称必传)
     * @var string
     */
    protected $mediaName;

    /**
     * 推广方式：1(APP推广) 2(聊天工具推广)
     * @var int
     */
    protected $promotionType;

    /**
     * 推广位名称(非必填，如果需要生成多个PID则需要填写推广位名称)
     * @var string
     */
    protected $positionName;

    /**
     * @return int
     */
    public function getUnionId(): int
    {
        return $this->unionId;
    }

    /**
     * @param int $unionId
     */
    public function setUnionId(int $unionId): void
    {
        $this->unionId = $unionId;
    }

    /**
     * @return int
     */
    public function getSonUnionId(): int
    {
        return $this->sonUnionId;
    }

    /**
     * @param int $sonUnionId
     */
    public function setSonUnionId(int $sonUnionId): void
    {
        $this->sonUnionId = $sonUnionId;
    }

    /**
     * @return string
     */
    public function getMediaName(): string
    {
        return $this->mediaName;
    }

    /**
     * @param string $mediaName
     */
    public function setMediaName(string $mediaName): void
    {
        $this->mediaName = $mediaName;
    }

    /**
     * @return int
     */
    public function getPromotionType(): int
    {
        return $this->promotionType;
    }

    /**
     * @param int $promotionType
     */
    public function setPromotionType(int $promotionType): void
    {
        $this->promotionType = $promotionType;
    }

    /**
     * @return string
     */
    public function getPositionName(): string
    {
        return $this->positionName;
    }

    /**
     * @param string $positionName
     */
    public function setPositionName(string $positionName): void
    {
        $this->positionName = $positionName;
    }

    /**
     * 初始化数据
     */
    public function initData()
    {
        $this->setVersion('2.0');
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.promotion.pid.getpid";
    }
}