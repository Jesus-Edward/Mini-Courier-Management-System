<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminParcelCreateRequest;
use App\Http\Requests\AdminParcelUpdateRequest;
use App\Models\Courier;
use App\Models\Parcel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcels = Parcel::latest()->get();
        $couriers = Courier::all();

        return view('admin.parcel.index', compact('parcels', 'couriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $couriers = Courier::all();
        $users = User::all();
        return view('admin.parcel.create', compact('couriers', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminParcelCreateRequest $request)
    {
        $parcel = new Parcel();
        $parcel->name = $request->name;
        $parcel->tracking_number = $parcel->generateTrackingNumber();
        $parcel->qty = $request->qty;
        $parcel->size = $request->size;
        $parcel->receiver_name = $request->receiver_name;
        $parcel->receiver_location = $request->receiver_location;
        $parcel->price = $request->price;
        $parcel->estimated_delivery_date = $request->estimated_delivery_date;
        $parcel->user_id = $request->user;
        $parcel->parcel_image = $this->saveImage($request, 'parcel_image');
        $parcel->courier_id = $request->courier;

        $parcel->save();
        return to_route('admin.parcel.receipt', ['parcel' => $parcel->id]);
    }

    /**
     * Generate receipt for a product
     */
    public function receipt($id) {
        $parcel = Parcel::with('user')->findOrFail($id);

        $pdf = Pdf::loadView('admin.parcel.receipt', compact('parcel'));
        return $pdf->download('receipt_'.$parcel->tracking_number.'.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parcel = Parcel::findOrFail($id);
        $couriers = Courier::all();
        $users = User::all();
        return view('admin.parcel.edit', compact('parcel', 'couriers', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminParcelUpdateRequest $request, string $id)
    {
        $parcel = Parcel::findOrFail($id);
        $imagePath = $this->saveImage($request, 'parcel_image', $parcel->parcel_image);

        $parcel->name = $request->name;
        // $parcel->tracking_number = $parcel->generateTrackingNumber();
        $parcel->qty = $request->qty;
        $parcel->size = $request->size;
        $parcel->receiver_name = $request->receiver_name;
        $parcel->receiver_location = $request->receiver_location;
        $parcel->price = $request->price;
        $parcel->estimated_delivery_date = $request->estimated_delivery_date;
        $parcel->status = $request->status;
        $parcel->parcel_image = !empty($imagePath) ? $imagePath : $parcel->parcel_image;
        $parcel->courier_id = $request->courier;
        $parcel->user_id = $request->user;

        $parcel->update();
        return to_route('admin.parcel.receipt', ['parcel' => $parcel->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $parcel = Parcel::findOrFail($id);
            $this->removeImage($parcel->parcel_image);
            $parcel->delete($id);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong in the frontend']);
        }
    }

    public function saveImage($request, $inputName, $oldPath = NULL, $path = "images/parcels")
    {

        if ($request->hasFile($inputName)) {
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            };
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
        return NULL;
    }

    public function removeImage($file)
    {
        $path = public_path('images/parcels/' . $file);

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
