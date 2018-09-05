<?php
/**
 * 查询商品关联优惠券（含券总数和已发数量）
 * User: smallsea
 * Date: 2018/8/31
 * Time: 14:38
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKplOpenItemFindJoinActives extends KeplerBase
{
    /**
     * 用户id
     * @var string
     */
    protected $uid;

    /**
     * 商品编号
     * @var int
     */
    protected $sku;

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     */
    public function setUid(string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * @return int
     */
    public function getSku(): int
    {
        return $this->sku;
    }

    /**
     * @param int $sku
     */
    public function setSku(int $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * 初始化数据
     */
    protected function initData()
    {
        parent::initData();
        $this->setVersion('2.0');
    }


    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kpl.open.item.findjoinactives";
    }
}