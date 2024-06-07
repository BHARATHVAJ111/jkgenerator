<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendConvertEmail;
use App\Mail\ServiceMail;
use App\Mail\Movementmail;
use App\Models\Convert;
use App\Models\Followup;
use App\Models\ManageLead;
use App\Models\Movement;
use App\Models\Movementhistory;
use App\Models\ServiceEngineerAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormMail;
use App\Models\Generator;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function Emailview(Request $request) {
      $id=$request->id;
      $convert = Convert::findOrFail($id); // Assuming Convert is your model
      // dd($convert);
       
      return view('email',compact('convert'));
       
    }
    public function Emailviewfollowup(Request $request) {
      $id=$request->id;
      $convert = Followup::findOrFail($id); // Assuming Convert is your model
      // dd($convert);
       
      return view('email',compact('convert'));
       
    }
    public function Emailviewmanage(Request $request) {
      $id=$request->id;
      $convert = ManageLead::findOrFail($id); // Assuming Convert is your model
      return view('email',compact('convert'));
       
    }


    public function sendcontact(Request $request){
      // dd($request->all());
      $source = $request->source;
      $enquiry_date = $request->enquiry_date;
      $capacity = $request->capacity;
      $duration = $request->duration;
      $cost = $request->cost;
      $company_name = $request->company_name;
      $contact_number = $request->contact_number;
      $email = $request->email;
      $quote_no = $request->quote_no;
      // Retrieve the file from the request
      $file = $request->file('attachment');

      // Pass the data to the Mailable constructor
      $contact_data = [
        'source' => $source,
        'enquiry_date' => $enquiry_date,
        'capacity' => $capacity,
        'duration' => $duration,
        'cost' => $cost,
        'company_name' => $company_name,
        'contact_number' => $contact_number,
        'email' => $email,
        'quote_no' => $quote_no,
        // 'file' => $file, // Include the file in the data array
        // Other data
    ];

    // Send the email with the data
    Mail::to($contact_data['email'])->send(new FormMail($contact_data));

    return redirect()->back()->withSuccess('Email has been sent');
    
    }

    public function sendservicemail(Request $request){
      // $id=$request->asset;
      // dd($request->all());
   
      $validator = Validator::make($request->all(), [
        'dg' => 'required|string|max:255',
        'date' => 'required|date',
        'customer_name' => 'required|string|max:255',
        'engine_make' => 'required|string|max:255',
        'engine_srno' => 'required|string|max:255',
        'alternative_make' => 'required|string|max:255',
        'alternative_srno' => 'required|string|max:255',
        'battery_make' => 'required|string|max:255',
        'battery_srno' => 'required|string|max:255',
        'email_id' => 'required|email',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

       // Pass the data to the Mailable constructor
       $contact_data = [
        'dg' => $request->dg,
        'date' => $request->date,
        'customer_name' => $request->customer_name,
        'engine_make' =>$request->engine_make,
        'engine_srno' => $request->engine_srno,
        'alternative_make' => $request->alternativa_make,
        'alternative_srno' => $request->alternative_srno,
        'battery_make' => $request->battery_make,
        'battery_srno' => $request->battery_srno,
        'email_id'=>$request->email_id,
         
        // Other data
    ];
    
    Mail::to($contact_data['email_id'])->send(new ServiceMail($contact_data));

  //   $additionalData = Generator::where('asset_number', $request->asset)->first();
  //   if ($additionalData) {
  //     $additionalData->status = '0'; // Set your desired status here
  //     $additionalData->save();
  // }

  return redirect()->back();

    }

    public function EmailMovement(Request $request){
      $id=$request->id;
      $values=Movement::findOrFail($id);
      return view('emails.movement',compact('values'));
    }

    public function sendmovementmail(Request $request){
      $name = $request->name;
      $email_id = $request->email_id;
      // $company_name = $request->company_name;
      // $service_engineer = $request->service_engineer;
      // $location = $request->location;
      // $open_date = $request->open_date;
      // $open_hour = $request->open_hour;

       // Pass the data to the Mailable constructor
       $contact_data = [
         'name' => $name,
         'email_id' => $email_id,
         //  'customer_name' => $customer_name,
         // 'service_engineer' => $service_engineer,
        // 'location' => $location,
        // 'open_date' => $open_date,
        // 'open_hour' => $open_hour,
        // Other data
    ];
    
    Mail::to($contact_data['email_id'])->send(new Movementmail($contact_data));
    
    $additionalData = Generator::where('asset_number', $request->asset)->first();
    if ($additionalData) {
      $additionalData->status = '1'; // Set your desired status here
      $additionalData->save();
    }
    $id=$request->id;
      $values=Movement::findOrFail($id);
      $attributes = $values->toArray();
      // Remove the 'id' attribute from the array if present
      unset($attributes['id']);
      // Create a new record in the Movement table with the attributes
      Movementhistory::create($attributes);
    
    $values->delete();
    
    return redirect()->route('service.index');
    
  }

}
