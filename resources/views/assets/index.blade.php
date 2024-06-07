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

            <div class="col-auto">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- <a href="#."><img src="images/dashboard/search.png" height="25" width="25"></a> -->
                <!-- Inside the 'content-wrapper' div -->
                {{-- @if (auth()->user()->role_id == 5 || auth()->user()->role_id == 6)
                    <button type="button" class="btn btn-success dash1 mt-3" >Add</button>
                @endif --}}


                <!-- Modal -->
                <div class="modal fade container-fluid" id="" tabindex="-1"
                    aria-labelledby="createIndentModalLabel" aria-hidden="true">
                    <div class="modal-dialog rounded" role="document">
                        <div class="modal-content">
                            <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                                ADD GENERATOR
                                <div class="modal-body">
                                    @include('assets.generator')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal for vehicle insertion -->
            <div class="modal fade container-fluid" id="Generator" tabindex="-1" aria-labelledby="createIndentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog rounded" role="document">
                    <div class="modal-content">
                        <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                            ADD GENERATOR
                        </div>
                        <div class="modal-body">
                            @include('assets.generator')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="">
            <ul class="d-flex gap-5 bg-secondary shadow rounded-pill pt-3">
                <p class="nav-item">
                    <a href="{{ route('assets.index') }}"
                        class="nav-link align-middle px-0 {{ request()->route()->getName() === 'assets.index' ? 'active' : '' }}">
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">Assets</i></span>
                        </span>
                    </a>
                </p>
                <p class="nav-item">
                    <a href="{{ route('store.index') }}"
                        class="nav-link align-middle px-0 {{ request()->route()->getName() === 'store.index' ? 'active' : '' }}">
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">Parts</i></span>
                        </span>
                    </a>
                </p>
            </ul>
        </div>

    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-between bg-secondary shadow rounded-pill pt-3 pb-0 mb-4">
            <ul class="d-flex gap-5 ">
                <p class="nav-item">
                    <a href="{{ route('assets.index') }}"
                        class="nav-link align-middle px-0 {{ request()->route()->getName() === 'assets.index' ? 'active' : '' }}"
                        >
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">Generator</i></span>
                        </span>
                    </a>
                </p>
                <p class="nav-item">
                    <a href="{{route('vehicle.index')}}"
                        class="nav-link align-middle px-0 {{ request()->route()->getName() === 'vehicle.index' ? 'active' : '' }}"
                       >
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">Vehicle</i></span>
                        </span>
                    </a>
                </p>
                
            </ul>
            <div>
                <p class="nav-item px-4 rounded-pill">
                    <a href=""
                        class="nav-link align-middle px-0 btn btn-primary text-white {{ request()->route()->getName() === 'store.index' ? 'active' : '' }}"
                        data-bs-toggle="modal" data-bs-target="#Generator">
                        <span class="ms-1 d-none d-sm-inline">
                            <span class="ms-1">Add Generator</i></span>
                        </span>
                    </a>
                </p>
            </div>
        </div>
        
        <!-- Modal for vehicle insertion -->
        <div class="modal fade container-fluid" id="vehicle" tabindex="-1" aria-labelledby="createIndentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog rounded" role="document">
                <div class="modal-content">
                    <div class="modal-header fw-bolder text-white text-center" style="background:#F98917;">
                        ADD VEHICLE
                    </div>
                    <div class="modal-body">
                        @include('assets.vehicle')
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <table class="table table-bordered table-striped table-responsive table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">Asset number</th>
                <th scope="col">Engine Sr.No</th>
                <th scope="col">Engine make</th>
                <th scope="col">Alternative Sr.No</th>
                <th scope="col">Alternative make</th>
                <th scope="col">Battery Sr.No</th>
                <th scope="col">Battery make</th>
                <th scope="col">Actions</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($generator as $values)
                <tr class="">
                    <td>{{ $values->asset_number }}</td>
                    <td>{{ $values->engine_srno }}</td>
                    <td>{{ $values->engine_make }}</td>
                    <td>{{ $values->alternator_srno }}</td>
                    <td>{{ $values->alternator_make }}</td>
                    <td>{{ $values->battery_srno }}</td>
                    <td>{{ $values->battery_make }}</td>
                    <td class="d-flex gap-3">

                        <a href="{{route('generator.show',['id'=>$values->id])}}" class="pt-2">
                            <i class="fa-sharp fa-solid fa-eye" style="color:black;"></i>
                        </a>

                        <a href="{{route('generator.edit',['id'=>$values->id])}}" class="pt-2">
                            <i class="fa-regular fa-pencil"></i>
                        </a>
                       
                        <form action="{{route('generator.delete',['id'=>$values->id])}}" method="POST" id="delete-form-{{ $values->id }}">
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
                        
                        @if ($values->status == 1)
                            <form action="{{ route('generator.assign', ['id' => $values->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Assign</button>
                            </form>
                        @elseif($values->status == 0)
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Out</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        @if ($values->status == 1)
                        <li class="fs-1 text-danger rounded-circle "></li>
                    @elseif($values->status == 0)
                    <li class="fs-1 text-success"></li>

                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
