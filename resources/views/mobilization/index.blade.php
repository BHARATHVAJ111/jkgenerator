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
                        <a href="{{route('service.mobi')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'service.mobi' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Mobilization</i></span>
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
                    <th scope="col">Asset number</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Open Hour</th>
                    <th scope="col">Open Date</th>
                    <th scope="col">Last Oil Service</th>
                    <th scope="col">Movement Type</th>
                    <th scope="col">Closing Hour</th>
                    <th scope="col">Closing Date</th>
                    <th scope="col" >Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($mobilization as $values)
                <tr>
                    
                    <td>{{$values->asset_number}}</td>
                    <td>{{$values->client_name}}</td>
                    <td>{{$values->location}}</td>
                    <td>{{$values->open_hr}}</td>
                    <td>{{$values->open_date}}</td>
                    <td>{{$values->last_os_date}}</td>
                    <td>{{$values->movement}}</td>
                    <td>{{$values->closing_hr}}</td>
                    <td>{{$values->closing_date}}</td>
                    <td class="d-flex gap-2">
                        {{-- <a href="{{route('movement.mail',['id'=>$values->id])}}" class="btn btn-primary">Mail</a> --}}
                        {{-- <a href="{{route('delete',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" class="btn btn-danger">Close</a> --}}
                        {{-- <a href="{{route('status',['asset_number'=>$values->asset_number])}}" class="btn btn-primary">Submit</a> --}}
                        <a href="{{route('Mobilization.image',['asset_number'=>$values->asset_number])}}" class="btn btn-primary">Submit</a>
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

    
@endsection
       
