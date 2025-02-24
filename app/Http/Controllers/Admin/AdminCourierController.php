<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCourierRequest;
use App\Models\Courier;
use Illuminate\Http\Request;

class AdminCourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couriers = Courier::latest()->get();
        return view('admin.courier.index', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCourierRequest $request)
    {
       if ($request->validated()) {
           Courier::create($request->validated());
           return to_route('admin.courier.index')->with([
            'success' => 'Courier has been created successfully'
           ]);
       }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courier = Courier::findOrFail($id);
        return view('admin.courier.edit', compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminCourierRequest $request, string $id)
    {
        $courier = Courier::findOrFail($id);
        $courier->name = $request->name;
        $courier->phone = $request->phone;

        $courier->update();
        return to_route('admin.courier.index')->with([
            'success' => 'Courier updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $courier = Courier::findOrFail($id);
            $courier->delete($id);

            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong in the frontend']);
        }
    }
}
