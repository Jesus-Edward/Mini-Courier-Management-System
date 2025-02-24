<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    public function tracking($tracking_number)
    {

        $tracking = Parcel::with('courier', 'user')->where('tracking_number', $tracking_number)->first();

        if (!$tracking) {
            return response()->json([
                'error' => 'Tracking number could not be found!'
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $tracking,
            ]);
        }
    }

    public function userParcel(Request $request)
    {
        $user = $request->user()->id;
        $parcels = Parcel::where('user_id', $user)->get();

        if (!$user) {
            return response()->json([
                'error' => 'Not authenticated'
           ], 401);
        }
        return response()->json([
            'data' => $parcels
        ]);

        // $parcels = $user->parcels()->get();

        // if (!$user) {
        //     return response()->json([
        //         'error' => 'Not authenticated'
        //     ]);
        // }
        // return response()->json([
        //     'data' => $parcels
        // ]);
    }
}
