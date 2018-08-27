<?php
/**
 * 查询分类信息
 * User: smallsea
 * Date: 2018/8/17
 * Time: 17:29
 */

namespace Jd\Kepler\Goods;

use Jd\Kepler\KeplerBase;

class JdKeplerItemQueryCategoriesByFid extends KeplerBase
{
    protected $fid;

    /**
     * 分类ID
     * @return mixed
     */
    public function getFid()
    {
        return $this->fid;
    }

    /**
     * 分类ID
     * @param mixed $fid
     */
    public function setFid($fid): void
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