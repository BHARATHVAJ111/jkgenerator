<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Followup;
use App\Models\ManageLead;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function storeanddelete(Request $request){
        // dd($request->all());
        $id=$request->id;
       $followup=ManageLead::findOrFail($id);
        // Create a record in the deleted_assets table
       Followup::create([
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
    public function followshow(){
        $followup=Followup::all();
        return view('sales.followup',compact('followup'));
    }
}
