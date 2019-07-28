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


use Woisks\Tag\Models\Entity\TypeEntity;

/**
 * Class TypeRepository.
 *
 * @package Woisks\Tag\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:32
 */
class TypeRepository
{

    private static $model;


    public function __construct(TypeEntity $type)
    {
        self::$model = $type;
    }

    /**
     * first. 2019/6/14 21:32.
     *
     * @param $type
     *
     * @return mixed
     */
    public function first($type)
    {
        return self::$model->where('type', $type)->first();
    }
}
