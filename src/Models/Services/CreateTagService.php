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

namespace Woisks\Tag\Models\Services;


use Woisks\Tag\Models\Repository\CountRepository;
use Woisks\Tag\Models\Repository\IndexRepository;
use Woisks\Tag\Models\Repository\TagRepository;
use Woisks\Tag\Models\Repository\UserRepository;


/**
 * Class CreateTagService.
 *
 * @package Woisks\Tag\Models\Services
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/14 21:52
 */
class CreateTagService
{
    /**
     * tagRepo.  2019/6/14 21:52.
     *
     * @var  \Woisks\Tag\Models\Repository\TagRepository
     */
    private $tagRepo;
    /**
     * typeCountRepo.  2019/6/14 21:52.
     *
     * @var  \Woisks\Tag\Models\Repository\CountRepository
     */
    private $countRepo;
    /**
     * typeIndexRepo.  2019/6/14 21:52.
     *
     * @var  \Woisks\Tag\Models\Repository\IndexRepository
     */
    private $indexRepo;

    /**
     * userRepo.  2019/7/19 22:07.
     *
     * @var  \Woisks\Tag\Models\Repository\UserRepository
     */
    private $userRepo;


    /**
     * CreateTagService constructor. 2019/7/19 22:07.
     *
     * @param \Woisks\Tag\Models\Repository\TagRepository   $tagRepo
     * @param \Woisks\Tag\Models\Repository\CountRepository $typeCountRepo
     * @param \Woisks\Tag\Models\Repository\IndexRepository $typeIndexRepo
     * @param \Woisks\Tag\Models\Repository\UserRepository  $userRepo
     *
     * @return void
     */
    public function __construct(TagRepository $tagRepo,
                                CountRepository $typeCountRepo,
                                IndexRepository $typeIndexRepo,
                                UserRepository $userRepo
    )
    {
        $this->tagRepo = $tagRepo;
        $this->countRepo = $typeCountRepo;
        $this->indexRepo = $typeIndexRepo;
        $this->userRepo = $userRepo;

    }


    /**
     * count. 2019/7/19 22:07.
     *
     * @param $model
     *
     * @return mixed
     */
    public function count($model)
    {
        return $this->countRepo->first($model);
    }

    /**
     * tag. 2019/7/19 22:07.
     *
     * @param $tag
     *
     * @return mixed
     */
    public function tag($tag)
    {
        return $this->tagRepo->firstOrCreated($tag);
    }

    /**
     * index. 2019/7/19 22:07.
     *
     * @param $tag_id
     * @param $type_id
     *
     * @return mixed
     */
    public function index($tag_id, $type_id)
    {
        return $this->indexRepo->firstOrCreated($type_id, $tag_id);
    }

    /**
     * user. 2019/7/19 22:07.
     *
     * @param $uid
     * @param $tag_id
     * @param $type_id
     *
     * @return mixed
     */
    public function user($uid, $tag_id, $type_id)
    {
        return $this->userRepo->created($uid, $type_id, $tag_id);
    }

}