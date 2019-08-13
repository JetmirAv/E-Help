<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\PatientResource;
use Carbon\Carbon;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function register()
    {

        request()->validate([
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email',
            'password' => 'confirmed|min:8',
            'state' => 'required',
            'postal' => 'required',
            'phone_number' => 'required',
            'name' => 'required|',
            'surname' => 'required|',
            'address' => 'required|',
            'city' => 'required|',
            'pos' => 'required|',
            'birthday' => 'required|date',
        ]);

        $data = request()->except('img');
        $data['role_id'] = (int) $data['pos'] === 2 ? 2 : 3;

        


        $user = User::create($data);

        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials, ['exp' => Carbon::now()->addDays(7)->timestamp])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token, $user);
    }
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials, ['exp' => Carbon::now()->addDays(7)->timestamp])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token, auth()->user($token));
    }

    public function me()
    {
        $user = auth()->user();
        
        if($user->role_id === 2){
            $user = new DoctorResource($user);
        } else if ($user->role_id === 3){
            $user = new PatientResource($user);
        }

        return response()->json($user);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        $token = auth()->refresh();
        return $this->respondWithToken($token, auth()->user($token));
    }

    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'access_token' => $token,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role_id,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
