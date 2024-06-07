<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assign;
use App\Models\EngineerStore;
use App\Models\Generator;
use App\Models\MasterHistory;
use App\Models\Mobilization;
use App\Models\Movement;
use App\Models\OilService;
use App\Models\ServiceEngineerAssign;

use App\Models\Servicehistory;
use App\Models\VisitFour;
use App\Models\VisitOne;
use App\Models\VisitThree;
use App\Models\VisitTwo;
use Illuminate\Http\Request;

class MasterController extends Controller
{

   public function view()
   {
      $engineer_id = '1';
      $serviceengineer = ServiceEngineerAssign::where('engineer_id', $engineer_id)->get();
      
      $visitone = VisitOne::where('engineer_id', 1)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visittwo = VisitTwo::where('engineer_id', 1)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visitthree = VisitThree::where('engineer_id', 1)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visitfour = VisitFour::where('engineer_id', 1)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $status = OilService::where('engineer_id', 1)
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
       // Check if both $value1 and $value2 are not null
//   if ($visitone === null || $status === null) {
//    // Handle the case where one or both values are not found
//    return redirect()->back()->withErrors(['error' => 'Service history or oil service not found for the provided asset number.']);
// }
// $totalLastOsServiceValue1 = $visitone->sum('last_os_service');
// $totalLastOsServiceValue2 = $status->sum('last_os_service');
// $value3 = $totalLastOsServiceValue1 - $totalLastOsServiceValue2;

// dd($value3);

      return view('master.mastertab', compact('serviceengineer','visitone','visittwo','visitthree','visitfour','status'));
   }
   public function engineerone()
   {
      $engineer_id = '1';
      $serviceengineer = ServiceEngineerAssign::where('engineer_id', $engineer_id)->get();

      $visitone = VisitOne::where('engineer_id', 1)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visittwo = VisitTwo::where('engineer_id', 1)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visitthree = VisitThree::where('engineer_id', 1)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visitfour = VisitFour::where('engineer_id', 1)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $status = OilService::where('engineer_id', 1)
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      return view('master.engineerone', compact('serviceengineer','visitone','visittwo','visitthree','visitfour','status'));
   }
   public function engineertwo()
   {
      $engineer_id = '2';
      $serviceengineer = ServiceEngineerAssign::where('engineer_id', $engineer_id)->get();
      
      $visitone = VisitOne::where('engineer_id', 2)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visittwo = VisitTwo::where('engineer_id', 2)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visitthree = VisitThree::where('engineer_id', 2)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visitfour = VisitFour::where('engineer_id', 2)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $status = OilService::where('engineer_id', 2)
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      return view('master.engineertwo', compact('serviceengineer','visitone','visittwo','visitthree','visitfour','status'));
   }
   public function engineerthree()
   {
      $engineer_id = '3';
      $serviceengineer = ServiceEngineerAssign::where('engineer_id', $engineer_id)->get();
      
      $visitone = VisitOne::where('engineer_id', 3)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visittwo = VisitTwo::where('engineer_id', 3)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visitthree = VisitThree::where('engineer_id', 3)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $visitfour = VisitFour::where('engineer_id', 3)
      ->whereNotNull('last_os_service')
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      $status = OilService::where('engineer_id', 3)
      ->whereIn('asset_number', ServiceEngineerAssign::pluck('asset_number'))
      ->get();
      return view('master.engineerthree', compact('serviceengineer','visitone','visittwo','visitthree','visitfour','status'));
   }
   public function engineerfour(Request $request)
   {
      // $engineer=EngineerStore::all();
      $serviceengineer = ServiceEngineerAssign::all();

      return view('master.engineerfour', compact('serviceengineer'));
   }


   public function dgstatus(Request $request)
   {
      // dd($request->all());
      $value1 = VisitOne::where('asset_number', $request->asset_number)
      ->where('engineer_id',$request->engineer_id)
      ->whereNotNull('last_os_service')
      ->first();
      $value2 = OilService::where('asset_number', $request->asset_number)
      ->where('engineer_id',$request->engineer_id)
      ->first();
      // dd($value1,$value2);
  // Check if both $value1 and $value2 are not null
  if ($value1 === null || $value2 === null) {
   // Handle the case where one or both values are not found
   return redirect()->back()->withErrors(['error' => 'Service history or oil service not found for the provided asset number.']);
}
$totalLastOsServiceValue1 = $value2->sum('last_os_service');
$totalLastOsServiceValue2 = $value1->sum('last_os_service');
$value3 = $totalLastOsServiceValue1 - $totalLastOsServiceValue2;


      $visitone = VisitOne::where('asset_number', $request->asset_number)
         ->where('engineer_id',$request->engineer_id)
         ->get();
      $visittwo = VisitTwo::where('asset_number', $request->asset_number)
         ->where('engineer_id',$request->engineer_id)
         ->get();
      $visitthree = VisitThree::where('asset_number', $request->asset_number)
         ->where('engineer_id',$request->engineer_id)
         ->get();
      $visitfour = VisitFour::where('asset_number', $request->asset_number)
         ->where('engineer_id',$request->engineer_id)
         ->get();
      // Check if any assets were found
   //    if ($assets->isEmpty()) {
   //       return redirect()->back()->withErrors(['error' => 'No assets found for the provided criteria.']);
   //   }

     return view('service.servicehistory',compact('value3','visitone','visittwo','visitthree','visitfour'));
     
   }

   public function movement(Request $request)
   {
      $id = $request->id;
      $value = ServiceEngineerAssign::findOrFail($id);

      // Convert the ServiceEngineerAssign instance to an array of attributes
      $attributes = $value->toArray();

      // Remove unnecessary attributes
      unset($attributes['id']);
      // Find the Movement record by asset number
      $movement = Movement::where('asset_number', $attributes['asset_number'])->first();

      if ($movement) {
         // Update the existing Movement record with the new attributes
         $movement->update($attributes);
      } else {
         // Create a new Movement record with the attributes
         Movement::create($attributes);
      }

      return redirect()->back()->withSuccess('Generator submitted to Closure successfully.');
   }

   public function movementshow()
   {
      $movement = Movement::all();
      return view('movement.index', compact('movement'));
   }
   public function mastershow(Request $request)
   {
      $master = ServiceEngineerAssign::findOrFail($request->id);

      return view('master.show', compact('master'));
   }

   public function form(Request $request)
   {
      $activeTab = $request->input('tab', 'tab1');
      // return view('tabs', compact('activeTab'));
      return view('service.serviceform', compact('activeTab'));
   }
   public function servicehistory(Request $request)
   {
      // dd($request->all());
      $master = ServiceEngineerAssign::findOrFail($request->id);
      $servicehistory = Servicehistory::all();
      // $asset_number=$request->asset_number;
      $groupedServiceHistories = $servicehistory->groupBy($request->asset_number);
      return view('service.servicehistory', compact('master', 'groupedServiceHistories'));
   }
   public function visitone(Request $request)
   {
      // dd($request->all());
      $master = ServiceEngineerAssign::findOrFail($request->id);
      // $visitone=VisitOne::all();
      $servicehistory = VisitOne::all();
      // $asset_number=$request->asset_number;
      $groupedServiceHistories = $servicehistory->groupBy($request->asset_number);
      return view('servicehistory.visitone', compact('master', 'groupedServiceHistories'));
   }
   public function visittwo(Request $request)
   {
      // dd($request->all());
      $master = ServiceEngineerAssign::findOrFail($request->id);
      $servicehistory = VisitTwo::all();
      // $asset_number=$request->asset_number;
      $groupedServiceHistories = $servicehistory->groupBy($request->asset_number);
      return view('servicehistory.visittwo', compact('master', 'groupedServiceHistories'));
   }
   public function visitthree(Request $request)
   {
      // dd($request->all());
      $master = ServiceEngineerAssign::findOrFail($request->id);
      $servicehistory = VisitThree::all();
      // $asset_number=$request->asset_number;
      $groupedServiceHistories = $servicehistory->groupBy($request->asset_number);
      return view('servicehistory.visitthree', compact('master', 'groupedServiceHistories'));
   }
   public function visitfour(Request $request)
   {
      // dd($request->all());
      $master = ServiceEngineerAssign::findOrFail($request->id);
      $servicehistory = VisitFour::all();
      // $asset_number=$request->asset_number;
      $groupedServiceHistories = $servicehistory->groupBy($request->asset_number);
      return view('servicehistory.visitfour', compact('master', 'groupedServiceHistories'));
   }


   public function reassignengineer(Request $request)
   {

      $engineer = EngineerStore::all();
      $engineer_assign = ServiceEngineerAssign::findOrFail($request->id);
      return view('master.reassign', compact('engineer', 'engineer_assign'));
   }

   public function reassign(Request $request)
   {
      // dd($request->all());
      $serviceEngineerAssign = ServiceEngineerAssign::findOrFail($request->id);
      $engineer = EngineerStore::where('engineer_id', $request->engineer_id)->get();
      $name = $engineer[0]->name;
      // dd($name);
      $serviceEngineerAssign->update([
         'service_engineer' => $name,
         'engineer_id' => $request->engineer_id,
      ]);

      return redirect()->route('master.engineerfour')->withSuccess('Generator Reassign to given engineer name Successfully');
   }
}
