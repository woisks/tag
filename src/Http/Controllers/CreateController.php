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


use DB;
use Throwable;
use Woisks\Jwt\Services\JwtService;
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
     * created. 2019/7/19 22:53.
     *
     * @param \Woisks\Tag\Http\Requests\CreateTagRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function created(CreateTagRequest $request)
    {
        $tag = $request->input('tag');
        $type = $request->input('type');

        $type_db = $this->createTagService->count($type);

        if (!$type_db) {
            return res(422, 'type param error');
        }

        try {
            DB::beginTransaction();


            $type_db->increment('count');

            $tag_db = $this->createTagService->tag($tag);

            $this->createTagService->index($tag_db->id, $type_db->id);

            $this->createTagService->user(JwtService::jwt_account_uid(), $tag_db->id, $type_db->id);

        } catch (Throwable $e) {
            DB::rollBack();

            return res(422, 'param error');
        }
        DB::commit();

        return res(200, 'success', $tag_db->toArray());

    }
}