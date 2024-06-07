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
            <div class="d-flex justify-content-end">
                <label for="" class="fw-bold fs-5">Search : </label>
                <input class="w3-input w3-border w3-padding p-2" type="text" placeholder="Search for material name.." id="myInput" onkeyup="myFunction()">
             </div>
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
                <ul class="d-flex gap-5 bg-secondary shadow rounded-pill pt-3 mt-2">
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
                    <p class="nav-item">
                        <a href="{{route('vehicle.index')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'vehicle.index' ? 'active' : '' }} ">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Vehicle</i></span>
                            </span>
                        </a>
                    </p>
                </ul>
            </div>
        </div>
        <table class="table text-center table-bordered table-hover table-responsive table-striped" id="myTable">
            <thead class="">
                <tr class="">
                    <th>Sr.No</th>
                    <th scope="col">Asset number</th>
                    <th scope="col">DG Range</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Open Hour</th>
                    <th scope="col">Open Date</th>
                    <th scope="col">Last Oil Service</th>
                    <th scope="col">Movement Type</th>
                    {{-- <th scope="col">Closing Hour</th>
                    <th scope="col">Closing Date</th>
                    <th scope="col">Open Date</th> --}}
                    <th scope="col" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $values)
                    <tr class="">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $values->asset_number }}</td>
                        <td>{{$values->dg_range}}</td>
                        
                       
                        @if (isset($detailhistory[$values->asset_number]))
                            @php $detail = $detailhistory[$values->asset_number]; @endphp
                            <td>{{ $detail->client_name }}</td>
                            <td>{{ $detail->location }}</td>
                            <td>{{ $detail->open_hr }}</td>
                            <td>{{ $detail->open_date }}</td>
                            <td>{{ $detail->last_os_hr }}</td>
                            <td>{{ $detail->movement }}</td>
                            {{-- <td>{{ $detail->closing_hr }}</td>
                            <td>{{ $detail->closing_date }}</td>
                            <td>{{ $detail->open_date }}</td> --}}
                        @else
                         {{-- If no detail history found, set default values or leave empty --}}
            @php
            $detail = (object) [
                'client_name' => '',
                'location' => '',
                'open_hr' => '',
                'open_date' => '',
                'last_os_service' => '',
                'movement' => '',
                // Add more properties if needed
            ];
        @endphp
        <td colspan="6">No detail history found</td>
                        @endif
                        <td class="d-flex justify-content-center gap-2 ">
                                
        
                                <a href="{{route('service.show',['id'=>$values->id])}}" class="pt-2">
                                    <i class="fa-sharp fa-solid fa-eye" style="color:black;"></i>
                                </a>
                                <a href="{{route('service.details',['id'=>$values->id,'asset_number'=>$values->asset_number])}}" >
                                    <button class="btn btn-success">Details</button>
                                </a>
                                @if (isset($detail) && isset($detail->buttons))
                                @if ($detail->buttons == '1')
                                    <a href="{{route('service.clear',['asset_number'=>$values->asset_number,'id'=>$detail->id])}}">
                                        <button class="btn btn-danger">Off</button>
                                    </a>
                                @elseif ($detail->buttons == '0')
                                    <a href="{{route('service.toggle',['id'=>$detail->id])}}">
                                        <button class="btn btn-success">On</button>
                                    </a>
                                @endif
                            @endif
                             <!-- Toggle button with initial state "Off" -->
                             @if (isset($detail) && isset($detail->status))
                             @if ($detail->status == '0')
                                 <a href="#">
                                     <button class="btn btn-secondary">Mov Disable</button>
                                 </a>
                             @elseif ($detail->status == '1')
                                 <a href="#">
                                     <button class="btn btn-success">Mov Verified</button>
                                 </a>
                             @endif
                         @endif
                                <span>
                                    @if (isset($detail) && isset($detail->id))
                                    <a href="{{route('service.mail',['id'=>$detail->id,'asset_number'=>$values->asset_number])}}" class="btn btn-warning">
                                        Mail
                                    </a>
                                    @endif
                                </span>
                               
                               
                              
                               
                               
                            
                                <a href="{{route('service.assign',['id'=>$values->id,'asset_code'=>$values->asset_number])}}" class="">
                                    <button class="btn btn-primary">Accept</button>
                                </a>
                                {{-- <form action="{{route('waitingstock.delete',['id'=>$values->id,'asset_code'=>$values->asset_number])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Reject</button>
                                </form> --}}
                                {{-- <a href="{{route('waitingstock.delete',['id'=>$values->id,'asset_code'=>$values->asset_number])}}" class="btn btn-danger">
                                    Reject
                                </a> --}}
                                {{-- <a href="">
                                    <i class="fa-solid fa-trash-can" style="color: #f50025;"></i>
                                </a> --}}
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
                           
                          
        @endsection
        <script>
            function myFunction() {
                var input, filter, table, tr, td1, td2, i, txtValue1, txtValue2;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
        
                for (i = 0; i < tr.length; i++) {
                    td1 = tr[i].getElementsByTagName("td")[1];
                    td2 = tr[i].getElementsByTagName("td")[3];
                    if (td1 || td2) {
                        txtValue1 = td1 ? td1.textContent || td1.innerText : "";
                        txtValue2 = td2 ? td2.textContent || td2.innerText : "";
                        if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }       
                }
            }
        </script>
        
        
@section('managelead')

@endsection


