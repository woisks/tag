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


Route::prefix('tag')
    ->middleware('throttle:60,1')
    ->namespace('Woisks\Tag\Http\Controllers')
    ->group(function () {

        Route::get('/', 'GetController@tag');
        Route::get('/{type}', 'GetController@type')->where(['type' => '[a-z]+']);
        Route::get('/{type}/{uid}', 'GetController@user')->where(['type' => '[a-z]+', 'uid' => '[0-9]+']);

        Route::middleware('token')->group(function () {
            Route::post('/', 'CreateController@create');
        });


    });
