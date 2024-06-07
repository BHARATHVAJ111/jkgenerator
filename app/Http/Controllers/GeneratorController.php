<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Generator;
use App\Models\Generatorassign;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    public function assetsindex()
    {
        $generator = Generator::all();
        return view('assets.index', compact('generator'));
    }
    public function generatorshow(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $generator = Generator::findOrFail($id);
        // dd($generator);
        return view('generator.generatorshow', compact('generator'));
    }
    public function generatoredit(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $generator = Generator::findOrFail($id);
        // dd($generator);
        return view('generator.generatoredit', compact('generator'));
    }
    public function generatorupdate(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $validatedData = $request->validate([
            'engine_srno' => 'required',
            'engine_make' => 'required',
            'alternator_srno' => 'required',
            'alternator_make' => 'required',
            'battery_srno' => 'required',
            'battery_make' => 'required',
            'oil_filter_part' => 'required',
            'diesel_filter_part' => 'required',
            'air_filter_part' => 'required',
            'asset_photos' => 'required',
        ]);
      // Handle file upload if a new file is provided
      if ($request->hasFile('asset_photos')) {
        $file = $request->file('asset_photos');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/assets', $fileName);
        $validatedData['asset_photos'] = $fileName;
    }
        $asset = Generator::findOrFail($id);
        $asset->update([
            'engine_srno' => $request->engine_srno,
            'engine_make' => $request->engine_make,
            'alternator_srno' => $request->alternator_srno,
            'alternator_make' => $request->alternator_make,
            'battery_srno' => $request->battery_srno,
            'battery_make' => $request->battery_make,
            'oil_filter_part_code' => $request->oil_filter_part,
            'diesel_filter_part_code' => $request->diesel_filter_part,
            'air_filter_part_code' => $request->air_filter_part,
            'asset_photos' => $request->asset_photos,
        ]);
    
        return redirect()->route('assets.index')->with('success', 'Geneator Deatails Updated Successfully');
    
    }

  public function generatordelete(Request $request){
    $id=$request->id;
    $generator=Generator::findOrFail($id);
    $generator->delete();
    return redirect()->route('assets.index')->with('success', 'Geneator Deatails Deleted successfully');
  }
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'engine_srno' => 'required|numeric',
            'dg_range'=>'required|numeric',
            'engine_make' => 'required|string|max:255',
            'alternator_srno' => 'required|numeric',
            'alternator_make' => 'required|string|max:255',
            'battery_srno' => 'required|numeric',
            'battery_make' => 'required|string|max:255',
            'oil_filter_part' => 'required|string|max:255',
            'diesel_filter_part' => 'required|string|max:255',
            'air_filter_part' => 'required|string|max:255',
            'asset_photos' => 'required' // Assuming you're uploading images
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);

        // If validation passes, insert the data into the database
        // Generator::create([
        //     'engine_srno' => $rules->engine_srno,
        //     'engine_make' => $rules->engine_make,
        //     'alternator_srno' => $rules->alternator_srno,
        //     'alternator_make' => $rules->alternator_make,
        //     'battery_srno' => $rules->battery_srno,
        //     'battery_make' => $rules->engine_srno,
        //     'oil_filter_part' => $rules->engine_srno,
        //     'diesel_filter_part' => $rules->engine_srno,
        //     'air_filter_part' => $rules->engine_srno,
        //     'asset_photos' => $rules->engine_srno,
        // ] );
        $detail = Generator::create([
            'engine_srno' => $request->engine_srno,
            'dg_range'=>$request->dg_range,
            'engine_make' => $request->engine_make,
            'alternator_srno' => $request->alternator_srno,
            'alternator_make' => $request->alternator_make,
            'battery_srno' => $request->battery_srno,
            'battery_make' => $request->battery_make,
            'oil_filter_part_code' => $request->oil_filter_part,
            'diesel_filter_part_code' => $request->diesel_filter_part,
            'air_filter_part_code' => $request->air_filter_part,
            'asset_photos' => $request->asset_photos,
        ]);

        return redirect()->route('assets.index')->with('success', 'Generator Details Inserted Successfully.');
    }


    public function generatorassign(Request $request)
    {
        $id = $request->id;

        $first_table = Generator::findOrFail($id);
        //    dd($first_table);

        $second_table = Generatorassign::create([
            'asset_number' => $first_table->asset_number,
            'dg_range'=>$first_table->dg_range,
            'engine_srno' => $first_table->engine_srno,
            'engine_make' => $first_table->engine_make,
            'alternator_srno' => $first_table->alternator_srno,
            'alternator_make' => $first_table->alternator_make,
            'battery_srno' => $first_table->battery_srno,
            'battery_make' => $first_table->battery_make,
            'oil_filter_part_code' => $first_table->oil_filter_part_code,
            'diesel_filter_part_code' => $first_table->diesel_filter_part_code,
            'air_filter_part_code' => $first_table->air_filter_part_code,
            'asset_photos' => $first_table->asset_photos,

        ]);
        return redirect()->back()->with('success', 'Geneator Assign to WaitingStock Successfully');
    }
}
