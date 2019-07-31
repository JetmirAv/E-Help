<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\PatientResource;

class PatientController extends Controller
{

    public function index()
    {
        return PatientResource::collection(User::all()->where('role_id', '=', 3));
    }

    public function store(Request $request)
    {

        $patient = User::create([
            'role_id' => 3,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => $request->password,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal' => $request->postal,
            'phone_number' => $request->phone_number
        ]);

        return new PatientResource($patient);
    }

    public function show(User $patient)
    {
        if ($patient->role_id === 3) {
            return new PatientResource($patient);
        }

        return "No user found";
    }

    public function update(Request $request, User $patient)
    {

        if ($request->id !== $patient->id) {

            return response()->json(['error' => "You can edit only your profile"]);
        }

        $patient->update($request->all());

        return new PatientResource($patient);
    }

    public function destroy(User $patient)
    {

        $patient->delete();

        return response()->json(null, 204);
    }
}
