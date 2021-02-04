<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Chat\Message;


class ChatController extends Controller
{

    public function index()
    {
        return view('chat.index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $message = $user->messages()->create([
            'body' => $request->body
        ]);

        $message['user'] = $user;

        return response()->json($message, 201);
    }

    public function listAll(Message $message)
    {
        $messages = $message->with('user')
                            ->orderBy('id', 'DESC')
                            ->limit(50)
                            ->latest()
                            ->get();

        return response()->json($messages);
    }
}
