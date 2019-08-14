<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientDoctor;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DoctorPatient;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

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

    public function get_doctors()
    {

        $doctors = auth()->user()->doctors;
        $doctors_id = [];

        foreach ($doctors as $doctor) {
            array_push($doctors_id, $doctor->id);
        }

        $found_doctors = User::select(['name', 'surname', 'id'])->where('role_id', 2)->whereNotIn('id', $doctors_id)->get();
        return response()->json([
            'count' => $found_doctors
        ], 200);
    }

    public function add_doctor()
    {
        $current_user = auth()->user()->id;
        $doctor_id = intval(request()->all()['doctor_id']);

        DoctorPatient::create([
            'patient' => $current_user,
            'doctor' => $doctor_id
        ]);

        return response()->json([
            'success' => 'Doctor added successfuly'
        ], 200);
    }
}
