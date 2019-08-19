<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{User, Chats, DoctorPatient};

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('cors');        
    }

    public function index()
    {
        $user = auth()->user();

        $contacts = null;

        if ($user->role_id === 3) {
            $contacts = $user->Doctor;
        } else if ($user->role_id === 2) {
            $contacts = User::where('doctor', $user->id)->get();
        }

        $last_chat = Chats::where('receiver', $user->id)
            ->orWhere('sender', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $other_contact = null;
        $chats = null;

        if ($last_chat) {
            $other_contact = $user->id === $last_chat->receiver ? $last_chat->sender : $last_chat->receiver;
            $chats = Chats::where(function ($query) use ($user, $other_contact) {
                $query->where('receiver', $user->id)->where('sender', $other_contact);
            })
                ->orWhere(function ($query) use ($user, $other_contact) {
                    $query->where('sender', $user->id)->where('receiver', $other_contact);
                })
                ->orderBy('created_at', 'asc')
                ->get();
        }
        return response()->json([
            'this_role' => $user->role_id,
            'contacts' => $contacts,
            'chats' => $chats,
            'otherContact' => $other_contact,
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
            $relation = User::where('id', $current_user->doctor)->get();
        } else if ($current_user->role_id === 2) {
            $relation = User::where('id', $receiver)->where('doctor', $current_user->id)->get();
        } else {
            return response()->json(['error' => 'Could not find this contact'], 404);
        }

        if ($relation === null) {
            return response()->json(['error' => 'Could not find this contact'], 404);
        }

        $chat = Chats::create(['sender' => $sender, 'receiver' => $receiver, 'content' => $content]);
        $last_fetched_id = $chat->id;


        return response()->json([
            'chat' => $chat,
            'success' => true,
            'last_fetched_id' => $last_fetched_id
        ], 200);
    }

    public function refresh()
    {
        $data = request()->all();
        $current_user = auth()->user();
        $other_contact = intval($data['receiver']);
        $last_fetched_id = $data['last_fetched_id'];

        $chats = null;

        if ($last_fetched_id) {
            $chats = Chats::where(function ($query) use ($current_user, $other_contact) {
                $query->where(function ($query) use ($current_user, $other_contact) {
                    $query->where('receiver', $current_user->id)->where('sender', $other_contact);
                })
                    ->orWhere(function ($query) use ($current_user, $other_contact) {
                        $query->where('sender', $current_user->id)->where('receiver', $other_contact);
                    });
            })->where('id', '>', $last_fetched_id)
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $chats = Chats::where(function ($query) use ($current_user, $other_contact) {
                $query->where(function ($query) use ($current_user, $other_contact) {
                    $query->where('receiver', $current_user->id)->where('sender', $other_contact);
                })
                    ->orWhere(function ($query) use ($current_user, $other_contact) {
                        $query->where('sender', $current_user->id)->where('receiver', $other_contact);
                    });
            })->orderBy('created_at', 'asc')
                ->get();
        }

        return $chats;
    }

    public function change_contact()
    {
        $data = request()->all();
        $current_user = auth()->user();
        $other_contact = intval($data['other_contact']);
        $other_contact = User::where('id', $other_contact)->first();

        if ($current_user->role_id === 2) {
            $relation = User::where('id', $other_contact->id)->where('doctor', $current_user->id)->get();


            if ($relation === null) {
                return response()->json(['error' => 'Could not find this contact'], 404);
            }
        }

        $chats = Chats::where(function ($query) use ($current_user, $other_contact) {
            $query->where(function ($query) use ($current_user, $other_contact) {
                $query->where('receiver', $current_user->id)->where('sender', $other_contact->id);
            })
                ->orWhere(function ($query) use ($current_user, $other_contact) {
                    $query->where('sender', $current_user->id)->where('receiver', $other_contact->id);
                });
        })
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'chats' => $chats,
            'contact' => $other_contact
        ]);
    }
}
