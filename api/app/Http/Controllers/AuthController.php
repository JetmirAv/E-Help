<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\PatientResource;
use App\Traits\FileUploadTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->middleware('cors');
    }
    public function register(Request $request)
    {

        $val = Validator::make($request->all(), [
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'state' => 'required',
            'postal' => 'required',
            'phone_number' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pos' => 'required',
            'birthday' => 'required|date',
        ]);

        if ($val->passes()) {

            $data = $request->except('img');
            
            if ($request->hasFile('img')) {

                $name = $this->upload($request->img);
                $data['img'] = $name;
            
            }

            $data['role_id'] = (int) $data['pos'] === 2 ? 2 : 3;

            $user = User::create($data);

            return $this->login($request);

            // $credentials = request(['email', 'password']);

            // if (!$token = auth()->attempt($credentials, ['exp' => Carbon::now()->addDays(7)->timestamp])) {
            //     return response()->json(['error' => 'Unauthorized'], 401);
            // }
            // return $this->respondWithToken($token, $user);
        } else {
            return $val->errors()->all();
        }



        $data['role_id'] = 3;



        // $this->login();

    }
    public function update(Request $request)
    {

        

        $rules = [
            'email' => 'required|email|unique:users,email',
            'state' => 'required',
            'postal' => 'required',
            'phone_number' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pos' => 'required',
            'birthday' => 'required|date',
        ];

        $data = request()->all();

        !$request->hasFile('img')  ? null : $rules['img'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000';        
        !$data['password'] ? null : $rules['password'] = 'required|min:8';

        $val = Validator::make($request->all(), $rules);

        // return response()->json([
        //     'req' => $val->passes()
        // ]);
        if($val->passes()){

            $user = User::find(auth()->user()->id);

            if (!$data['password']) {
                unset($data['password']);
            }

            if ($request->hasFile('img')) {

                $name = $this->upload($request->img);
                $data['img'] = $name;
            
            }

            $user->update($data);
            
            $user = User::find(auth()->user()->id)->first();
    
            return response()->json([
                'user' => $user
            ]);

        }
        



    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials, ['exp' => Carbon::now()->addDays(7)->timestamp])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token, auth()->user($token));
    }

    public function me(Request $request)
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
