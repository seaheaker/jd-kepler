<?php
/**
 * 校验PID字段是否有效
 * User: smallsea
 * Date: 2018/8/31
 * Time: 15:18
 */

namespace Jd\Kepler\Api\Marketing;

use Jd\Kepler\KeplerBase;

class JdKplOpenPromotionPidValidatePid extends KeplerBase
{
    /**
     * 联盟PID
     * @var string
     */
    protected $pid;

    /**
     * 母账号联盟ID
     * @var int
     */
    protected $unionId;

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
        return "jd.kpl.open.promotion.pid.validatepid";
    }
}