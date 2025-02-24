<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     *  Registers a new user
     */

    public function regUser(UserCreateRequest $request)
    {

        $validatedData = $request->validated();


        if ($validatedData) {

            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password'])
            ]);

            return response()->json([
                'message' => 'Account created successfully'
            ]);
        }
    }

    /**
     * Authenticate and login a user
     */
    public function loginUser(UserLoginRequest $request)
    {

        $validatedData = $request->validated();

        if ($validatedData) {

            $user = User::whereEmail($validatedData['email'])->first();

            if (!$user || !Hash::check($validatedData['password'], $user->password)) {

                return response()->json([
                    'error' => 'Invalid Credentials'
                ], 401);
            } else {

                return response()->json([

                    'message' => 'Logged in successfully',
                    'user' => UserResource::make($user),
                    'accessToken' => $user->createToken('logged_in')->plainTextToken

                ]);
            }
        }
    }

    /**
     * Update authenticated user info
     */
    public function updateUserInfo(Request $request)
    {

        // $user = Auth::user();

        $request->validate([

            'profile_image' => 'image|mimes:png,jpg,jpeg|max:4028'

        ]);


        if ($request->has('profile_image')) {

            if (File::exists(asset($request->user()->image))) {

                File::delete(asset($request->user()->image));
            }

            $file = $request->file('profile_image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/users/'), $imageName);

            $request->user()->update(['image' => 'images/users/' . $imageName]);

            return response()->json([

                'message' => 'Profile image updated successfully',

                'user' => UserResource::make($request->user())

            ]);
        } else {

            $request->user()->update([

                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'profile_completed' => 1,

            ]);

            return response()->json([

                'message' => 'Profile updated successfully',

                'user' => UserResource::make($request->user())

            ]);
        }
    }

    /**
     * Logout an authenticated user
     */
    public function loggedOut(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json([

            'message' => 'Logged out successfully'

        ]);
    }
}
