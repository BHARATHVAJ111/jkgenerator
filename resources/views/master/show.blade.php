@extends('layouts.layouts')
{{-- @section('content') --}}
    <div class="main">
        <div class="row align-items-center">
            {{-- <div><h2 class="btn btn-primary text-white fw-bolder float-end mt-1">User Type: {{ auth()->user()->name }}</h2></div> --}}
            <div class="col-auto">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- <a href="#."><img src="images/dashboard/search.png" height="25" width="25"></a> -->
                <!-- Inside the 'content-wrapper' div -->
                <!-- Modal -->
            </div>
        </div>

        
        <div class="container-fluid">
            <div class="">
                <ul class="d-flex gap-5 bg-secondary rounded-pill shadow pt-3 ">
                    <p class="nav-item">
                        <a href="{{route('master.show',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0
                             {{ request()->route()->getName() === 'master.show' ? 'active' : '' }} " >
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Asset Details</i></span>
                            </span>
                        </a>
                    </p>
                    {{-- <p class="nav-item">
                        <a href="{{route('master.servicehistory',['id'=>$master->id,'asset_number'=>$master->asset_number,'engineer_id'=>$master->engineer_id])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.servicehistory' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Sevice History</i></span>
                            </span>
                        </a>
                    </p> --}}
                    <p class="nav-item">
                        <a href="{{route('master.visitone',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.visitone' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Visit-1</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.visittwo',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.visittwo' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Visit-2</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.visitthree',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.visitthree' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Visit-3</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.visitfour',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.visitfour' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Visit-4</i></span>
                            </span>
                        </a>
                    </p>
                </ul>
            </div>
        </div>
        {{-- <table class="table">
    <thead>
      <tr>
        <th>Asset_Number</th> --}}
        {{-- <th scope="col">Service Engineer Name</th> --}}
        {{-- <th scope="col">Engine Sr.No</th>
        <th scope="col">Engine Make</th>
        <th scope="col">Alternator Sr.No</th>
        <th scope="col">Alternator Make</th>
        <th scope="col">Battery Sr.No</th>
        <th scope="col">Battery Make</th>
        <th scope="col">Oil Filter </th>
        <th scope="col">Air Filter </th>
        <th scope="col">Diesel Filter </th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody> --}}
        {{-- @foreach ($serviceengineer as $values)
        <tr>
            
            <td>{{$values->asset_number}}</td> --}}
            {{-- <td>{{$values->service_engineer}}</td> --}}
            {{-- <td>{{$values->engine_srno}}</td>
            <td>{{$values->engine_make}}</td>
            <td>{{$values->alternator_srno}}</td>
            <td>{{$values->alternator_make}}</td>
            <td>{{$values->battery_srno}}</td>
            <td>{{$values->battery_make}}</td>
            <td>{{$values->oil_filter_part}}</td>
            <td>{{$values->air_filter_part}}</td>
            <td>{{$values->diesel_filter_part}}</td>
            <td>
                <a href="{{route('master.show',['id'=>$values->id])}}" class="pt-2">
                    <i class="fa-sharp fa-solid fa-eye" style="color:black;"></i>
                </a>
                <a href="{{route('master.movement',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" class="btn btn-primary ">
                    Submit
                 </a>
            </td> --}}
            
            {{-- <td class="d-flex justify-content-between"> --}}
                {{-- <a href="{{route('denied.store.delete',['id'=>$values->id])}}" class="btn btn-primary ">
                    Denied
                </a>
                <a href="{{route('followup.store.delete',['id'=>$values->id])}}" class="btn btn-success">
                    Follow up
                </a>
                <a href="{{route('converted.store.delete',['id'=>$values->id])}}" class="btn btn-warning">
                    Converted
                </a> --}}
               
            {{-- </td> --}}
        </tr>
        {{-- @endforeach --}}
    </tbody>
  </table>
        {{-- @endsection --}}
       
        
{{-- @section('managelead') --}}
{{-- <table class="table">
    <thead>
      <tr>
        <th scope="col">Source</th>
        <th scope="col">Enquiry Date</th>
        <th scope="col">DG Capacity</th>
        <th scope="col">Duration</th>
        <th scope="col">Cost/Rent</th>
        <th scope="col">Company Name</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($managelead as $values)
        <tr>
            <td>{{$values->source}}</td>
            <td>{{$values->enquiry_date}}</td>
            <td>{{$values->capacity}}</td>
            <td>{{$values->duration}}</td>
            <td>{{$values->cost}}</td>
            <td>{{$values->company_name}}</td>
            <td>{{$values->contact_number}}</td>
            <td class="d-flex justify-content-between">
                <a href="{{route('denied.store.delete',['id'=>$values->id])}}" class="btn btn-primary ">
                    Denied
                </a>
                <a href="{{route('followup.store.delete',['id'=>$values->id])}}" class="btn btn-success">
                    Follow up
                </a>
                <a href="{{route('converted.store.delete',['id'=>$values->id])}}" class="btn btn-warning">
                    Converted
                </a>
               
            </td>
        </tr>
        @endforeach
    </tbody>
  </table> --}}
    
{{-- @endsection --}}
       

<div class="container">
    <p>Engineer Name: {{ $master['service_engineer'] }}</p>
    <p>Asset Number: {{ $master['asset_number'] }}</p>
    <p>Engine Sr.No: {{ $master['engine_srno'] }}</p>
    <p>Engine Make: {{ $master['engine_make'] }}</p>
    <p>Alternator Sr.No: {{ $master['alternator_srno'] }}</p>
    <p>Alternator Make: {{ $master['alternator_make'] }}</p>
    <p>Battery Sr.No: {{ $master['battery_srno'] }}</p>
    <p>Battery Make: {{ $master['battery_make'] }}</p>
    <p>Oil Filter Part Code: {{ $master['oil_filter_part'] }}</p>
    <p>Diesel Filter Part Code: {{ $master['diesel_filter_part'] }}</p>
    <p>Air Filter Part Code: {{ $master['air_filter_part'] }}</p>
</div>
{{-- <a href="{{route('master.form')}}">
    <button type="button" class="btn btn-success dash1 mt-3">Service</button>
<div class="container mt-5 bg-light shadow align-items-center p-5">
</a> --}}
    {{-- @if (isset($contact_data['file']))
    <p>Attached File: <a href="{{ $contact_data['file']->getPathname() }}">{{ $contact_data['file']->getClientOriginalName() }}</a></p>
    @endif --}}
   