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

        $doctor = auth()->user()->Doctor;
        $found_doctors = null;
        if ($doctor) {
            $found_doctors = User::select(['id', 'name', 'surname'])->where('role_id', 2)->whereNotIn('id', [$doctor->id])->get();
        } else {
            $found_doctors = User::select(['id', 'name', 'surname'])->where('role_id', 2)->get();
        }
        return response()->json([
            'count' => $found_doctors
        ], 200);
    }

    public function add_doctor()
    {
        $current_user = auth()->user();
        $doctor_id = intval(request()->all()['doctor_id']);
        if ($current_user->role_id === 3) {
            User::where('id', $current_user->id)->update(['doctor' => $doctor_id]);
        } else {
            return response()->json([
                'success' => 'Doctor added successfuly'
            ], 401);
        }

        return response()->json([
            'success' => 'Doctor added successfuly'
        ], 200);
    }
}
