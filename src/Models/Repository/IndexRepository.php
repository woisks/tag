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


use Woisks\Tag\Models\Entity\IndexEntity;

/**
 * Class IndexRepository.
 *
 * @package Woisks\Tag\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:37
 */
class IndexRepository
{

    /**
     * model.  2019/7/28 15:43.
     *
     * @var static IndexEntity
     */
    private static $model;


    /**
     * IndexRepository constructor. 2019/7/28 15:43.
     *
     * @param IndexEntity $typeIndex
     *
     * @return void
     */
    public function __construct(IndexEntity $typeIndex)
    {
        self::$model = $typeIndex;
    }

    /**
     * firstOrCreated. 2019/7/28 15:43.
     *
     * @param $type
     * @param $tag
     *
     * @return mixed
     */
    public function firstOrCreated($type, $tag)
    {
        $db = self::$model->firstOrCreate(['tag' => $tag, 'type' => $type], ['id' => create_numeric_id()]);
        $db->increment('count');
        return $db;
    }

    /**
     * all. 2019/7/28 16:19.
     *
     * @param $type
     *
     * @return mixed
     */
    public function all($type)
    {
        return self::$model->where('type', $type)->paginate();
    }
}
