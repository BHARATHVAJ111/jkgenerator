@extends('layouts.sidebar')

@section('content')
<div id="quoted-content">
    <div class="horizontal-menu mt-3">
        <ul>
            <li class="{{ request()->is('indents/index') ? 'active' : '' }}">
                <a href="{{ route('indents.index') }}" class="dropdown-item">Unquoted</a>
            </li>
            <li class="{{ request()->is('fetch-last-two-details') ? 'active' : '' }}">
                <a class="dropdown-item" href="{{ route('fetch-last-two-details') }}">Quoted</a>
            </li>
            <!-- <a href="{{ route('recyclebin.index') }} " class="btn"><i class="fa fa-database" style="font-size:17px;color:darkorchid"></i></a>    -->
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
            <li>
                <a href="{{ route('confirmed_locations')}}">Confirmed
                    </a>
            </li>
            @endif
            <li>
                <a href="{{ route('canceled-indents') }}">Cancel
                    </a>
            </li>
        </ul>
    </div>
    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)

    @endif
    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>ENQ Number</th>
                <th>Pickup Location</th>
                <th>Drop Location</th>
                <th>Truck type</th>
                <th>Body type</th>
                <th>Weight</th>
                <th>Material Type</th>
                <th>HardCopy</th>
                <th>Rate L1</th>
                <th>Rate L2</th>
                <th>Usertype</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($indents as $indent)
            <tr>
                <td>{{ $indent->getUniqueENQNumber() }}</td>
                <td>{{ $indent->pickupLocation ? $indent->pickupLocation->district : 'N/A' }}</td>
                <td>{{ $indent->dropLocation ? $indent->dropLocation->district : 'N/A' }}</td>
                <td>{{ $indent->truckType ? $indent->truckType->name : 'N/A' }}</td>
                <td>{{ $indent->body_type }}</td>
                <td>{{ $indent->weight }} {{ $indent->weight_unit }}</td>
                <td>{{ $indent->materialType ? $indent->materialType->name : 'N/A' }}</td>
                <td>{{ $indent->pod_soft_hard_copy }}</td>
                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
                <td>
                    @if($indent->indentRate->isNotEmpty())
                    {{ $indent->indentRate->sortBy('rate')->first()->rate }}
                    @else
                    N/A
                    @endif
                </td>
                <td>
                    @php
                    $pickupLocationId = optional($indent->pickupLocation)->id;
                    $dropLocationId = optional($indent->dropLocation)->id;
                    $locationCombination = $pickupLocationId . '-' . $dropLocationId;

                    $secondLeastRate = isset($secondLeastRateAmounts[$locationCombination])
                    ? $secondLeastRateAmounts[$locationCombination]
                    : null;
                    @endphp

                    @if ($secondLeastRate !== null && $secondLeastRate !== '')
                    {{ $secondLeastRate }}
                    @else
                    N/A
                    @endif
                </td>
                @endif

                @if(auth()->user()->role_id === 4)
                <td>
                    @php
                    $leastRateForLoggedInSupplier = $indent->indentRate->where('user_id', $user->id)->sortBy('rate')->first();
                    @endphp

                    @if($leastRateForLoggedInSupplier)
                    {{ $leastRateForLoggedInSupplier->rate }}
                    @else
                    N/A
                    @endif
                </td>
                <td>
                    @php
                    $secondLeastRateForLoggedInSupplier = $indent->indentRate
                    ->where('user_id', $user->id)
                    ->sortBy('rate')
                    ->skip(1) // Skip the first rate
                    ->first();
                    @endphp

                    @if($secondLeastRateForLoggedInSupplier)
                    {{($secondLeastRateForLoggedInSupplier->rate) }}
                    @else
                    N/A
                    @endif
                </td>


                @endif



                <td>{{ $indent->user->name }}</td>

                <td class="d-flex">
                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
                    <a href="{{ route('indents.show', $indent->id) }}" class="btn"><i class="fa fa-eye" style="font-size:17px;color:blue"></i></a>
                    <a href="{{ route('showIndentDetails')}}" class="btn"><i class="fa fa-info-circle" style="font-size:17px;color:darkorange"></i></a>
                    <a href="{{ route('recyclebin.index') }} " class="btn"><i class="fa fa-database" style="font-size:17px;color:darkorchid"></i></a>
                    @if($indent->status != 1)
                    <a class="btn" href="{{ route('indents.confirm', ['id' => $indent->id]) }}">
                        <i class="fa fa-check-circle" style="font-size:17px;color:green"></i>
                    </a>
                    @endif
                    <div>
                        @include('indent.edit')
                    </div>
                    @endif

                    @if(auth()->user()->role_id == 4)
                    <div>@include('rate')</div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- Add this script at the end of your quoted.blade.php file -->
<script>
    function cancelTripAndRefresh(id) {
        // Send an AJAX request to cancel the trip
        fetch(`/cancel-trips/${id}`)
            .then(response => response.json())
            .then(data => {
                // Update the HTML content with the new data
                document.getElementById('quoted-content').innerHTML = data.html;
            })
            .catch(error => console.error('Error:', error));
    }
</script>
@endsection