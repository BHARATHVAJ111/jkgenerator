<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\Quantity;
use Illuminate\Http\Request;

class QuantityController extends Controller
{
    public function store(Request $request){
        $id=$request->id;
        $parts=Assets::findOrFail($id);
        $material_code=$parts->jrnum;
        $material_type=$parts->material_type;
        $material_quantity=$parts->number_of_quantity;
        // Validate the incoming request data
        $request->validate([
            'add_quantity' => 'numeric|required',
            'date'=>'required' // Adjust validation rules as needed
        ]);

        // Create a new record in the first table
        $firstTableData = Quantity::create([
            'jrnum'=>$material_code,
            'material_type' => $material_type,
            'number_of_quantity'=>$material_quantity,
            'add_quantity' => $request->add_quantity, // Assuming you're passing total_quantity from the form
            'total_quantity'=>$request->total_quantity,
            'date'=>$request->date,
            // Add more fields as needed
        ]);
          // Retrieve the total quantity from the first table
        $totalQuantity = $firstTableData->total_quantity;
       

        // Update or create a record in the second table
        $parts->update(
            ['number_of_quantity'=>$totalQuantity]
         );
    //    Assets::updateOrCreate(
    //      ['number_of_quantity' => $totalQuantity]
    //     );

        // Redirect or return a response as needed
        return redirect()->route('store.index')->with('success', 'Quantity stored and Parts Quantity updated successfully');
    }
}
