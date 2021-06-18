<?php

namespace App\Http\Controllers\User;

use App\Status;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\AvatarRequest;
use App\Http\Requests\User\PasswordRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user', ['except' => ['show']]);
    }

    public function index(Request $request)
    {
        $users = User::query()->latest();

        if($request->has('search'))
        {
            $users->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $users->paginate(Status::USER_PER_PAGE);

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $users,
        ]);
    }

    public function profile()
    {
        $user = Auth::user();

        return response()->json([
            'status' => Status::SUCCESS,
            'user' => $user,
        ]);
    }

    public function avatar(AvatarRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $image = substr($user->image, strlen(Status::APP));

        if($request->has('image'))
        {
            Storage::delete($image);
            $image = $request->file('image')->store(Status::USER_IMAGE);
            $user->avatar = Status::APP . $image;
        }
        $user->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $user,
        ]);
    }

    public function password(PasswordRequest $request, User $user)
    {
        $this->authorize('update', $user);

        if(Hash::check($request->oldPassword, $user->password))
        {
            $user->password = Hash::make($request->password);

            $user->save();

            return response()->json([
                'status' => Status::SUCCESS,
                'message' => 'Password was changed.',
            ]);
        }

        return response()->json([
            'status' => Status::FAILURE,
            'message' => 'Password was not changed.',
        ]);
    }

    public function boxMe()
    {
        $user = Auth::user();

        $user->boxes;

        $user->memberIn;

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $user,
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $user,
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;

        $user->slug = Str::slug($user->name, '-');

        $user->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $user,
        ]);

    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'The user was banned.',
        ]);
    }
}
