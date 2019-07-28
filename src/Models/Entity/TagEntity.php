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
 * Class TagEntity.
 *
 * @package Woisks\Tag\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:10
 */
class TagEntity extends Models
{
    /**
     * table.  2019/6/14 21:10.
     *
     * @var  string
     */
    protected $table = 'tag';
    /**
     * fillable.  2019/6/14 21:10.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'name',
        'count',
        'status',
        'is_root',
        'is_alias',
        'is_locking'
    ];

    /**
     * hidden.  2019/7/19 22:25.
     *
     * @var  array
     */
    protected $hidden = [
        'status',
        'is_root',
        'is_alias',
        'is_locking'
    ];

    /**
     * timestamps.  2019/6/14 21:10.
     *
     * @var  bool
     */
    public $timestamps = false;
}
