<?php
/**
 * 评论信息列表
 * User: smallsea
 * Date: 2018/8/28
 * Time: 12:54
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenItemQueryCommentInfoySkus extends KeplerBase
{
    /**
     * 多个sku，逗号分隔
     * @var string
     */
    protected $skus;

    /**
     * @return string
     */
    public function getSkus(): string
    {
        return $this->skus;
    }

    /**
     * @param string $skus
     */
    public function setSkus(string $skus): void
    {
        $this->skus = $skus;
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.item.querycommentinfoyskus";
    }
}