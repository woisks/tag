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
     * exists. 2019/8/4 20:10.
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
     * name. 2019/8/4 20:09.
     *
     * @param $tag_id
     *
     * @return mixed|null
     */
    public static function name($tag_id)
    {
        $db = TagEntity::where('id', $tag_id)->first();
        if (!$db) {
            return null;
        }
        return $db->name;
    }
}
