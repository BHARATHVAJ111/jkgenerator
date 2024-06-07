@extends('layouts.layouts')
{{-- @section('content') --}}
    <div class="main">
       

        @extends('layouts.layouts')

        @section('content')
        <div class="main">
            <div class="row align-items-center">
                <div class="col-auto">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        <div class="container-fluid">
            <div class="">
                <ul class="d-flex gap-5 bg-secondary rounded-pill shadow pt-3 ">
                    <p class="nav-item">
                        <a href="{{route('master.show',['id'=>$master->id,'asset_number'=>$master->asset_number])}}"
                            class="nav-link align-middle px-0
                             {{ request()->route()->getName() === 'master.show' ? 'active' : '' }} "  >
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Asset Details</i></span>
                            </span>
                        </a>
                    </p>
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
        <table class="table table-hover table-bordered table-responsive table-striped">
            <thead>
              <tr>
                <th>Asset_Number</th>
                <th scope="col">General Check Up</th>
                <th scope="col">Repair Work</th>
                <th scope="col">Oil Service</th>
                <th scope="col">Oil Service date</th>
                <th scope="col">Mobilization</th>
                <th scope="col">De Mobilization</th>
              </tr>
            </thead>
            <tbody>
                
                @foreach ($groupedServiceHistories as $values)
                @foreach ($values as $serviceHistory)
                <tr>
                    <td>{{ $serviceHistory->asset_number }}</td>
                    <td>{{ $serviceHistory->general }}</td>
                    <td>{{ $serviceHistory->repair_work }}</td>
                    <td>{{ $serviceHistory->last_os_service }}</td>
                    <td>{{ $serviceHistory->oil_service_date }}</td>
                    <td>{{ $serviceHistory->mobilization }}</td>
                    <td>{{ $serviceHistory->demobilization }}</td>
                </tr>
            @endforeach
                @endforeach
            </tbody>
          </table>
        <div class="container-fluid">
            <div class="">
                <ul class="d-flex gap-5 bg-secondary rounded-pill shadow pt-3 ">
                    <p class="nav-item">
                        <a href=""
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === '' ? 'active' : '' }} toggle-inputs" data-target="general-checkup">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">General Check Up</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href=""
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === '' ? 'active' : '' }} toggle-inputs " data-target="repair-work">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Repair Work</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href=""
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === '' ? 'active' : '' }} toggle-inputs" data-target="oil-service">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Oil Service</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href=""
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === '' ? 'active' : '' }} toggle-inputs" data-target="oil-service-date">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Oil Service date</i></span>
                            </span>
                        </a>
                    </p>
               
                <p class="nav-item">
                    <a href=""
                        class="nav-link align-middle px-0 {{ request()->route()->getName() === '' ? 'active' : '' }} toggle-inputs " data-target="mobilization">
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">Mobilization</i></span>
                        </span>
                    </a>
                </p>
                <p class="nav-item">
                    <a href=""
                        class="nav-link align-middle px-0 {{ request()->route()->getName() === '' ? 'active' : '' }} toggle-inputs" data-target="de-mobilization">
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">De Mobilization</i></span>
                        </span>
                    </a>
                </p>
                
                 </ul>
            </div>
        </div>
         <div class="container-fluid">
        <div id="general-checkup-inputs" class="inputs-container" style="display: none;">
            <form action="{{route('visittwo.general')}}" method="post">
                @csrf
            <!-- Input boxes for General Check Up -->
            <input type="hidden" name="engineer_id" value="{{$master->engineer_id}}">
            <label for="" class="">Asset Number</label><br>
            <input type="text" name="asset_number" placeholder="Input 1 for General Check Up" value="{{$master->asset_number}}"><br>
            <label for="" class="">General</label><br>
            <input type="text" name="general" placeholder="Input 2 for General Check Up"><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            <!-- Add more input boxes as needed -->
        </div>
        <div id="repair-work-inputs" class="inputs-container" style="display: none;">
            <form action="{{route('visittwo.repair')}}" method="post">
                @csrf
            <!-- Input boxes for Repair Work -->
            <input type="hidden" name="engineer_id" value="{{$master->engineer_id}}">
            <label for="">Asset Number</label><br>
            <input type="text" placeholder="Input 1 for Repair Work" value="{{$master->asset_number}}" name="asset_number"><br>
            <label for="">Repair Work</label><br>
            <input type="text" placeholder="Input 2 for Repair Work" name="repair"><br>
            <button type="submit" class="btn btn-secondary">Submit</button>
            <!-- Add more input boxes as needed -->
            </form>
        </div>
        <div id="oil-service-inputs" class="inputs-container" style="display: none;">
            <form action="{{route('visittwo.oil')}}" method="POST">
            @csrf
            <!-- Input boxes for Repair Work -->
            <input type="hidden" name="engineer_id" value="{{$master->engineer_id}}">
            <label for="">Asset Number</label><br>
            <input type="text" placeholder="Input 1 for oil-service" value="{{$master->asset_number}}" name="asset_number"><br>
            <label for="">Last Oil Service</label><br>
            <input type="text" placeholder="Input 2 for oil-service" name="oil_service"><br>
            <button type="submit" class="btn btn-success">Submit</button>
            <!-- Add more input boxes as needed -->
        </form>
        </div>
        <div id="oil-service-date-inputs" class="inputs-container" style="display: none;">
            <form action="{{route('visittwo.date')}}" method="POST">
            @csrf
            <!-- Input boxes for Repair Work -->
            <input type="hidden" name="engineer_id" value="{{$master->engineer_id}}">
            <label for="">Asset Number</label><br>
            <input type="text" placeholder="Input 1 for oil-service_date" value="{{$master->asset_number}}" name="asset_number"><br>
            <label for="">Last Oil Service Date</label><br>
            <input type="date" placeholder="Input 2 for oil-service_date" name="oil_service_date"><br>
            <button type="submit" class="btn btn-success">Submit</button>
            <!-- Add more input boxes as needed -->
        </form>
        </div>
        <div id="mobilization-inputs" class="inputs-container" style="display: none;">
            <form action="{{route('visittwo.mobilization')}}" method="POST">
                @csrf
            <!-- Input boxes for Repair Work -->
            <input type="hidden" name="engineer_id" value="{{$master->engineer_id}}">
            <label for="">Asset Number</label><br>
            <input type="text" placeholder="Input 1 for  mobilization" value="{{$master->asset_number}}" name="asset_number"><br>
            <label for="">Mobilization</label><br>
            <input type="text" placeholder="Input 2 for  mobilization" name="mobilization"><br>
            <button type="submit" class="btn btn-dark">Submit</button>
            <!-- Add more input boxes as needed -->
        </form>
        </div>
        <div id="de-mobilization-inputs" class="inputs-container" style="display: none;">
            <form action="{{route('visittwo.demobilization')}}" method="POST">
                @csrf
            <!-- Input boxes for Repair Work -->
            <input type="hidden" name="engineer_id" value="{{$master->engineer_id}}">
            <label for="">Asset Number</label><br>
            <input type="text" placeholder="Input 1 for  demobilization" value="{{$master->asset_number}}" name="asset_number"><br>
            <label for="">De Mobilization</label><br>
            <input type="text" placeholder="Input 2 for  demobilization" name="demobilization"><br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- Add more input boxes as needed -->
        </form>
        </div>
        <!-- Add more divs for other sections with input boxes -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleInputs = document.querySelectorAll('.toggle-inputs');
        toggleInputs.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-target');
                const targetInputs = document.getElementById(target + '-inputs');
                if (targetInputs) {
                    // Hide all input containers
                    const inputContainers = document.querySelectorAll('.inputs-container');
                    inputContainers.forEach(function(container) {
                        container.style.display = 'none';
                    });
                    // Show the input container corresponding to the clicked button
                    targetInputs.style.display = 'block';
                }
            });
        });
    });
</script>

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
       

{{-- <a href="{{route('master.form')}}">
    <button type="button" class="btn btn-success dash1 mt-3">Service</button>
<div class="container mt-5 bg-light shadow align-items-center p-5">
</a> --}}
    {{-- @if (isset($contact_data['file']))
    <p>Attached File: <a href="{{ $contact_data['file']->getPathname() }}">{{ $contact_data['file']->getClientOriginalName() }}</a></p>
    @endif --}}
   