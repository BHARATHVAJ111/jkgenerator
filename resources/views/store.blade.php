@extends('layouts.sidebar')
@section('content')
    <div class="main">
        <div class="row align-items-center">
            {{-- <div><h2 class="btn btn-primary text-white fw-bolder float-end mt-1">User Type: {{ auth()->user()->name }}</h2></div> --}}
           
            @if ( auth()->user()->role_id == 6)
            <div class="col">
                <div class="welcome-back">Hai JKGPL Store<span class="drop-truck"></span></div>
            </div>
            @endif
            @if ( auth()->user()->role_id == 5)
            <div class="col">
                <div class="welcome-back">Hai JKGPL Admin<span class="drop-truck"></span></div>
            </div>
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
                @if (auth()->user()->role_id == 5 || auth()->user()->role_id == 6)
                    <button type="button" class="btn btn-success dash1 mt-3" data-bs-toggle="modal"
                        data-bs-target="#createIndentModal">Add</button>
                @endif


                <!-- Modal -->
                <div class="modal fade container-fluid" id="createIndentModal" tabindex="-1"
                    aria-labelledby="createIndentModalLabel" aria-hidden="true">
                    <div class="modal-dialog rounded" role="document">
                        <div class="modal-content">
                            <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                                ADD PARTS
                            </div>
                            <div class="modal-body">
                                @include('indent.create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="">
                <ul class="d-flex gap-5 bg-secondary shadow rounded-pill mt-2 pt-3">
                    <p class="nav-item">
                        <a href="{{ route('store.index') }}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'store.index' ? 'active' : '' }}">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Parts</i></span>
                            </span>
                        </a>
                    </p>
                    <p class="nav-item">
                        <a href="{{route('assets.index')}}"
                            class="nav-link align-middle px-0 {{ request()->route()->getName() === 'indents.indent' ? 'active' : '' }}">
                            <span class="ms-1 d-none d-sm-inline">
                                <span class="ms-1">Assets</i></span>
                            </span>
                        </a>
                    </p>
                   
                </ul>
            </div>
        </div>

        <table class="table text-center able-striped table-bordered table-hover table-esponsive" id="myTable">
            <thead class="pb-2">
                <tr class="pb-2">
                    <th>Sr.No</th>
                    <th scope="col">Part code</th>
                    <th scope="col">Material_name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Quantity_Type</th>
                    <th scope="col">Location</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach ($assets as $key => $values)
                    <tr class="bg-light shadow rounded-circle pb-5">
                        <td>{{$key + 1}}</td>
                        <td>{{ $values->jrnum }}</td>
                        <td>{{ $values->material_name }}</td>
                        <td>{{ $values->number_of_quantity }}</td>
                        <td>{{ $values->quantity }}</td>
                        <td>{{$values->location}}</td>
                        <td class="d-flex justify-content-around">

                            <a href="{{route('parts.show',['id'=>$values->id])}}" class="pt-2">
                                <i class="fa-sharp fa-solid fa-eye" style="color:black;"></i>
                            </a>

                            <a href="{{route('parts.edit',['id'=>$values->id])}}" class="pt-2">
                                <i class="fa-regular fa-pencil"></i>
                            </a>
                            
                            <form action="{{route('parts.delete',['id'=>$values->id])}}" method="POST" id="delete-form-{{ $values->id }}">
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
                            
                           <a href="{{ route('assets.edit', ['id' => $values->id]) }}">
                            <button type="button" class="btn btn-success" >Inward</button>
                           </a>
                           <a href="{{route('parts.asign',['id' => $values->id])}}">
                               <button type="button" class="btn btn-primary" id="">Outward</button>
                           </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            function myFunction() {
              var input, filter, table, tr, td, i;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
              }
            }
            </script>
            
       
        
    @endsection
