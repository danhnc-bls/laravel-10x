<?php

namespace App\Transformers\User;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class ListTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'role' => $user->role,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'avatar' => $user->avatar,
            'gender' => config('users.gender')[$user->gender],
            'address' => $user->address,
            'age' => $user->age,
            'birthday' => $user->birthday,
            'status' => $user->status,
            'created_at' => $user->created_at
        ];
    }
}
