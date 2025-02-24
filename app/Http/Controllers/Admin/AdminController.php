<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Parcel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Display Admin index page
     */
    public function dashboard() {
        $todaysParcels = Parcel::whereDay('created_at', Carbon::today())->get();
        $yesterdaysParcels = Parcel::whereDay('created_at', Carbon::yesterday())->get();
        $weeklyParcels = Parcel::where('created_at', Carbon::now()->weekOfYear)->get();
        $monthlyParcels = Parcel::whereMonth('created_at', Carbon::now()->month)->get();
        $yearlyParcels = Parcel::whereYear('created_at', Carbon::now()->year)->get();
        return view('admin.index', compact('todaysParcels',
        'yesterdaysParcels',
        'weeklyParcels',
        'monthlyParcels',
        'yearlyParcels'));
    }

    /**
     *  Displays the admin login form
     */
    public function loginForm() {
        if (!auth()->guard('admin')->check()) {
            return view('admin.login');
        }
        return redirect()->route('admin.dashboard');
    }

    /**
     * Auth the admin user
     */
    public function auth(Request $request) {

        $validated = $request->validate([
            'email' => ['required', 'email', 'lowercase', 'max:255'],
            'password' => ['required','min:8', 'max:255']
        ]);

        if($validated) {

            if (auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                $request->session()->regenerate();

                return redirect()->route('admin.dashboard');
            }else {
                return redirect()->route('admin.login')->with([
                    'error' => 'These credentials do not match our records, try again!'
                ]);
            }
        }
    }

    /**
     * Logout the admin user
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login.form');
    }

    /**
     * Shows all the admins in the website
     */
    public function index() {
        $admins = Admin::latest()->get();
        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Gets the Admin create form
     */
    public function adminCreateForm() {
        return view(('admin.admin.create'));
    }

    /**
     * Creates a new Admin
     */
    public function createAdmin(Request $request) {
        $validatedData = $request->validate([
            'name' => "required|max:255",
            'email' => "required|email|lowercase|max:255|unique:admins",
            'password' => "required|min:6"
        ]);

        if ($validatedData) {
            Admin::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password'])
            ]);
            return to_route('admin.admin.index')->with([
                'message' => 'Admin created successfully'
            ]);
        }
    }

    /**
     * Edit existed Admin
     */
    public function AdminEditForm($id) {
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Updated the Admin Database
     */
    public function updateAdmin(Request $request, $id) {

        $admin = Admin::findOrFail($id);
        // if ($id !== 1) {
        //     throw ValidationException::withMessages(['message' => 'You do not have the permission to perform this action']);
        // }
        $validatedData = $request->validate([
            'name' => "required|max:255",
            'email' => "required|email|lowercase|max:255|unique:admins,email,'.$id",
            'password' => "required|min:6"
        ]);

        if ($validatedData) {
            $admin->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password'])
            ]);
            return to_route('admin.admin.index')->with([
                'message' => 'Admin updated successfully'
            ]);
        }
    }

    /**
     * Deletes an Admin
     */
    public function deleteAdmin($id) {

        // if ($id !== 1) {
        //     throw ValidationException::withMessages(['message' => 'You do not have the permission to perform this action']);
        // }
        try{
            $admin = Admin::findOrFail($id);
            $admin->delete();
            return to_route('admin.admin.index')->with(['message' => 'Admin deleted successfully']);

        }catch(\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong in the frontend']);
        }
    }
}
