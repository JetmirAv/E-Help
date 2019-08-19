<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Receipt;
use App\Http\Resources\DoctorResource;
use App\Models\Diseases;
use App\Models\PatientDisease;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('cors');
    }

    public function index()
    {
        return DoctorResource::collection(User::all()->where('role_id', '=', 2));
    }

    public function get_diseases()
    {
        $diseases = Diseases::select('id', 'name')->get();

        return response()->json([
            'diseases' => $diseases
        ]);
    }

    public function store(Request $request)
    {

        $doctor = User::create([
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

        return new DoctorResource($doctor);
    }

    public function show(User $doctor)
    {
        if ($doctor->role_id === 2) {
            return new DoctorResource($doctor);
        }
        return "No user found";
    }

    public function update(Request $request, User $doctor)
    {

        if ($request->id !== $doctor->id) {

            return response()->json(['error' => "You can edit only your profile"]);
        }

        $doctor->update($request->all());

        return new DoctorResource($doctor);
    }

    public function destroy(User $doctor)
    {

        $doctor->delete();

        return response()->json(null, 204);
    }

    public function add_receipt(Request $request)
    {
        $doctor_id = auth()->user()->id;
        $patient_id = $request->patient_id;
        $disease_id = $request->disease_id;
        $content = $request->content;

        Receipt::create([
            'doctor_id' => $doctor_id,
            'patient_id' => $patient_id,
            'disease_id' => $disease_id,
            'content' => $content,
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function add_disease(Request $request)
    {
        
        $found =  PatientDisease::firstOrCreate($request->all());
        
        // PatientDisease::create($request->all());



        return response()->json([
            'success' => true
        ]);
    }
}
