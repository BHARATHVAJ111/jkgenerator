<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denied;
use App\Models\Followup;
use App\Models\ManageLead;
use Illuminate\Http\Request;

class DeniedController extends Controller
{
    public function storeanddelete(Request $request){
        $id=$request->id;
       $denied=ManageLead::findOrFail($id);
        // Create a record in the deleted_assets table
        Denied::create([
            'source' => $denied->source,
            'enquiry_date' => $denied->enquiry_date,
            'capacity' => $denied->capacity,
            'duration' => $denied->duration,
            'cost' => $denied->cost,
            'company_name' => $denied->company_name,
            'contact_number' => $denied->contact_number,
            'email_id' => $denied->email_id,
            'location' => $denied->location,
            'quote_no' => $denied->quote_no,
        ]);

        // Delete the asset
        $denied->delete();

        // Redirect or return a response
        return redirect()->back();
    
    }

    public function deniedshow(){
        $denied=Denied::all();
        return view('sales.denied',compact('denied'));
    }

    public function followstoreanddelete(Request $request){
        $id=$request->id;
       $denied=Followup::findOrFail($id);
        // Create a record in the deleted_assets table
        Denied::create([
            'source' => $denied->source,
            'enquiry_date' => $denied->enquiry_date,
            'capacity' => $denied->capacity,
            'duration' => $denied->duration,
            'cost' => $denied->cost,
            'company_name' => $denied->company_name,
            'contact_number' => $denied->contact_number,
            'email_id' => $denied->email_id,
            'location' => $denied->location,
            'quote_no' => $denied->quote_no,
        ]);

        // Delete the asset
        $denied->delete();

        // Redirect or return a response
        return redirect()->back();
    
    }
}
