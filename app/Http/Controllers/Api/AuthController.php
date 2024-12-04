<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginRequest $request)
    {
        $credentials = auth()->attempt($request->only('phone', 'password'));

        if ($credentials == false) {
            return $this->apiErrorResponse(message: trans('user::message.login_message'), status_code: 401);
        }
        $user = auth()->user();
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of' . $user->name)->plainTextToken,
        ]);
    }

    public function logout()
    {
        // using logout() method to trigger the event for login logout of users
        auth()->guard('web')->logout();

        /** @var User $user */
        $user = auth()->user();

        /** @var $token */
        $token = $user->currentAccessToken();
        $token->delete();

        return $this->success(data:$user, message: 'logout successfuly');
    }
}
