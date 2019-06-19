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

    private $userRepo;


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


    public function create($tag, $type)
    {

        $tag_db = $this->tagRepo->firstOrCreated($tag);
        $type_db = $this->countRepo->firstOrCreated($type);
        $da = $this->indexRepo->firstOrCreated($type_db->id, $tag_db->id);
        $dd = $this->userRepo->created($type_db->id, $tag_db->id);


        return [$tag_db, $type_db, $da, $dd];


    }

}