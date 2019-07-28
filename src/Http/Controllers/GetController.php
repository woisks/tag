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


use Illuminate\Http\JsonResponse;
use Woisks\Tag\Http\Requests\GetRequest;
use Woisks\Tag\Models\Repository\IndexRepository;
use Woisks\Tag\Models\Repository\TagRepository;
use Woisks\Tag\Models\Repository\UserRepository;


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
     * tagRepo.  2019/7/28 16:20.
     *
     * @var  TagRepository
     */
    private $tagRepo;
    /**
     * indexRepo.  2019/7/28 16:20.
     *
     * @var  IndexRepository
     */
    private $indexRepo;
    /**
     * userRepo.  2019/7/28 16:20.
     *
     * @var  UserRepository
     */
    private $userRepo;

    /**
     * GetController constructor. 2019/7/28 16:20.
     *
     * @param TagRepository $tagRepo
     * @param IndexRepository $indexRepo
     * @param UserRepository $userRepo
     *
     * @return void
     */
    public function __construct(TagRepository $tagRepo, IndexRepository $indexRepo, UserRepository $userRepo)
    {
        $this->tagRepo   = $tagRepo;
        $this->indexRepo = $indexRepo;
        $this->userRepo  = $userRepo;
    }

    /**
     * get. 2019/7/28 16:12.
     *
     * @param GetRequest $request
     *
     * @return JsonResponse
     */
    public function tag(GetRequest $request)
    {
        $tags = $request->input('tag');

        $tag_db = $this->tagRepo->find($tags);

        if ($tag_db->isEmpty()) {
            return res(422, 'param error');
        }

        return res(200, 'success', $tag_db);
    }

    /**
     * type. 2019/7/28 16:20.
     *
     * @param $type
     *
     * @return JsonResponse
     */
    public function type($type)
    {
        $db = $this->indexRepo->all($type);
        if ($db->isEmpty()) {
            return res(404, 'data not exists ');
        }
        return res(200, 'success', $db);
    }

    /**
     * user. 2019/7/28 16:20.
     *
     * @param $type
     * @param $account_uid
     *
     * @return JsonResponse
     */
    public function user($type, $account_uid)
    {
        if ($type == 'all') {

            if (!is_null($db = $this->userAll($account_uid))) {
                return res(200, 'success', $db);
            }
        }

        if (!is_null($db = $this->userTag($type, $account_uid))) {
            return res(200, 'success', $db);
        }

        return res(404, 'data not exists ');

    }

    /**
     * userTag. 2019/7/28 16:33.
     *
     * @param $type
     * @param $account_uid
     *
     * @return mixed|null
     */
    private function userTag($type, $account_uid)
    {
        $db = $this->userRepo->tags($type, $account_uid);
        if ($db->isEmpty()) {
            return null;
        }
        return $db;
    }

    /**
     * userAll. 2019/7/28 16:33.
     *
     * @param $account_uid
     *
     * @return mixed|null
     */
    private function userAll($account_uid)
    {
        $db = $this->userRepo->all($account_uid);
        if ($db->isEmpty()) {
            return null;
        }
        return $db;
    }
}
