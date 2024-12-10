<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    /* Register api
    *
    *@param RegisterRequest $request
    *@return JsonResponse
    */
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $user = User::create($validated)->assignRole('Customer');
            $user->token = $user->createToken('MyApp')->accessToken;
            DB::commit();
            return response()->json([
                'message' => 'User Registered Successfully',
                'User Data' => $user,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'User Registeration Failed',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /* Login api
    *
    *@param LoginRequest $request
    *@return JsonResponse
    */
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $user = Auth::User();
            $user->token = $user->createToken('MyApp')->accessToken;
            return response()->json([
                'message' => 'Login Successful',
                'data' => $user,
            ]);
        }return response()->json([
            'error' => 'Invalid Credentials',
        ], Response::HTTP_UNAUTHORIZED);
    }

    /* Logout api
    *
    *@param Request $request
    *@return JsonResponse
    */
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->token()->revoke();
        return response()->json([
            'message' => "Logout Successful",
        ]);
    }
}
