<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\EngineerStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssetsController extends Controller
{
    public function storeassets(Request $request){

        // dd($request->all());
        // $validatedData = $request->validate([
        //     'material_name' => ['required', 'string'],
        //     'material_type' => ['required', 'string'],
        //     'quantity' => ['required'],
        //     'number_of_quantity' => ['required', 'numeric'],
        //     'description' => ['required', 'string'],
        // ]);
        $validatedData = Validator::make($request->all(), [
            'material_name' => 'required|string',
            'location'=>'required|string',
            'material_type' => 'required|string,',
            'quantity' => 'required|string',
            'number_of_quantity' => 'required|numeric',
            'description' => 'required|max:255',
        ]);


        if (!$validatedData) {
            return response()->json([
                'status' => 422,
                'error' => $validatedData->errors()
            ], 422);
        } 
        else{
            $detail = Assets::create([
                'material_name' => $request->material_name,
                'location'=>$request->location,
                'material_type' => $request->material_type,
                'quantity' => $request->quantity,
                'number_of_quantity' => $request->number_of_quantity,
                'description' => $request->description,
            ]);
        }

        return redirect()->back()->with('success', 'Parts Inserted Successfully');

      

        
    }

    public function assetsedit($id){
        $value = Assets::findOrFail($id);
        return view('assets.edit',compact('value'));
    }
   public function assign($id){
    $value = Assets::findOrFail($id);
    $engineer=EngineerStore::all();
    return view('assign',compact('value','engineer'));
   }

 

   public function assetsupdate(){
    return ('update');
   }
 

}

