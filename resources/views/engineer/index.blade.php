@extends('layouts.sidebar')
@section('content')
    <div class="main">
        <div class="row align-items-center">
            {{-- <div><h2 class="btn btn-primary text-white fw-bolder float-end mt-1">User Type: {{ auth()->user()->name }}</h2></div> --}}
            <div class="col">
                <div class="welcome-back">Hi JKGPL Admin<span class="drop-truck"></span></div>
            </div>

            <div class="col-auto">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- <a href="#."><img src="images/dashboard/search.png" height="25" width="25"></a> -->
                <!-- Inside the 'content-wrapper' div -->
                    <button type="button" class="btn btn-success dash1 mt-3" data-bs-toggle="modal"
                        data-bs-target="#createIndentModal">Add Engineer</button>


                <!-- Modal -->
                <div class="modal fade container-fluid" id="createIndentModal" tabindex="-1"
                    aria-labelledby="createIndentModalLabel" aria-hidden="true">
                    <div class="modal-dialog rounded" role="document">
                        <div class="modal-content">
                            <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                                ADD ENGINEER
                            </div>
                            <div class="modal-body">
                                @include('engineer.engineerform')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
         <table class="text-center table table-hover table-bordered table-responsive table-striped">
                    <thead class="">
                        <tr class="">
                            <th scope="col">Name</th>
                            <th scope="col">Email id</th>
                            <th scope="col">Mobile Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $values)
                            <tr class="bg-light shadow rounded-circle pb-5">
                                <td>{{ $values->name }}</td>
                                <td>{{ $values->email }}</td>
                                <td>{{ $values->phone }}</td>
                                {{-- <td>
                                    @if($values->status == 1)
                                        <form action="{{route('generator.assign',['id'=>$values->id])}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Assign</button>
                                        </form>
                                    @elseif($values->status == 0)
                                        <form action="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Out</button>
                                        </form>
                                    @endif
                                </td> --}}
                                <td class="d-flex justify-content-around">
        
                                    <a href="{{route('engineer.show',['id'=>$values->id])}}">
                                        <i class="fa-sharp fa-solid fa-eye" style="color:black;"></i>
                                    </a>
                                    <a href="{{route('engineer.edit',['id'=>$values->id])}}" class="btn btn-warning">
                                        update
                                    </a>
                                    <form action="{{route('engineer.delete',['id'=>$values->id])}}" method="POST" id="delete-form-{{ $values->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $values->id }})" class="btn"> <i class="fa-solid fa-trash-can" style="color: #f50025;"></i></button>
                                    </form>
                                    
                                    <script>
                                        function confirmDelete(assetId) {
                                            if (confirm('Are you sure you want to delete this data?')) {
                                                document.getElementById('delete-form-' + assetId).submit();
                                            }
                                        }
                                    </script>
{{--                                     
                                   
                                    <a href="{{route('service.mail')}}" class="btn btn-primary">
                                        Assign Engineer
                                    </a> --}}
                                </td>
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
       
