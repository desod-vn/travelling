<?php

namespace App\Http\Controllers\Box;

use App\Status;
use App\Models\Box;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Box\CreateRequest;
use App\Http\Requests\Box\UpdateRequest;


class BoxController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Box::class, 'box', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $boxes = Box::query()->latest();

        if($request->has('search'))
        {
            $boxes->where('name', 'like', '%' . $request->search . '%');
        }

        $boxes = $boxes->paginate(Status::BOX_PER_PAGE);

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $boxes,
        ]);
    }

    public function join(Box $box)
    {
        $status = $box->hasMembers()->toggle(Auth::user()->id, [
            'status' => 0
        ]);

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $status,
        ]);
    }

    public function joinIn(Box $box, Request $request)
    {
        $this->authorize('update', $box);

        $box->joinIn($box->id, $request->user);

        return response()->json([
            'status' => Status::SUCCESS,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $image = $request->file('image')->store(Status::BOX_IMAGE);

        $box = new Box;

        $box->fill($request->all());
        $box->image = Status::APP . $image;
        $box->user_id = Auth::user()->id;
        $box->slug = Str::slug($box->name, '-');

        $box->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $box,
        ]);
    }

    public function show(Box $box)
    {
        $box->hasMembers;

        $box->user;

        $box->place;

        $box->messages;

        $box->notifications;

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $box,
        ]);
    }


    public function update(UpdateRequest $request, Box $box)
    {
        $image = substr($box->image, strlen(Status::APP));

        $box->fill($request->all());

        if($request->has('image'))
        {
            Storage::delete($image);
            $image = $request->file('image')->store(Status::BOX_IMAGE);
            $box->image = Status::APP . $image;
        }

        $box->slug = Str::slug($box->name, '-');

        $box->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $box,
        ]);
    }

    public function destroy(Box $box)
    {
        $box->delete();

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'Moved to trash.',
        ]);
    }
}
