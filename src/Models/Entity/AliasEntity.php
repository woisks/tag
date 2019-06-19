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
 * Class AliasEntity.
 *
 * @package Woisks\Tag\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:19
 */
class AliasEntity extends Models
{
    /**
     * table.  2019/6/14 21:19.
     *
     * @var  string
     */
    protected $table = 'tag_alias';
    /**
     * fillable.  2019/6/14 21:19.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'current_id',
        'parent_id',
        'status'
    ];
    /**
     * timestamps.  2019/6/14 21:19.
     *
     * @var  bool
     */
    public $timestamps = false;
}