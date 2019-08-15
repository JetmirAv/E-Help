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
            'password' => 'required|confirmed|min:8',
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

        // $this->login();

    }
    public function update()
    {

        error_log(auth()->user()->email);

        
        if(auth()->user()->email === strtolower(request(['email'])['email'])){
            request()->validate([
                // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'password' => 'min:8|nullable',
                'birthday' => 'date',
            ]);
        } else {
            request()->validate([
                // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'email' => '|email|unique:users,email',
                'password' => 'min:8|nullable',
                'birthday' => 'date',
            ]);
        }


        $data = request()->except('img');

        if(!$data['password']){
            unset($data['password']);
        }

        $user = User::find(auth()->user()->id)->update($data);
        $user = User::find(auth()->user()->id)->first();

        return response()->json([
            'user' => $user
        ]);

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

        if ($user->role_id === 2) {
            $user = new DoctorResource($user);
        } else if ($user->role_id === 3) {
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
            'expires_in' => Carbon::parse(Carbon::now()->timestamp + (auth()->factory()->getTTL() * 60))
        ]);
    }
}
