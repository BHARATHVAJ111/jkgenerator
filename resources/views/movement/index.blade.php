@extends('layouts.sidebar')
@section('content')
    <div class="main">
        <div class="row align-items-center">
            {{-- <div><h2 class="btn btn-primary text-white fw-bolder float-end mt-1">User Type: {{ auth()->user()->name }}</h2></div> --}}
            @if ( auth()->user()->role_id == 8)
            <div class="col">
                <div class="welcome-back">Hai JKGPL Service<span class="drop-truck"></span></div>
            </div>
            @endif
            @if ( auth()->user()->role_id == 5)
            <div class="welcome-back">Hai JKGPL Admin<span class="drop-truck"></span></div>
            @endif

            <div class="col-auto">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- <a href="#."><img src="images/dashboard/search.png" height="25" width="25"></a> -->
                <!-- Inside the 'content-wrapper' div -->
                {{-- @if (auth()->user()->role_id == 5 || auth()->user()->role_id == 6)
                    <button type="button" class="btn btn-success dash1 mt-3" data-bs-toggle="modal"
                        data-bs-target="#createIndentModal">Add</button>
                @endif --}}


                <!-- Modal -->
                <div class="modal fade container-fluid" id="createIndentModal" tabindex="-1"
                    aria-labelledby="createIndentModalLabel" aria-hidden="true">
                    <div class="modal-dialog rounded" role="document">
                        <div class="modal-content">
                            <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                                ADD ASSERTS
                            </div>
                            <div class="modal-body">
                                @include('sales.lead')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="">
                <ul class="d-flex gap-5 bg-secondary rounded-pill mt-2 pt-3 shadowz">
                    <p class="nav-item">
                        <a href="{{route('service.index')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'service.index' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Movement</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.master')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.master' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Master</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('service.mobilization')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'service.mobilization' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Mobiliation</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('master.movementshow')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'master.movementshow' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Closure</i></span>
                            </span>
                        </a>
                    </p>
                </ul>
            </div>
        </div>
        </div>
        <table class="table table-hover table-striped table-responsive table-bordered">
            <thead>
              <tr>
                <th>Asset_Number</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Location</th>
                <th scope="col">Open Hour</th>
                <th scope="col">Open Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movement as $values)
                <tr>
                    
                    <td>{{$values->asset_number}}</td>
                    {{-- <td>{{$values->service_engineer}}</td> --}}
                    <td>{{$values->customer_name}}</td>
                    <td>{{$values->location}}</td>
                    <td>{{$values->open_hr}}</td>
                    <td>{{$values->open_date}}</td>
                    <td class="d-flex gap-2">
                        <a href="{{route('closure.show',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" class="btn btn-secondary">Show</a>
                        <a href="{{route('service.mail',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" class="btn btn-warning">Int Mail</a>
                        <a href="{{route('service.mail',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" class="btn btn-success">Ext Mail</a>
                        <a href="{{route('delete',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" class="btn btn-danger">Close</a>
                        <a href="{{route('submit',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" class="btn btn-success">Submit</a>
                    </td>
                    {{-- <td class="d-flex justify-content-between">
                        <a href="{{route('master.movement',['id'=>$values->id])}}" class="btn btn-primary ">
                           Submit
                        </a>
                        <a href="{{route('followup.store.delete',['id'=>$values->id])}}" class="btn btn-success">
                         Follow up
                        </a>
                        <a href="{{route('converted.store.delete',['id'=>$values->id])}}" class="btn btn-warning">
                            Converted
                        </a> 
                       
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
          </table>
        @endsection
       
        
@section('managelead')
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
    
@endsection
       
