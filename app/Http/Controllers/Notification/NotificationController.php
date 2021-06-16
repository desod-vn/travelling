<?php

namespace App\Http\Controllers\Notification;

use App\Status;
use App\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Notification\CreateRequest;
use App\Http\Requests\Notification\UpdateRequest;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Notification::class, 'notification', ['except' => ['index', 'show']]);
    }

    public function store(CreateRequest $request)
    {
        $notification = new Notification;

        $notification->fill($request->all());

        $notification->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $notification,
        ]);
    }

    public function update(UpdateRequest $request, Notification $notification)
    {
        $notification->fill($request->all());

        $notification->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $notification,
        ]);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'Moved to trash.',
        ]);
    }

}
