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


use Woisks\Tag\Models\Entity\CountEntity;

/**
 * Class CountRepository.
 *
 * @package Woisks\Tag\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:32
 */
class CountRepository
{
    /**
     * model.  2019/6/14 21:32.
     *
     * @var static \Woisks\Tag\Models\Entity\CountEntity
     */
    private static $model;

    /**
     * CountRepository constructor. 2019/6/14 21:32.
     *
     * @param \Woisks\Tag\Models\Entity\CountEntity $typeCount
     *
     * @return void
     */
    public function __construct(CountEntity $typeCount)
    {
        self::$model = $typeCount;
    }

    /**
     * firstOrCreated. 2019/6/14 21:32.
     *
     * @param $type
     *
     * @return mixed
     */
    public function firstOrCreated($type)
    {
        $db = self::$model->firstOrCreate(['name' => $type], ['id' => create_numeric_id()]);

        $db->increment('count', 1);


        return $db;
    }
}