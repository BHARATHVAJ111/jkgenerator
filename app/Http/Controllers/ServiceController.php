<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailStore;
use App\Models\EngineerStore;
use App\Models\Generator;
use App\Models\Generatorassign;
use App\Models\Mobilization;
use App\Models\ServiceEngineerAssign;
use App\Models\Servicehistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Generatorassign::all();
        $detailhistory = [];
        
        foreach ($data as $generator) {
            $asset_number = $generator->asset_number;
            $detail = DetailStore::where('asset_number', $asset_number)->first();
            
            if ($detail) {
                $detailhistory[$asset_number] = $detail;
            }
        }
    
        return view('service.serviceindex', compact('data', 'detailhistory'));
    }
    
    public function mail(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $generator=Generator::where('asset_number',$request->asset_number)->first();
        // $values = DetailStore::findOrFail($id);
        return view('emails.servicemailform', compact('generator'));
    }
    public function show(Request $request)
    {
        $id = $request->id;
        $generator = Generatorassign::findOrFail($id);
        return view('service.serviceshow', compact('generator'));
    }
    public function details(Request $request){
        
        $id = $request->id;
        $generator = Generatorassign::findOrFail($id);
        $servicehistory=Servicehistory::where('asset_number',$request->asset_number)->first();
        return view('service.servicedetails',compact('generator','servicehistory'));
    }
    public function detailstore(Request $request){
    
       
        // Validation rules
        $rules = [
            'client_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'open_hr' => 'nullable|numeric',
            'open_date' => 'nullable|date',
            'movement' => 'required|string',
            'last_os_date'=>'required|date',
            'closing_hr' => 'nullable|numeric',
            'closing_date' => 'nullable|date',
        ];

        // Custom error messages
     
         // Find the existing detail by asset number
    $detail = DetailStore::where('asset_number', $request->asset_number)->first();

    // Update existing detail if found, otherwise create a new one
    if ($detail) {
        $detail->update([
            'client_name' => $request->client_name,
            'location' => $request->location,
            'open_hr' => $request->open_hr,
            'open_date' => $request->open_date,
            'last_os_hr' => $request->last_os_hr,
            'last_os_date' => $request->last_os_date,
            'movement' => $request->movement,
            'closing_hr' => $request->closing_hr,
            'closing_date' => $request->closing_date,
        ]);
    } else {
        DetailStore::create([
            'asset_number' => $request->asset_number,
            'client_name' => $request->client_name,
            'location' => $request->location,
            'open_hr' => $request->open_hr,
            'open_date' => $request->open_date,
            'last_os_hr' => $request->last_os_hr,
            'last_os_date' => $request->last_os_date,
            'movement' => $request->movement,
            'closing_hr' => $request->closing_hr,
            'closing_date' => $request->closing_date,
        ]);
    }


        // Redirect back with success message
        return redirect()->route('service.index')->with('success', 'Detail Store Successfully.');
    }

    public function toggle(Request $request){
        
        $id=$request->id;
        $detailhistory=DetailStore::findOrFail($id);
       
        if($detailhistory){
            $store=Mobilization::create([
            'asset_number'=>$detailhistory->asset_number,
            'client_name'=>$detailhistory->client_name,
            'location'=>$detailhistory->location,
            'open_hr'=>$detailhistory->open_hr,
            'open_date'=>$detailhistory->open_date,
            'last_os_hr'=>$detailhistory->last_os_hr,
            'last_os_date'=>$detailhistory->last_os_date,
            'movement'=>$detailhistory->movement,
            'closing_hr'=>$detailhistory->closing_hr,
            'closing_date'=>$detailhistory->closing_date,
            ]);
        }
        if($detailhistory){
            $detailhistory->buttons = '1'; // Set your desired status here
            $detailhistory->save();
        }
        
        return redirect()->route('service.index')->withSuccess('Movement Store to Mobilization');

    }

    public function clear(Request $request){
        $id=$request->id;
        $detailhistory=DetailStore::findOrFail($id);

        if($detailhistory){
            $detailhistory->buttons = '0'; // Set your desired status here
            $detailhistory->save();
        }

        $asset_number = $request->asset_number;

        // Delete corresponding data from the Mobilization table
        Mobilization::where('asset_number', $asset_number)->delete();
        return redirect()->route('service.index')->withSuccess(' Mobilization Deleted!');

    }
    public function assign(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $generator = Generatorassign::findOrFail($id);
        $engineer = EngineerStore::all();
        $detailhistory=DetailStore::where('asset_number',$request->asset_code)->first();
        
        return view('service.serviceassign', compact('detailhistory','generator', 'engineer'));
    }

    public function assignengineer(Request $request)
    {
        // dd($request->all());
        $additionalData = Generator::where('asset_number', $request->asset_number)->first();
        // dd($additionalData);
        if ($additionalData) {
            $additionalData->status = '0'; // Set your desired status here
            $additionalData->save();
        }
        $engineer = EngineerStore::where('engineer_id', $request->engineer_id)->get();
//    dd($engineer);
        $name = $engineer[0]->name;

        $validator = Validator::make($request->all(), [

            'customer_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'open_hr' => 'required|numeric',
            'open_date' => 'required|date',
            'engine_srno' => 'required|string|max:255',
            'engine_make' => 'required|string|max:255',
            'alternator_srno' => 'required|string|max:255',
            'alternator_make' => 'required|string|max:255',
            'battery_srno' => 'required|string|max:255',
            'battery_make' => 'required|string|max:255',
            'oilfilter' => 'required|string|max:255',
            'dieselfilter' => 'required|string|max:255',
            'airfilter' => 'required|string|max:255',
            'engineer_id' => 'required',
        ]);
        // $open_hr = date('H:i', strtotime($request->input('open_hr')));
        // $last_os_hr = date('H:i', strtotime($request->input('last_os_hr')));
        ServiceEngineerAssign::create([
            'service_engineer' => $name,
            'customer_name' => $request->customer_name,
            'location' => $request->location,
            'open_hr' => $request->open_hr,
            'open_date' => $request->open_date,
            'asset_number' => $request->asset_number,
            'engine_srno' => $request->engine_srno,
            'engine_make' => $request->engine_make,
            'alternator_srno' => $request->alternator_srno,
            'alternator_make' =>$request->alternator_make,
            'battery_srno' =>$request->battery_srno,
            'battery_make' => $request->battery_make,
            'oil_filter_part' => $request->oilfilter,
            'diesel_filter_part' => $request->dieselfilter,
            'air_filter_part' =>$request->airfilter,
            'engineer_id' => $request->engineer_id,
        ]);
        $id = $request->id;
        $generator = Generatorassign::findOrFail($id);
        // $generator->delete();
        return redirect()->route('service.index')->with('success', 'Waiting Stock Assign to Service Engineer and Delete Successfully!');
    }

    public function mobilization(){
        $mobilization = Mobilization::all();
        return view('mobilization.index', compact('mobilization'));   
    }

    public function delete(Request $request){

        $waiting_stock=Generatorassign::findOrFail($request->id);
        $waiting_stock->delete();
        return redirect()->route('service.index')->withSuccess('Waiting Stock Reject Successfully!');

    }
}
