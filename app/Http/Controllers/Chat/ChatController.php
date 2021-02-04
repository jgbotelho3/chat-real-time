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

        $message = auth()->user()->messages()->create([
            'body' => $request->body
        ]);

        return response()->json($message, 201);
    }
}
