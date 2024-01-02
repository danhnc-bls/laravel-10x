<?php

namespace App\Services;

use App\Repositories\User\IUserRepository;
use Illuminate\Support\Facades\Log;
use Exception;

/**
 * Class UserService
 * @package App\Services
 */
class UserService extends BaseService
{
    protected $userRepository;

    public function __construct(
        IUserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * Get list user
     */
    public function searchUser($searchRequest)
    {
        try {
            $params = $searchRequest->only('keyword', 'status', 'limit', 'page', 'sortBy', 'sortOrder', 'include');
            $limit = $params['limit'] ?? config('const.default_limit');
            $list = $this->userRepository->searchUser($params, $limit);

            return $list;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     * Get user profile by id
     * @param $userId
     * @return User
     */
    public function getUserProfile($userId)
    {
        try {
            $user = $this->userRepository->find($userId);

            return $user;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
