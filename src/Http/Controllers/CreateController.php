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


use Woisks\Tag\Http\Requests\CreateTagRequest;
use Woisks\Tag\Models\Services\CreateTagService;

/**
 * Class CreateController.
 *
 * @package Woisks\Tag\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:54
 */
class CreateController extends BaseController
{
    /**
     * createTagService.  2019/6/14 21:54.
     *
     * @var  \Woisks\Tag\Models\Services\CreateTagService
     */
    private $createTagService;

    /**
     * CreateController constructor. 2019/6/14 21:54.
     *
     * @param \Woisks\Tag\Models\Services\CreateTagService $createTagService
     *
     * @return void
     */
    public function __construct(CreateTagService $createTagService)
    {
        $this->createTagService = $createTagService;
    }

    /**
     * created. 2019/6/19 10:00.
     *
     * @param \Woisks\Tag\Http\Requests\CreateTagRequest $request
     *
     * @return array
     */
    public function created(CreateTagRequest $request)
    {
        $tag = $request->input('tag');
        $type = $request->input('type');

        return $this->createTagService->create($tag, $type);
    }
}