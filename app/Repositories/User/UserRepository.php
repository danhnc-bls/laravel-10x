<?php
namespace App\Repositories\User;

use App\Repositories\EFRepository;
use App\Models\User;

class UserRepository extends EFRepository implements IUserRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    /**
     * Search user
     * @param $params
     * @param $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function searchUser($params, $limit)
    {
        $query = $this->model->select('*')->where('role', '!=', User::ROLE_ADMIN);

        // Search by keyword
        if ($params['keyword'] ?? false) {
            $query->where('id', 'LIKE', "%$params[keyword]%");
            $query->orWhere('name', 'LIKE', "%$params[keyword]%");
            $query->orWhere('email', 'LIKE', "%$params[keyword]%");
        }

        if(isset($params['sortBy']) && isset($params['sortOrder'])) {
            $query->orderBy($params['sortBy'], $params['sortOrder']);
        } else {
            $query->orderBy('id', 'desc');
        }

        return $query->paginate($limit);
    }
}
