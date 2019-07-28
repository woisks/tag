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


use Woisks\Tag\Models\Entity\UserEntity;

/**
 * Class UserRepository.
 *
 * @package Woisks\Tag\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 22:07
 */
class UserRepository
{

    /**
     * model.  2019/7/28 15:41.
     *
     * @var static UserEntity
     */
    private static $model;


    /**
     * UserRepository constructor. 2019/7/28 15:41.
     *
     * @param UserEntity $user
     *
     * @return void
     */
    public function __construct(UserEntity $user)
    {
        self::$model = $user;
    }

    /**
     * exists. 2019/7/28 15:41.
     *
     * @param $account_uid
     * @param $type
     * @param $tag
     *
     * @return mixed
     */
    public function exists($account_uid, $type, $tag)
    {
        return self::$model->where('account_uid', $account_uid)->where('type', $type)->where('tag', $tag)->exists();

    }

    /**
     * created. 2019/7/28 15:41.
     *
     * @param $account_uid
     * @param $type
     * @param $tag
     *
     * @return mixed
     */
    public function created($account_uid, $type, $tag)
    {
        return self::$model->create([
            'id'          => create_numeric_id(),
            'account_uid' => $account_uid,
            'type'        => $type,
            'tag'         => $tag
        ]);
    }

    /**
     * tags. 2019/7/28 16:21.
     *
     * @param $type
     * @param $account_uid
     *
     * @return mixed
     */
    public function tags($type, $account_uid)
    {
        return self::$model->where('account_uid', $account_uid)->where('type', $type)->paginate();
    }

    /**
     * all. 2019/7/28 16:31.
     *
     * @param $account_uid
     *
     * @return mixed
     */
    public function all($account_uid)
    {
        return self::$model->where('account_uid', $account_uid)->paginate();
    }
}
