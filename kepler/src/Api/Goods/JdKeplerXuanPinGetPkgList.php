<?php
/**
 * 查询商品包编号接口
 * User: smallsea
 * Date: 2018/8/31
 * Time: 14:29
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinGetPkgList extends KeplerBase
{
    /**
     * 模式参数（0为导购模式、1为买断模式、2为入驻模式）
     * @var int
     */
    protected $mode;

    /**
     * @return int
     */
    public function getMode(): int
    {
        return $this->mode;
    }

    /**
     * @param int $mode
     */
    public function setMode(int $mode): void
    {
        $this->mode = $mode;
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.xuanpin.getpkglist';
    }
}