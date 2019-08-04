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
use Woisks\Tag\Models\Repository\CountRepository;
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
     * countRepo.  2019/8/4 10:37.
     *
     * @var  CountRepository
     */
    private $countRepo;


    /**
     * GetController constructor. 2019/8/4 10:37.
     *
     * @param TagRepository $tagRepo
     * @param IndexRepository $indexRepo
     * @param UserRepository $userRepo
     * @param CountRepository $countRepo
     *
     * @return void
     */
    public function __construct(TagRepository $tagRepo, IndexRepository $indexRepo, UserRepository $userRepo, CountRepository $countRepo)
    {
        $this->tagRepo   = $tagRepo;
        $this->indexRepo = $indexRepo;
        $this->userRepo  = $userRepo;
        $this->countRepo = $countRepo;
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
     * numeric. 2019/8/4 10:37.
     *
     * @param $account_uid
     *
     * @return JsonResponse
     */
    public function numeric($account_uid)
    {
        $db = $this->countRepo->get($account_uid);
        if ($db->isEmpty()) {
            return res(404, 'data not exists ');
        }
        return res(200, 'success', $db);
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
