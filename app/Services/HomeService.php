<?php

namespace App\Services;

use App\Repositories\HomeRepository;

class HomeService

{
    protected $homeRepository;

    public function __construct(HomeRepository $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }
    public function create($user_data)
    {
        $user = $this->homeRepository->create($user_data);
        return $user;
    }
}
