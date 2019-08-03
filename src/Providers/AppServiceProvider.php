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

namespace Woisks\Tag\Providers;


use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider.
 *
 * @package Woisks\Tag\Providers
 *
 * @Author Maple Grove  <bolelin@126.com> 2019/8/3 22:05
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * boot. 2019/8/3 22:05.
     *
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
    }

}
