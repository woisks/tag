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


use Woisks\Tag\Models\Entity\TagEntity;

/**
 * Class TagServices.
 *
 * @package Woisks\Tag\Models\Services
 *
 * @Author Maple Grove  <bolelin@126.com> 2019/8/3 21:53
 */
class TagServices
{

    /**
     * exists. 2019/8/3 21:53.
     *
     * @param $tag_id
     *
     * @return mixed
     */
    public static function exists($tag_id)
    {
        return TagEntity::where('id', $tag_id)->exists();
    }


    /**
     * find. 2019/8/3 21:58.
     *
     * @param $tags
     *
     * @return mixed
     */
    public static function find($tags)
    {
        $db = TagEntity::find($tags);
        if ($db->isEmpty()) {
            return null;
        }

        return $db;
    }
}
