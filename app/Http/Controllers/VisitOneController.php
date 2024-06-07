<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OilService;
use App\Models\VisitOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitOneController extends Controller
{
    public function general(Request $request){
        // Validation rules
        $rules = [
            'asset_number' => 'required|string|max:255',
            'general' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $serviceHistory = new VisitOne();
    $serviceHistory->asset_number = $request->input('asset_number');
    $serviceHistory->engineer_id = $request->input('engineer_id');
    $serviceHistory->general = $request->input('general');
    // Set other attributes as needed
    $serviceHistory->save();

        return redirect()->back()->with('success', 'Gneral check up inserted or updated successfully.');

    }


    public function repair(Request $request){
         // Validation rules for repair form
         $rules = [
            'asset_number' => 'required|string|max:255',
            'repair' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $serviceHistory = new VisitOne();
        $serviceHistory->asset_number = $request->input('asset_number');
       $serviceHistory->engineer_id = $request->input('engineer_id');
        $serviceHistory->repair_work = $request->input('repair');
        // Set other attributes as needed
        $serviceHistory->save();

        return redirect()->back()->with('success', 'Repair data inserted or updated successfully.');
    }
    public function oilservice(Request $request){
         // Validation rules for repair form
         $rules = [
            'asset_number' => 'required|string|max:255',
            'oil_service' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        $serviceHistory = new VisitOne();
        $serviceHistory->asset_number = $request->input('asset_number');
        $serviceHistory->engineer_id = $request->input('engineer_id');
        $serviceHistory->last_os_service = $request->input('oil_service');
        // Set other attributes as needed
        $serviceHistory->save(); 

            $oilservice=OilService::where('asset_number',$request->input('asset_number'))
            ->where('engineer_id', $request->input('engineer_id'))
            ->first();
            if ($oilservice) {
                // Record exists, update it
                $oilservice->last_os_service = $request->input('oil_service');
                $oilservice->save();
            } else {
                // Record does not exist, create a new one
                OilService::create([
                    'asset_number' => $request->input('asset_number'),
                    'engineer_id'=>$request->input('engineer_id'),
                    'last_os_service' => $request->input('oil_service'),
                ]);
            }
        // OilService::updateOrCreate(
        //     ['asset_number' =>$request->input('asset_number')],
        //     ['last_os_service' => $request->input('oil_service')]
        // );

        return redirect()->back()->with('success', 'Oil service inserted or updated successfully.');
    }
    public function oilservicedate(Request $request){
         // Validation rules for repair form
         $rules = [
            'asset_number' => 'required|string|max:255',
            'oil_service_date' => 'required|date',
            // Add validation rules for other fields as needed
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       

        $serviceHistory = new VisitOne();
        $serviceHistory->asset_number = $request->input('asset_number');
        $serviceHistory->engineer_id = $request->input('engineer_id');
        $serviceHistory->oil_service_date = $request->input('oil_service_date');
        // Set other attributes as needed
        $serviceHistory->save();

        return redirect()->back()->with('success', 'Oil service Date inserted or updated successfully.');
    }
    public function mobilization(Request $request){
         // Validation rules for repair form
         $rules = [
            'asset_number' => 'required|string|max:255',
            'mobilization' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $serviceHistory = new VisitOne();
        $serviceHistory->asset_number = $request->input('asset_number');
        $serviceHistory->engineer_id = $request->input('engineer_id');
        $serviceHistory->mobilization = $request->input('mobilization');
        // Set other attributes as needed
        $serviceHistory->save();

        return redirect()->back()->with('success', 'mobilization inserted or updated successfully.');
    }
    public function demobilization(Request $request){
         // Validation rules for repair form
         $rules = [
            'asset_number' => 'required|string|max:255',
            'demobilization' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $serviceHistory = new VisitOne();
        $serviceHistory->asset_number = $request->input('asset_number');
        $serviceHistory->engineer_id = $request->input('engineer_id');
        $serviceHistory->demobilization = $request->input('demobilization');
        // Set other attributes as needed
        $serviceHistory->save();
        return redirect()->back()->with('success', 'demobilization inserted or updated successfully.');
    }
}
