<?php
namespace App\Repositories\User;
use App\Repositories\IRepository;

interface IUserRepository extends IRepository
{
    /**
     * Search user
     * @param $params
     * @param $limit
     * @return mixed
     */
    public function searchUser($params, $limit);
}
