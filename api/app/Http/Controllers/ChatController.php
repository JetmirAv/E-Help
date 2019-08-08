<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{User, Chats, DoctorPatient};

class ChatController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $contacts = DoctorPatient::distinct()->select('users.id','users.name', 'users.surname', 'users.role_id')
            ->where('patient', $user->id)
            ->join('users', 'doctor_patients.doctor', 'users.id')
            ->get();

        $last_chat = Chats::where('receiver', $user->id)
        ->orWhere('sender', $user->id)
        ->orderBy('created_at', 'desc')
        ->first();

        $otherContact = $user->id === $last_chat->receiver ? $last_chat->sender : $last_chat->receiver; 

        $chats = Chats::where(function ($query) use ($user, $otherContact){
            $query->where('receiver', $user->id)->where('sender', $otherContact);
        })
        ->orWhere(function ($query) use ($user, $otherContact){
            $query->where('sender', $user->id)->where('receiver', $otherContact);
        })
        ->orderBy('created_at', 'asc')
        ->get();


        return response()->json([
            'contacts' => $contacts,
            'chats' => $chats,
            'otherContact' => $otherContact,
        ]);
    }
}
