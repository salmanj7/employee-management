<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $customer = User::where('email', $credentials['email'])->first();

        if (!$customer) {
            return response()->json(['success' => false, 'message' => 'Invalid email']);
        }

        if (!$customer || !password_verify($request->password, $customer->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid email or password']);
        }
        Auth::login($customer);

        return $this->loginResponse();
    }

    public function loginResponse()
    {
        $admin = Auth::user();
        $token=$admin->token = Auth::user()->createToken(request()->ip. ' ' .request()->getUserInfo())->plainTextToken;

        return $this->successResponse('Login Successfully', new LoginResponse($admin));
    }

    public function logout()
    {
      
        //Auth::guard('sanctum')->user()->forgetCachedPermissions();
        Auth::guard('sanctum')->user()->currentAccessToken()->delete();

        return $this->successResponse('You have been logged out from current session.');
    }

}
