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
     * model.  2019/7/19 22:07.
     *
     * @var static \Woisks\Tag\Models\Entity\UserEntity
     */
    private static $model;

    /**
     * UserRepository constructor. 2019/7/19 22:07.
     *
     * @param \Woisks\Tag\Models\Entity\UserEntity $user
     *
     * @return void
     */
    public function __construct(UserEntity $user)
    {
        self::$model = $user;
    }

    /**
     * created. 2019/7/19 22:07.
     *
     * @param $uid
     * @param $tag_id
     * @param $type_id
     *
     * @return mixed
     */
    public function created($uid, $tag_id, $type_id)
    {
        return self::$model->create([
            'id'          => create_numeric_id(),
            'account_uid' => $uid,
            'tag_id'      => $tag_id,
            'type_id'     => $type_id
        ]);
    }

}