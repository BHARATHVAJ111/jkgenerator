<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailStore;
use App\Models\Generator;
use App\Models\ManegeEmail;
use App\Models\MasterHistory;
use App\Models\Mobilization;
use App\Models\MobilizationHistory;
use App\Models\Movement;
use App\Models\Movementhistory;
use App\Models\Remarks;
use App\Models\ServiceEngineerAssign;
use Illuminate\Http\Request;

class MovementController extends Controller
{


    public function image(Request $request){
        $asset_number=$request->asset_number;
        return view('mobilization.image',compact('asset_number'));
    }
    public function status(Request $request)
    {
        // Validate the request
    $request->validate([
        'imageone' => 'required|mimes:jpeg,jpg,png,gif|max:2048',  // Ensure file is an image
        'imagetwo' => 'required|mimes:jpeg,jpg,png,gif|max:2048',  // Ensure file is an image
        'imagethree' => 'required|mimes:jpeg,jpg,png,gif|max:2048',  // Ensure file is an image
    ]);

    // Handle the file upload
    if ($request->hasFile('imageone') && $request->hasFile('imagetwo') && $request->hasFile('imagethree')) {
        $pathOne = $request->file('imageone')->store('images', 'public');
        $pathTwo = $request->file('imagetwo')->store('images', 'public');
        $pathThree = $request->file('imagethree')->store('images', 'public');

        // Store the paths in the database
        ManegeEmail::create([
            'asset_number' => $request->asset_number,
            'imageone' => $pathOne,
            'imagetwo' => $pathTwo,
            'imagethree' => $pathThree,
        ]);
    } else {
        // If the files were not uploaded, return an error
        return back()->withErrors('Failed to upload images. Please try again.');
    }
    
        $assetNumber = $request->asset_number;

        // Retrieve the record from the table using the asset number
        $record = DetailStore::where('asset_number', $assetNumber)->first();

        $mobilization = Mobilization::where('asset_number', $assetNumber)->first();
        if ($mobilization) {
            $store = MobilizationHistory::create([
                'asset_number' => $mobilization->asset_number,
                'client_name' => $mobilization->client_name,
                'location' => $mobilization->location,
                'open_hr' => $mobilization->open_hr,
                'open_date' => $mobilization->open_date,
                'last_os_hr' => $mobilization->last_os_hr,
                'last_os_date' => $mobilization->last_os_date,
                'movement' => $mobilization->movement,
                'closing_hr' => $mobilization->closing_hr,
                'closing_date' => $mobilization->closing_date,
            ]);
        } else {
            return redirect()->route('service.index')->withSuccess('Record not found');
        }

        $mobilization->delete();

        if ($record) {
            // Update the status column from 0 to 1
            $record->status = 1;
            $record->save();

            // Optionally, you can return a response indicating success
            return redirect()->route('service.index')->withSuccess('Status updated successfully');
        } else {
            // Optionally, handle the case when no record is found
            return redirect()->route('service.index')->withSuccess('Record not found');
        }
    }
    public function submit(Request $request)
    {
        $Closure = Movement::findOrFail($request->id);

        return view('movement.submit', compact('Closure'));
    }
    public function submitform(Request $request)
    {

        // Validate input
        $request->validate([
            'input_field' => 'required|date',
            'textarea' => 'required|string',
        ]);

        // Store data to table
        // You can replace 'YourModel' with your actual model name
        Remarks::create([
            'input_field' => $request->input_field,
            'textarea' => $request->textarea,
            'asset_number' => $request->asset_number,
        ]);

        $additionalData = Generator::where('asset_number', $request->asset_number)->first();

        if ($additionalData) {
            $additionalData->status = '1'; // Set your desired status here
            $additionalData->save();
        }

        return redirect()->route('master.movementshow')->withSuccess('Generator Submitted Successfully.');
    }


    public function show(Request $request){
        $assetnumber=$request->asset_number;
        $closure=Movement::findOrFail($request->id);
        return view('closure.show',compact('closure'));
    }
    public function delete(Request $request)
    {
        $movement = Movement::findOrFail($request->id);
        // $attributes = $movement->toArray(); // Extract attributes from the Movement instance
        // unset($attributes['id']); // Remove the 'id' attribute if present
        Movementhistory::create([
            'service_engineer' => $movement->service_engineer,
            'engineer_id' => $movement->engineer_id,
            'asset_number' => $movement->asset_number,
            'engine_srno' => $movement->engine_srno,
            'engine_make' => $movement->engine_make,
            'alternator_srno' => $movement->alternator_srno,
            'alternator_make' => $movement->alternator_make,
            'battery_srno' => $movement->battery_srno,
            'battery_make' => $movement->battery_make,
            'oil_filter_part' => $movement->oil_filter_part,
            'diesel_filter_part' => $movement->diesel_filter_part,
            'air_filter_part' => $movement->air_filter_part,

        ]); // Pass the extracted attributes to create() method


        $serviceEngineerAssign = ServiceEngineerAssign::where('asset_number', $request->asset_number)->get();
        foreach ($serviceEngineerAssign as $assign) {
            $assign->delete(); // Delete each individual model instance
        }
        // $attributes2 = $serviceEngineerAssign->toArray();
        // unset($attributes2['id']);
        MasterHistory::create([
            'service_engineer' => $movement->service_engineer,
            'engineer_id' => $movement->engineer_id,
            'asset_number' => $movement->asset_number,
            'engine_srno' => $movement->engine_srno,
            'engine_make' => $movement->engine_make,
            'alternator_srno' => $movement->alternator_srno,
            'alternator_make' => $movement->alternator_make,
            'battery_srno' => $movement->battery_srno,
            'battery_make' => $movement->battery_make,
            'oil_filter_part' => $movement->oil_filter_part,
            'diesel_filter_part' => $movement->diesel_filter_part,
            'air_filter_part' => $movement->air_filter_part,

        ]);
        // MasterHistory::create($attributes2);

        $additionalData = Generator::where('asset_number', $request->asset_number)->first();

        if ($additionalData) {
            $additionalData->status = '1'; // Set your desired status here
            $additionalData->save();
        }

        $movement->delete();

        return redirect()->route('master.master')->withSuccess('Geneator Deleted Successfully and Store to History!');
    }
}
