<?php

declare(strict_types=1);

/*
 * +----------------------------------------------------------------------+
 * |                   At all timesI love the moment                      |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2019 www.Woisk.com All rights reserved.                |
 * +----------------------------------------------------------------------+
 * |  Author:  Maple Grove  <bolelin@126.com>   QQ:364956690   286013629  |
 * +----------------------------------------------------------------------+
 */

namespace Woisks\Tag\Models\Services;


use Woisks\Tag\Models\Repository\TagRepository;

/**
 * Class GetTagService.
 *
 * @package Woisks\Tag\Models\Services
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 22:53
 */
class GetTagService
{
    /**
     * tagRepo.  2019/7/19 22:53.
     *
     * @var  \Woisks\Tag\Models\Repository\TagRepository
     */
    private $tagRepo;

    /**
     * GetTagService constructor. 2019/7/19 22:53.
     *
     * @param \Woisks\Tag\Models\Repository\TagRepository $tagRepo
     *
     * @return void
     */
    public function __construct(TagRepository $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    /**
     * first. 2019/7/19 22:53.
     *
     * @param $tag_id
     *
     * @return mixed
     */
    public function first($tag_id)
    {
        return $this->tagRepo->first($tag_id);
    }

    /**
     * find. 2019/7/19 22:53.
     *
     * @param $tags
     *
     * @return mixed
     */
    public function find($tags)
    {
        return $this->tagRepo->find($tags);
    }

}