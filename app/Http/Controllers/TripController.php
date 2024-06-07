<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TruckType;
use App\Models\Indent;


class TripController extends Controller
{
    public function confirmedTrips()
    {
        $user = Auth::user();
    
        // Fetch all indents with status '1' belonging to the authenticated user
        $confirmedTrips = Indent::where('user_id', $user->id)
            ->where('status', '1')
            ->get();
    
        // You can customize the view or return JSON, depending on your application
        return view('truck.truck-page')->with(compact('confirmedTrips'));
    }
    public function waitDriver()
    {
        // You can customize the view or return JSON, depending on your application
        return view('truck.waitDriver');
    }
}
