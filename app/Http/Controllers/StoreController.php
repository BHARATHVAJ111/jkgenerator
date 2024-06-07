<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\EngineerStore;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function indexstore(Request $request){
        $assets=Assets::all();
        $engineer=EngineerStore::all();
        return view('store',compact('assets','engineer'));
    }

    public function partsshow(Request $request){
        $id=$request->id;
        $partsshow=Assets::findOrFail($id);
        return view('parts.partsshow',compact('partsshow'));   
    }

    public function partsedit(Request $request){
        $id=$request->id;
        $edit=Assets::findOrFail($id);
        return view('parts.partsedit',compact('edit'));
    }
    public function partsupdate(Request $request){
        // dd($request->all());
        $id=$request->id;
        $edit=Assets::findOrFail($id);
        $validatedData = $request->validate([
            'material_name' => 'required|string',
            'location'=>'required|string',
            'material_type' => 'required',
            'quantity' => 'required',
            'number_of_quantity' => 'required|numeric',
            'description' => 'required',
        ]);
    
        Assets::where('id', $id)->update([
            'material_name' => $validatedData['material_name'],
            'location'=>$validatedData['location'],
            'material_type' => $validatedData['material_type'],
            'quantity' => $validatedData['quantity'],
            'number_of_quantity' => $validatedData['number_of_quantity'],
            'description' => $validatedData['description'],
        ]);
    
        return redirect()->route('store.index')->with('success', 'Parts updated successfully');
    }
    public function partsdelete(Request $request){
        $id=$request->id;
        $parts=Assets::findOrFail($id);
        $parts->delete();
        return redirect()->route('store.index')->with('success', 'Parts Deleted successfully');

       }
}
