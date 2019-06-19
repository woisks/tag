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


use Woisks\Jwt\Services\JwtService;
use Woisks\Tag\Models\Entity\UserEntity;

class UserRepository
{
    private static $model;

    public function __construct(UserEntity $user)
    {
        self::$model = $user;
    }

    public function created($type_id, $tag_id)
    {
        return self::$model->create([
            'id'          => create_numeric_id(),
            'account_uid' => JwtService::jwt_account_uid(),
            'type_id'     => $type_id,
            'tag_id'      => $tag_id
        ]);
    }

}