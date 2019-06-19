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

namespace Woisks\Tag\Models\Repository;


use Woisks\Tag\Models\Entity\TagEntity;

/**
 * Class TagRepository.
 *
 * @package Woisks\Tag\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:28
 */
class TagRepository
{
    /**
     * model.  2019/6/14 21:28.
     *
     * @var static \Woisks\Tag\Models\Entity\TagEntity
     */
    private static $model;

    /**
     * TagRepository constructor. 2019/6/14 21:28.
     *
     * @param \Woisks\Tag\Models\Entity\TagEntity $tag
     *
     * @return void
     */
    public function __construct(TagEntity $tag)
    {
        self::$model = $tag;
    }

    /**
     * firstOrCreated. 2019/6/14 21:28.
     *
     * @param $tag
     *
     * @return mixed
     */
    public function firstOrCreated($tag)
    {
        $db = self::$model->firstOrCreate(['name' => $tag], ['id' => create_numeric_id()]);

        $db->increment('count', 1);

        return $db;
    }

    /**
     * first. 2019/6/19 11:05.
     *
     * @param $tag_id
     *
     * @return mixed
     */
    public function first($tag_id)
    {
        return self::$model->where('id', $tag_id)->first();
    }

    /**
     * find. 2019/6/19 11:05.
     *
     * @param $tags
     *
     * @return mixed
     */
    public function find($tags)
    {
        return self::$model->find($tags);

    }
}