<?php
/**
 * 查询分类信息
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:29
 */

namespace Jd\Kepler\Api\Goods;

use Jd\Kepler\KeplerBase;

class JdKeplerItemQueryCategoriesByFid extends KeplerBase
{
    /**
     * 父id，填0获取一级分类
     * @var int
     */
    protected $fid;

    /**
     * @return int
     */
    public function getFid(): int
    {
        return $this->fid;
    }

    /**
     * @param int $fid
     */
    public function setFid(int $fid): void
    {
        $this->fid = $fid;
    }

    /**
     * 接口方法
     * @return string
     */
    public function getApiMethod(): string
    {
        return 'jd.kepler.item.querycategoriesbyfid';
    }
}