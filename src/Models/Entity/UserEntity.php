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
 * Class UserEntity.
 *
 * @package Woisks\Tag\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/17 21:35
 */
class UserEntity extends Models
{
    /**
     * table.  2019/6/17 21:35.
     *
     * @var  string
     */
    protected $table = 'tag_user';
    /**
     * fillable.  2019/6/17 21:35.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'account_uid',
        'type_id',
        'tag_id',
        'created_at'
    ];

    /**
     *
     */
    public const UPDATED_AT = null;
}