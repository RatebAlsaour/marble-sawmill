<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Traits\MessageHandleHelper;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;

class UserController extends BaseController
{
    use MessageHandleHelper;

    public function __construct(private Request $request, private UserService $userService) {
        parent::__construct($request);
    }

    public function index()
    {
        if ($this->request->ajax()) {
            $users = User::managerial()->orderByDesc('id')->select(['id','name', 'email', 'mobile', 'created_at', 'updated_at']);
            return prepareDataTable($users, 'users');
        }

        return view('pages.user.index', [
            'roles' => getRoles()
        ]);
    }

    public function store(RegisterRequest $request)
    {
        try {
            $this->userService->createUser();

            return \response([], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return \response($e->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function edit($id)
    {
        $user = $this->userService->findOrFail($id);
        $user_role_id = $user->roles->first() ? $user->roles->first()->id : null;
        return view('pages.user.update', [
            'user' => $user,
            'roles' => getRoles(),
            'user_role_id' => $user_role_id
        ]);
    }

    public function update($id)
    {
        $this->userService->updateUser($id);

        return redirect()->to(route('users.edit', $id));
    }


    public function blockToggle($user_id)
    {
        $this->userService->blockToggle($user_id);
        return redirect()->back();
    }

    public function activationToggle($user_id)
    {
        $this->userService->activationToggle($user_id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        return $this->successResponse();
    }
}
