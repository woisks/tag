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
 * @Author Maple Grove  <bolelin@126.com> 2019/8/4 10:28
 */
class CountRepository
{
    /**
     * model.  2019/8/4 10:28.
     *
     * @var static CountEntity
     */
    private static $model;

    /**
     * CountRepository constructor. 2019/8/4 10:28.
     *
     * @param CountEntity $count
     *
     * @return void
     */
    public function __construct(CountEntity $count)
    {

        self::$model = $count;
    }

    /**
     * incrementU. 2019/8/4 10:28.
     *
     * @param $account_uid
     * @param $type
     *
     * @return mixed
     */
    public function incrementU($account_uid, $type)
    {
        $db = self::$model->firstOrCreate(['account_uid' => $account_uid, 'type' => $type], ['id' => create_numeric_id()]);
        $db->increment('count');
        return $db;
    }

    /**
     * get. 2019/8/4 10:28.
     *
     * @param $account_uid
     *
     * @return mixed
     */
    public function get($account_uid)
    {
        return self::$model->where('account_uid', $account_uid)->get();
    }


}
