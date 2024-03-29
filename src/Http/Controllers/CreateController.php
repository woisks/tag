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
use Woisks\Jwt\Services\JwtService;
use Woisks\Tag\Http\Requests\CreateRequest;
use Woisks\Tag\Models\Repository\CountRepository;
use Woisks\Tag\Models\Repository\IndexRepository;
use Woisks\Tag\Models\Repository\TagRepository;
use Woisks\Tag\Models\Repository\TypeRepository;
use Woisks\Tag\Models\Repository\UserRepository;

/**
 * Class ChangeController.
 *
 * @package Woisks\Tag\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:54
 */
class CreateController extends BaseController
{
    /**
     * indexRepo.  2019/7/28 15:54.
     *
     * @var  IndexRepository
     */
    private $indexRepo;
    /**
     * tagRepo.  2019/7/28 15:54.
     *
     * @var  TagRepository
     */
    private $tagRepo;
    /**
     * typeRepo.  2019/7/28 15:54.
     *
     * @var  TypeRepository
     */
    private $typeRepo;
    /**
     * userRepo.  2019/7/28 15:54.
     *
     * @var  UserRepository
     */
    private $userRepo;
    /**
     * countRepo.  2019/8/4 10:32.
     *
     * @var  CountRepository
     */
    private $countRepo;


    /**
     * ChangeController constructor. 2019/8/4 10:32.
     *
     * @param IndexRepository $indexRepo
     * @param UserRepository $userRepo
     * @param TypeRepository $typeRepo
     * @param TagRepository $tagRepo
     * @param CountRepository $countRepo
     *
     * @return void
     */
    public function __construct(IndexRepository $indexRepo,
                                UserRepository $userRepo,
                                TypeRepository $typeRepo,
                                TagRepository $tagRepo,
                                CountRepository $countRepo)
    {
        $this->tagRepo   = $tagRepo;
        $this->indexRepo = $indexRepo;
        $this->typeRepo  = $typeRepo;
        $this->userRepo  = $userRepo;
        $this->countRepo = $countRepo;
    }

    /**
     * create. 2019/7/28 15:54.
     *
     * @param CreateRequest $request
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function create(CreateRequest $request)
    {
        $tag  = $request->input('tag');
        $type = $request->input('type');

        //验证创建权限
        $type_db = $this->typeRepo->first($type);
        if (!$type_db) {
            return res(404, 'param type error or not exists ');
        }

        try {
            \DB::beginTransaction();
            $account_uid = JwtService::jwt_account_uid();
            $type_db->increment('count');

            if (!$this->userRepo->exists($account_uid, $type, $tag)) {
                //记录用户创建的标签
                $this->userRepo->created($account_uid, $type, $tag);
            }

            //创建标签索引关系
            $index = $this->indexRepo->firstOrCreated($type, $tag);

            //用户模块标签统计
            $this->countRepo->incrementU($account_uid, $type);

            //标签统计
            $tag_db = $this->tagRepo->firstOrCreated($tag);

        } catch (\Throwable $e) {

            \DB::rollBack();
            return res(500, 'Come back later');
        }
        \DB::commit();
        return res(200, 'success', collect($tag_db)->put($type, $index->count));

    }


}
