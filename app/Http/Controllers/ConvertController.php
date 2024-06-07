<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Convert;
use App\Models\Followup;
use App\Models\ManageLead;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function storeanddelete(Request $request){
        // dd($request->all());
        $id=$request->id;
       $convert=ManageLead::findOrFail($id);
        // Create a record in the deleted_assets table
       Convert::create([
            'source' => $convert->source,
            'enquiry_date' => $convert->enquiry_date,
            'capacity' => $convert->capacity,
            'duration' => $convert->duration,
            'cost' => $convert->cost,
            'company_name' => $convert->company_name,
            'contact_number' => $convert->contact_number,
            'email_id' => $convert->email_id,
            'location' => $convert->location,
            'quote_no' => $convert->quote_no,
        ]);

        // Delete the asset
        $convert->delete();

        // Redirect or return a response
        return redirect()->back();
    
    }
    public function convertshow(){
        $convert=Convert::all();
        return view('sales.convert',compact('convert'));
    }


    // FOLLOW UP FUNCTION FOR CONVERT
    public function followstoreanddelete(Request $request){
        // dd($request->all());
        $id=$request->id;
       $followup=Followup::findOrFail($id);
        // Create a record in the deleted_assets table
       Convert::create([
            'source' => $followup->source,
            'enquiry_date' => $followup->enquiry_date,
            'capacity' => $followup->capacity,
            'duration' => $followup->duration,
            'cost' => $followup->cost,
            'company_name' => $followup->company_name,
            'contact_number' => $followup->contact_number,
            'email_id' => $followup->email_id,
            'location' => $followup->location,
            'quote_no' => $followup->quote_no,
        ]);

        // Delete the asset
        $followup->delete();

        // Redirect or return a response
        return redirect()->back();
    
    }

}
