<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\SearchRequest;
use App\Services\UserService;
use App\Transformers\User\ProfileTransformer;
use App\Transformers\User\ListTransformer;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    /**
     * View list user
     * @return View
     */
    public function index()
    {
        return view('website.user.index');
    }

    /**
     * @param SearchRequest $searchRequest
     * @return mixed
     */
    public function search(SearchRequest $searchRequest)
    {
        $users = $this->userService->searchUser($searchRequest);

        return responder()->paginate($users, new ListTransformer);
    }

    /**
     * Get user detail
     * 
     * @param User $user
     * @return JsonResponse|mixed
     */
    public function show($userId)
    {
        $user = $this->userService->getUserProfile($userId);

        return responder()->data($user, new ProfileTransformer);
    }
}
