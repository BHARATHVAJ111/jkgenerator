  @extends('layouts.sidebar')

  @section('content')
  <div class="d-flex justify-content-between gap-2 mt-3">
      <div class="fw-bolder display-6 text-success">Confirmation Of Booking Truck</div>
      <div>
          <a href="{{url('/indent/details')}}" class="btn dash1 me-1">show details</a>
          <a class="btn dash1 float-end " href="{{ route('fetch-last-two-details') }}">Quoted</a>
      </div>
  </div>

  <div class="card shadow border" style="margin:5% 20% 0 20%">
      <h5 class="card-header text-center mb-4 bg-warning">{{ $indent->customer_name }}</h5>
      <div class="card-body text-center">
          <p class="card-text"><strong class="label-width">Pickup Location:</strong> <span> {{ $indent->pickupLocation->district }}</span></p>
          <p class="card-text"><strong class="label-width">Drop Location:</strong><span> {{ $indent->dropLocation->district }}</span></p>
          <p class="card-text"><strong class="label-width">Truck Type:</strong><span>{{ $indent->truckType ? $indent->truckType->name : 'N/A' }}</span></p>
          <p class="card-text"><strong class="label-width">Body Type:</strong><span>{{ $indent->body_type }}</span></p>
          <p class="card-text"><strong class="label-width">Weight:</strong><span>{{ $indent->weight }}</span></p>
          <p class="card-text"><strong class="label-width">Material Type:</strong><span>{{ $indent->materialType ? $indent->materialType->name : 'N/A' }}</span></p>
          <p class="card-text"><strong class="label-width">Salesperson:</strong><span> {{ $indent->user->name }}</span></p>
          <p class="card-text"><strong class="label-width">Status:</strong><span> {{ $indent->status }}</span></p>
          <p class="card-text"><strong class="label-width">Driver Rate:</strong>
              <span>
                  <select class="form-select" id="rate" name="rate">
                  @foreach($leastRates as $rateOption)
                      <option value="{{ $rateOption }}" {{ $rateOption == $secondLeastRateAmount ? '' : 'selected' }}>
                          {{ $rateOption }}
                      </option>
                      @endforeach

                      <!-- <option value="{{ $secondLeastRateAmount }}" selected>
                                             {{ $secondLeastRateAmount }}
                                             </option> -->
                  </select>
              </span>
          </p>

          </span>
          </p>
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
            <a href="{{ route('confirm-to-trips', ['id' => $indent->id]) }}" onclick="confirmToTrips('{{ $indent->id }}'); return false;" class="btn btn-success">Win</a>
    <!-- Button trigger modal -->
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">
    Cancel Indents
  </button>

  <!-- Modal -->
  <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('cancel-indents-by-locations') }}" method="POST">
          @csrf
          <input type="hidden" name="pickup_location_id" value="{{ $pickupLocationId }}">
          <input type="hidden" name="drop_location_id" value="{{ $dropLocationId }}">
          <div class="modal-header">
            <h5 class="modal-title" id="cancelModalLabel">Select Reason for Cancellation:</h5>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="reason">Select Reason for Cancellation:</label>
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
            <button type="submit" class="btn btn-danger">Confirm Cancellation</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- Bootstrap JS and jQuery (make sure to include jQuery before Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



          @endif
      </div>
  </div>

  <style>
      p {
          text-align: left;
      }

      .label-width {
          width: 130px;
          /* Adjust the width according to your preference */
          display: inline-block;
      }

      span {
          display: inline-block;
          text-align: left;
          margin-left: 30px;
          /* Adjust the margin to add space between label and value */
      }
  </style>



<script>
    function confirmToTrips(indentId) {
        // Perform an AJAX request to update the status
        axios.post(`/confirm-to-trips/${indentId}`)
            .then(response => {
                // Handle success, e.g., show a success message
                console.log(response.data);

                // Optionally, you can redirect to a new page or perform other actions.
                // For example, to reload the current page:
                window.location.reload();
            })
            .catch(error => {
                // Handle error, e.g., show an error message
                console.error(error);
            });
    }

</script>


  @endsection