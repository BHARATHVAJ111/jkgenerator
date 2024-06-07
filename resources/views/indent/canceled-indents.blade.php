@extends('layouts.sidebar')

@section('content')
<div class="mt-2">
<button type="button" class="btn text-light mt-3 bg-secondary p-2">Cancel Indents</button>
    <a class="btn dash1 float-end m-3" href="{{ route('fetch-last-two-details') }}">Quoted</a>
</div>
@if($canceledIndents->isEmpty())
<button type="button" class="btn text-black mt-3 bg-light fw-bolder">No canceled indents found.</button>
@else
<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th>ENQ Number</th>
            <th>Pickup Location</th>
            <th>Drop Location</th>
            <th>Material Type</th>
            <th>Reason</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($canceledIndents as $indent)
        <tr>
            <td>{{ $indent->getUniqueENQNumber() }}</td>
            <td>{{ $indent->pickupLocation ? $indent->pickupLocation->district : 'N/A' }}</td>
            <td>{{ $indent->dropLocation ? $indent->dropLocation->district : 'N/A' }}</td>
            <td>{{ $indent->materialType ? $indent->materialType->name : 'N/A' }}</td>
            <td class="text-danger fw-bolder">{{ $indent->cancelReasons->isNotEmpty() ? $indent->cancelReasons->pluck('reason')->implode(', ') : 'N/A' }}</td>
            <td>
    <form action="{{ route('restore-canceled-indent', ['id' => $indent->id]) }}" method="POST" style="display: inline;">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-info">Revert</button>
    </form>
</td>


        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
