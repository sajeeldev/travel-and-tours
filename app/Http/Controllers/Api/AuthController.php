<?php

namespace App\Http\Controllers\Api;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        DB::beginTransaction();
        try{
            $validated = $request->validated();
            User::create($validated);
            DB::commit();
        } catch (Throwable $e){
            DB::rollBack();
            report($e);
            return response()->json([
                'message'=> 'User Registered Successfully',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
