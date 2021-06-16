<?php

namespace App\Http\Controllers\Message;

use App\Status;
use App\Models\Message;
use App\Models\Box;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Message\CreateRequest;
use Illuminate\Http\Request;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function store(CreateRequest $request)
    {
        $message = new Message;

        $user = Auth::user();

        $box = Box::findOrFail($request->box_id);

        $message->user_id = $user->id;
        $message->box_id = $request->box_id;
        $message->message = $request->message;

        $message->save();

        broadcast(new MessageSent($user, $message, $box));

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $message,
        ]);
    }
}
