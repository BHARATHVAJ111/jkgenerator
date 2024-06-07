<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\Assign;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    public function store(Request $request){
    //    dd($request->all());
        $id=$request->id;
        $parts=Assets::findOrFail($id);
        $material_code=$parts->jrnum;
        $material_type=$parts->material_type;
        // Validate the incoming request data
        $request->validate([
            'service_engineer'=>'string|required',
            'quantity' => 'numeric|required', 
            'quantity_name' => 'string|required', 
            'date'=>'required|date',
            'description'=>'required|string'
        ]);

        // Create a new record in the first table
        $firstTableData = Assign::create([
            'jrnum'=>$material_code,
            'material_type' => $material_type,
            'service_engineer'=>$request->service_engineer,
            'quantity'=>$request->quantity,
            'quantity_name'=>$request->quantity_name,
            'date'=>$request->date,
            'description'=>$request->description,
        ]);
          // Retrieve the total quantity from the first table
        $minusQuantity = $parts->number_of_quantity - $firstTableData->quantity;
       

        // Update or create a record in the second table
        $parts->update(
            ['number_of_quantity'=>$minusQuantity]
         );

        // Redirect or return a response as needed
        return redirect()->route('store.index')->with('success', 'Quantity stored and Parts table Quantity updated successfully');
    }

}
