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

namespace Woisks\Tag\Models\Entity;


/**
 * Class CountEntity.
 *
 * @package Woisks\Tag\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:12
 */
class CountEntity extends Models
{
    /**
     * table.  2019/6/14 21:12.
     *
     * @var  string
     */
    protected $table = 'tag_type_count';
    /**
     * fillable.  2019/6/14 21:12.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'name',
        'count',
        'readme',
        'status'
    ];
    /**
     * timestamps.  2019/6/14 21:12.
     *
     * @var  bool
     */
    public $timestamps = false;
}