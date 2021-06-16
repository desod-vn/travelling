<?php

namespace App\Http\Controllers\Place;

use App\Status;
use App\Models\Place;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Place\CreateRequest;
use App\Http\Requests\Place\UpdateRequest;

class PlaceController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Place::class, 'place', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $places = Place::query()->orderBy('id', 'DESC');

        if($request->has('search'))
        {
            $places->where('name', 'like', '%' . $request->search . '%');
        }
        $places = $places->get();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $places,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $image = $request->file('image')->store(Status::PLACE_IMAGE);

        $place = new Place;

        $place->fill($request->all());
        $place->image = Status::APP . $image;
        $place->slug = Str::slug($request->name, '-');

        $place->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $place,
        ]);
    }

    public function show(Place $place)
    {
        $place->boxes;

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $place,
        ]);
    }


    public function update(UpdateRequest $request, Place $place)
    {
        $image = substr($place->image, strlen(Status::APP));

        $place->fill($request->all());

        if($request->has('image'))
        {
            Storage::delete($image);
            $image = $request->file('image')->store(Status::PLACE_IMAGE);
            $place->image = Status::APP . $image;
        }

        $place->slug = Str::slug($place->name, '-');

        $place->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $place,
        ]);
    }

    public function destroy(Place $place)
    {
        $place->delete();

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'Moved to trash.',
        ]);
    }

}
