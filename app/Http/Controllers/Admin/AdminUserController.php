<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index() {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function deleteUser($id) {
        try {
            $user = User::findOrFail($id);
            $user->delete($id);
            return to_route('admin.users.index')->with(['message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong in the frontend']);
        }
    }
}
