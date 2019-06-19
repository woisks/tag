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
 * Class EditLogEntity.
 *
 * @package Woisks\Tag\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:21
 */
class EditLogEntity extends Models
{
    /**
     * table.  2019/6/14 21:21.
     *
     * @var  string
     */
    protected $table = 'tag_edit_log';
    /**
     * fillable.  2019/6/14 21:21.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'tag_id',
        'account_uid',
        'edit_type',
        'table',
        'table_numeric',
        'created_at',
        'updated_at',
        'status',
        'reply_account_uid',
        'reply_message',

    ];
}