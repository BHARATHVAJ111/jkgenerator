<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EngineerStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EngineerStoreController extends Controller
{
    public function index(){
        $data=EngineerStore::all();
      return view('engineer.index',compact('data'));
    }
    public function request(Request $request){
        // dd($request->all());
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|min:10|max:15',
        ];
        $messages = [
            'phone.min' => 'The phone number must be at least 10 characters.',
            'phone.max' => 'The phone number may not be greater than 15 characters.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
        $user = new EngineerStore();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('engineer.index')->withSuccess('Engineer Details Inserted Successfully!');
    }
    public function show(Request $request){
        $id=$request->id;
        $data=EngineerStore::findOrFail($id);
        return view('engineer.show',compact('data'));
    }
    public function edit(Request $request){
        $id=$request->id;
        $data=EngineerStore::findOrFail($id);
        return view('engineer.update',compact('data'));
    }
    

public function update(Request $request)
{

    // dd($request->all());
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:255',
    ]);

    // Find the engineer record by ID
    $engineer = EngineerStore::findOrFail($request->id);

    // Update the record with new values
    $engineer->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);

    // Redirect back with a success message
    return redirect()->route('engineer.index')->with('success', 'Engineer Details updated successfully.');
}
public function delete(Request $request){
    $id=$request->id;
    $data=EngineerStore::findOrFail($id);
    $data->delete();

    return redirect()->route('engineer.index')->withSuccess('Engineer Details Deleted Successfully!');
}

}
