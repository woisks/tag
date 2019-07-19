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
     * model.  2019/6/14 21:37.
     *
     * @var static \Woisks\Tag\Models\Entity\IndexEntity
     */
    private static $model;

    /**
     * IndexRepository constructor. 2019/6/14 21:37.
     *
     * @param \Woisks\Tag\Models\Entity\IndexEntity $typeIndex
     *
     * @return void
     */
    public function __construct(IndexEntity $typeIndex)
    {
        self::$model = $typeIndex;
    }


    /**
     * firstOrCreated. 2019/7/19 22:05.
     *
     * @param $type_id
     * @param $tag_id
     *
     * @return mixed
     */
    public function firstOrCreated($type_id, $tag_id)
    {
        return self::$model->firstOrCreate(['tag_id' => $tag_id, 'type_id' => $type_id], ['id' => create_numeric_id()]);
    }

}