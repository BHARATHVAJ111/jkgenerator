@extends('layouts.sidebar')
@section('content')
    <div class="main">
        <div class="row align-items-center">
            {{-- <div><h2 class="btn btn-primary text-white fw-bolder float-end mt-1">User Type: {{ auth()->user()->name }}</h2></div> --}}
            @if ( auth()->user()->role_id == 7)
            <div class="col">
                <div class="welcome-back">Hai JKGPL Sales<span class="drop-truck"></span></div>
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
                                ADD LEAD
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
                <ul class="d-flex gap-5 bg-secondary rounded-pill pt-3">
                    <p class="nav-item">
                        <a href="{{route('sales.index')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'sales.index' ? 'active' : '' }} " data-bs-toggle="modal"
                            data-bs-target="#createIndentModal">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Add lead</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('sales.managelead')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'sales.managelead' ? 'active' : '' }}">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Manage lead</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('denied.show')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'denied.show' ? 'active' : '' }}">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Denied</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('follow.show')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'follow.show' ? 'active' : '' }}">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Follow Up</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('convert.show')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'store.index' ? 'active' : '' }}">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Converted</i></span>
                            </span>
                        </a>
                    </p>
                    
                </ul>
            </div>
        </div>
        @endsection

       
@section('managelead')
<table class="table text-center able-striped table-bordered table-hover table-esponsive">
    <thead class="">
      <tr>
        <th scope="col">Source</th>
        <th scope="col">Enquiry Date</th>
        <th scope="col">DG Range</th>
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
            <td class="d-flex justify-content-between gap-3">
                <a href="{{route('denied.store.delete',['id'=>$values->id])}}" class="btn btn-primary ">
                    Denied
                </a>
                <a href="{{route('followup.store.delete',['id'=>$values->id])}}" class="btn btn-success">
                    Follow
                </a>
                <a href="{{route('converted.store.delete',['id'=>$values->id])}}" class="btn btn-warning">
                    Converted
                </a>
                <a href="{{route('email.view.managelead',['id'=>$values->id])}}" class="btn btn-secondary">Email</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    
@endsection
       
