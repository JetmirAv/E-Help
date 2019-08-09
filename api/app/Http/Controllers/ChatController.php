<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{User, Chats, DoctorPatient};

class ChatController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $role = $user->role_id === 3 ? "patient" : "doctor";
        $join = $user->role_id === 3 ? "doctor_patients.doctor" : "doctor_patients.patient";

        $contacts = DoctorPatient::distinct()
            ->select('users.id', 'users.name', 'users.surname', 'users.img', 'users.role_id')
            ->where($role, $user->id)
            ->join('users', $join, 'users.id')
            ->orderBy('users.name', 'asc')
            ->get();

        $last_chat = Chats::where('receiver', $user->id)
            ->orWhere('sender', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $otherContact = $user->id === $last_chat->receiver ? $last_chat->sender : $last_chat->receiver;

        $chats = Chats::where(function ($query) use ($user, $otherContact) {
            $query->where('receiver', $user->id)->where('sender', $otherContact);
        })
            ->orWhere(function ($query) use ($user, $otherContact) {
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

    public function store()
    {
        $data = request()->all();
        $current_user = auth()->user();
        $sender = $current_user->id;
        $receiver = intval($data['receiver']);
        $content = $data['content'];
        $relation = null;
        if ($current_user->role_id === 3) {
            $relation = DoctorPatient::where('patient', $current_user->id)->where('doctor', $receiver)->get();
        } else if ($current_user->role_id === 2) {
            $relation = DoctorPatient::where('doctor', $current_user->id)->where('patient', $receiver)->get();
        } else {
            return response()->json(['error' => 'Could not find this contact'], 404);
        }

        if ($relation === null) {
            return response()->json(['error' => 'Could not find this contact'], 404);
        }

        $chat = Chats::create(['sender' => $sender, 'receiver' => $receiver, 'content' => $content]);

        return response()->json([
            'chat' => $chat,
            'success' => true
        ], 200);
    }

    public function refresh()
    {
        $data = request()->all();
        $current_user = auth()->user();
        $receiver = intval($data['receiver']);
        $last_fetched_id = $data['last_fetched_id'];

        // $chats = Chats::where(function ($query) use ($current_user, $receiver) {
        //     $query->where('receiver', $current_user->id)->where('sender', $receiver);
        // })
        //     ->orWhere(function ($query) use ($current_user, $receiver) {
        //         $query->where('sender', $current_user->id)->where('receiver', $receiver);
        //     })
        //     ->get();


        $chatss = Chats::where(function($query) use ($current_user, $receiver)
        {
            $query->where(function ($query) use ($current_user, $receiver){
                $query->where('receiver', $current_user->id)->where('sender', $receiver);
            })
            ->orWhere(function ($query) use ($current_user, $receiver) {
                $query->where('sender', $current_user->id)->where('receiver', $receiver);
            });
        })->where('id', '>', $last_fetched_id)
        ->orderBy('created_at', 'asc')
        ->get();    

        return $chatss;



        // if($chats){
        //     return $chats->where('chats.id', '>', $last_fetched_id)->get();
        // } else {
        //     return $chats;
        // }


    }
}
