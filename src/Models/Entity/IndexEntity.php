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
 * Class IndexEntity.
 *
 * @package Woisks\Tag\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:14
 */
class IndexEntity extends Models
{
    /**
     * table.  2019/6/14 21:14.
     *
     * @var  string
     */
    protected $table = 'tag_type_index';
    /**
     * fillable.  2019/6/14 21:14.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'tag_id',
        'type_id'
    ];

    public $timestamps = false;
}