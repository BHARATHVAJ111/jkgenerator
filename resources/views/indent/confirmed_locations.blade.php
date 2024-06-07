@extends('layouts.sidebar')

@section('content')
<div class="mt-2">
    <button type="button" class="btn text-light mt-3 bg-secondary p-2">Confirmed Locations</button>
    <a class="btn dash1 float-end m-3" href="{{ route('fetch-last-two-details') }}">Quoted</a>
</div>
@if(count($indents) > 0)
<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th>Enq No</th>
            <th>Customer Name</th>
            <th>Company Name</th>
            <th>Number 1</th>
            <th>Pickup Location</th>
            <th>Drop Location</th>
            <th>Material Type</th>
            <th>Truck Type</th>
            <th>Rate</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($indents as $confirmedIndent)
        <tr>
        <td>{{ $confirmedIndent->getUniqueENQNumber() }}</td>
            <td>{{ $confirmedIndent->customer_name }}</td>
            <td>{{ $confirmedIndent->company_name }}</td>
            <td>{{ $confirmedIndent->number_1 }}</td>
            <td>{{ $confirmedIndent->pickupLocation ? $confirmedIndent->pickupLocation->district : 'N/A' }}</td>
            <td>{{ $confirmedIndent->dropLocation ? $confirmedIndent->dropLocation->district : 'N/A' }}</td>
            <td>{{ $confirmedIndent->materialType->name }}</td>
            <td>{{ $confirmedIndent->truckType->name }}</td>
            <td>@if($confirmedIndent->indentRate->isNotEmpty())
                {{ $confirmedIndent->indentRate->sortBy('rate')->first()->rate }}
                @else
                 N/A
                 @endif</td>
            <td>{{ $confirmedIndent->remarks }}</td>
            <td>
                <div class="d-flex m-1">

                <a href="#." class="btn btn-warning me-2">Trips</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmModal">Lose</button>

                <!-- Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this indent?
                                <!-- Display the remarks field in the modal -->
                                <div class="form-group mt-3">
                                    <select class="form-control" id="reason" name="reason">
                                        <option value="Not Responding">Not Responding</option>
                                        <option value="Material not ready">Material not ready</option>
                                        <option value="Duplicate Enquiry">Duplicate Enquiry</option>
                                        <option value="Unavailability of vehicle">Unavailability of vehicle</option>
                                        <option value="Trip Postponed">Trip Postponed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="submitForm()">Lose</button>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="loseForm" action="{{ route('indents.destroy', $confirmedIndent->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<button type="button" class="btn text-black mt-3 bg-light fw-bolder">No locations are confirmed yet.</button>
@endif
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function submitForm() {
        // Submit the form when the "Delete" button in the modal is clicked
        document.getElementById('loseForm').submit();
    }

    // Show/hide the remarks field in the modal based on the button click
    $('#confirmModal').on('shown.bs.modal', function() {
        $('#remarks').focus();
    });

    $('#confirmModal').on('hidden.bs.modal', function() {
        $('#remarks').val(''); // Clear the textarea when the modal is closed
    });
</script>
@endsection