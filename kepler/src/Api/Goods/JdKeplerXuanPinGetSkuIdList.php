<?php
/**
 * 查询包内商品接口
 * User: smallsea
 * Date: 2018/8/31
 * Time: 14:18
 */

namespace Jd\Kepler\Api\Goods;


use Jd\Kepler\KeplerBase;

class JdKeplerXuanPinGetSkuIdList extends KeplerBase
{
    /**
     * 包id
     * @var int
     */
    protected $pkgId;

    /**
     * 请求页数
     * @var int
     */
    protected $pageNo;

    /**
     * 分页大小(最大100,超过100数据空)
     * @var int
     */
    protected $pageSize;

    /**
     * @return int
     */
    public function getPkgId(): int
    {
        return $this->pkgId;
    }

    /**
     * @param int $pkgId
     */
    public function setPkgId(int $pkgId): void
    {
        $this->pkgId = $pkgId;
    }

    /**
     * @return int
     */
    public function getPageNo(): int
    {
        return $this->pageNo;
    }

    /**
     * @param int $pageNo
     */
    public function setPageNo(int $pageNo): void
    {
        $this->pageNo = $pageNo;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    /**
     * 初始化数据
     */
    public function initData()
    {
        $this->setPageNo(1);
        $this->setPageSize(40);
    }

    /**
     * 接口方法
     * @return string|array|mixed
     */
    public function getApiMethod(): string
    {
        return "jd.kepler.xuanpin.getskuidlist";
    }
}