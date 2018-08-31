<?php
/**
 * 秒杀接口
 * todo::待完善接口
 * User: smallsea
 * Date: 2018/8/31
 * Time: 15:25
 */

namespace Jd\Kepler\Api\UnionService;


use Jd\Kepler\KeplerBase;

class JdMMiaoShaAreaList extends KeplerBase
{
    /**
     * 客户端版本比如mcoupon
     * @var string
     */
    protected $client;

    /**
     * 分辨率大小
     * @var string
     */
    protected $screen;

    /**
     * 客户端版本
     * @var string
     */
    protected $clientVersion;

    /**
     * 场次id
     * @var string
     */
    protected $gid;

    /**
     * @return string
     */
    public function getClient(): string
    {
        return $this->client;
    }

    /**
     * @param string $client
     */
    public function setClient(string $client): void
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getScreen(): string
    {
        return $this->screen;
    }

    /**
     * @param string $screen
     */
    public function setScreen(string $screen): void
    {
        $this->screen = $screen;
    }

    /**
     * @return string
     */
    public function getClientVersion(): string
    {
        return $this->clientVersion;
    }

    /**
     * @param string $clientVersion
     */
    public function setClientVersion(string $clientVersion): void
    {
        $this->clientVersion = $clientVersion;
    }

    /**
     * @return string
     */
    public function getGid(): string
    {
        return $this->gid;
    }

    /**
     * @param string $gid
     */
    public function setGid(string $gid): void
    {
        $this->gid = $gid;
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.m.miaoShaAreaList";
    }

    /**
     * 接口参数
     * @return string|array|mixed
     */
    public function getApiParams(): string
    {
        $client         = $this->getClient();
        $screen         = $this->getScreen();
        $clientVersion  = $this->getClientVersion();

        $body = [
            'gid' => $this->getGid()
        ];
        return json_encode(compact('client', 'screen', 'clientVersion', 'body'), JSON_UNESCAPED_UNICODE);
    }
}