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

class GetTagService
{
    private $tagRepo;

    public function __construct(TagRepository $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    public function first($tag_id)
    {
        return $this->tagRepo->first($tag_id);
    }

    public function find($tags)
    {
        return $this->tagRepo->find($tags);
    }

}