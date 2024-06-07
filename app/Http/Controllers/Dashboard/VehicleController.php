<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleHistory;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
 
   public function vehicleindex(){
      $vehicle=Vehicle::all();
      return view('assets.view',compact('vehicle'));
   }

   public function vehiclestore(Request $request){
      // dd($request->all());
       // Define validation rules
       $rules = [
         'vehicle_no' => 'required|numeric',
         'type' => 'required|in:2w,4w', // Assuming only 2w and 4w are allowed
         'alloted_to' => 'required|string|max:255',
         'chasis_no' => 'required|string|max:255',
         'engine_srno' => 'required|string|max:255',
         'vehicle_make' => 'required|string|max:255',
         'last_service_record' => 'required|string|max:255',
         'last_service_km' => 'required|numeric',
         'last_service_spares' => 'required' // Assuming only yes or no are allowed
     ];
     
     // Validate the request data
     $validatedData = $request->validate($rules);
     
     // If validation passes, insert the data into the database
     Vehicle::create($validatedData);
     
     return redirect()->route('vehicle.index')->with('success', 'Vehicle Details Inserted successfully.');
   }

   public function vehiclehistory(Request $request)
   {
      $vehicle=$request->vehicle_no;
      return view('vehicle.vehiclehistory',compact('vehicle'));
     }

     public function vehiclehistorystore(Request $request)
     {
      $validated = $request->validate([
         'date' => 'required|date',
         'description' => 'required|string|max:255',
     ]);

     $store=VehicleHistory::create([
      'vehicle_no'=>$request->vehicle_no,
      'date'=>$request->date,
      'description'=>$request->description,
     ]);

     return redirect()->back()->withSuccess('Vehicle History Store Successfully!');


     }

     public function historyview(Request $request){
      $history=VehicleHistory::where('vehicle_no',$request->vehicle_no)->get();
      return view('vehicle.historyview',compact('history'));
     }
     public function vehicledelete(Request $request){

      dd($request->all());
      $vehicle=Vehicle::fintOrFail($request->vehicle_no);

      if($vehicle){
         $vehicle->delete();
         return redirect()->back()->withSuccess('Vehicle Delete Successfully !');
      }else{
         return redirect()->back()->withErrors('Vehicle Not Found');
      }
     }
}
