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

namespace Woisks\Tag\Http\Controllers;


use Woisks\Tag\Http\Requests\GetArrayRequest;
use Woisks\Tag\Http\Requests\GetRequest;
use Woisks\Tag\Models\Services\GetTagService;

/**
 * Class GetController.
 *
 * @package Woisks\Tag\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/19 11:08
 */
class GetController extends BaseController
{

    /**
     * getService.  2019/6/19 11:08.
     *
     * @var  \Woisks\Tag\Models\Services\GetTagService
     */
    private $getService;

    /**
     * GetController constructor. 2019/6/19 11:08.
     *
     * @param \Woisks\Tag\Models\Services\GetTagService $getService
     *
     * @return void
     */
    public function __construct(GetTagService $getService)
    {
        $this->getService = $getService;
    }


    /**
     * gets. 2019/6/19 11:08.
     *
     * @param \Woisks\Tag\Http\Requests\GetArrayRequest $request
     *
     * @return mixed
     */
    public function gets(GetArrayRequest $request)
    {
        $tags = $request->input('tag');

        return $this->getService->find($tags);
    }

    /**
     * get. 2019/6/19 11:08.
     *
     * @param \Woisks\Tag\Http\Requests\GetRequest $request
     *
     * @return mixed
     */
    public function get(GetRequest $request)
    {
        $tag = $request->input('tag');

        return $this->getService->first($tag);
    }
}