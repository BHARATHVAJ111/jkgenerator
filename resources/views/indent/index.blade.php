    <!-- resources/views/indents/index.blade.php -->

    @extends('layouts.sidebar')<!-- Assuming you have a layout file -->

    @section('content')
    <div class="d-flex justify-content-between mt-3">
        <div class="horizontal-menu">
        <ul>
            <li class="{{ request()->is('indents/index') ? 'active' : '' }}">
                <a href="{{ route('indents.index') }}" class="dropdown-item">Unquoted</a>
            </li>
            <li class="{{ request()->is('fetch-last-two-details') ? 'active' : '' }}">
                <a class="dropdown-item" href="{{ route('fetch-last-two-details') }}">Quoted</a>
            </li>
            <!-- <a href="{{ route('recyclebin.index') }} " class="btn"><i class="fa fa-database" style="font-size:17px;color:darkorchid"></i></a>    -->
           
            <li>
                <a href="{{ route('confirmed_locations')}}">Confirmed
                    </a>
            </li>
            <li>
                <a href="{{ route('canceled-indents') }}">Cancel
                    </a>
            </li>
        </ul>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif



        </div>
        <div class="d-flex justify-content-end gap-2">
            <div>
                <form class="form-inline my-2 my-lg-0" type="get" action="{{url('/search/indent')}}">
                    <input class="form-control mr-sm-2" name="query" type="search" placeholder="search...">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div>
                <a href="{{url('/dashboard')}}" class="btn dash1">Back to Indent</a>
            </div>
        </div>

    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Enq No</th>
                <th>Pickup Location</th>
                <th>Drop Location</th>
                <th>Truck type</th>
                <th>Body type</th>
                <th>Weight</th>
                <th>Material Type</th>
                <th>HardCopy</th>
                <th>Remarks</th>
                <th>Source of Lead</th>
                <th>Salesperson</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($indents as $indent)
            <tr>
                <td>{{ $indent->getUniqueENQNumber() }}</td>
                <td>{{ $indent->pickupLocation ? $indent->pickupLocation->district : 'N/A' }}</td>
                <td>{{ $indent->dropLocation ? $indent->dropLocation->district : 'N/A' }}</td>

                <td>{{ $indent->truckType ? $indent->truckType->name : 'N/A' }}</td>
                <td>{{ $indent->body_type }}</td>
                <td>{{ $indent->weight }} {{ $indent->weight_unit }}</td>

                <td>{{ $indent->materialType ? $indent->materialType->name : 'N/A' }}</td>

                <td>{{ $indent->pod_soft_hard_copy }}</td>
                <td>{{ $indent->remarks }}</td>
                <td>{{ $indent->source_of_lead }}</td>
                <td>{{ $indent->user->name }}</td>
                <td class="d-flex">
                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
                    <div>@include('indent.delete')</div>
                    <a href="{{ route('indents.show', $indent->id) }}" class="btn"><i class="fa fa-eye" style="font-size:17px;color:darkblue"></i></a>
                    <div>@include('indent.edit')</div>
                    @endif
                    @if(auth()->user()->role_id == 4)
                    <div>@include('rate')</div>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    @endsection