<div class="container-fluid">
    <form action="{{route('vehicle.store')}}" method="POST" id="indentForm">
        @csrf
        <div class="">
            <div class="">
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="vehicle_no">Vehicle No:</label>
                        <input type="text" class="form-control @error('vehicle_no') is-invalid @enderror"
                            id="vehicle_no" name="vehicle_no" required>
                        @error('vehicle_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="type">Type 2W/4W :</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror"
                            id="type" name="type" required>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="alloted_to">Alloted To:</label>
                        <input type="text" class="form-control @error('alloted_to') is-invalid @enderror"
                            id="alloted_to" name="alloted_to" required>
                        @error('alloted_to')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="chasis_no">Chasis No :</label>
                        <input type="text" class="form-control @error('chasis_no') is-invalid @enderror"
                            id="chasis_no" name="chasis_no" required>
                        @error('chasis_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="engine_srno">Engine Sr.No:</label>
                        <input type="text" class="form-control @error('engine_srno') is-invalid @enderror"
                            id="engine_srno" name="engine_srno" required>
                        @error('engine_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="vehicle_make">Vehicle Make:</label>
                        <input type="text" class="form-control @error('vehicle_make') is-invalid @enderror"
                            id="vehicle_make" name="vehicle_make" required>
                        @error('vehicle_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="last_service_record">Last Service Record:</label>
                        <input type="text" class="form-control @error('last_service_record') is-invalid @enderror"
                            id="last_service_record" name="last_service_record" required>
                        @error('last_service_record')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="last_service_km">Last Service KM:</label>
                        <input type="text" class="form-control @error('last_service_km') is-invalid @enderror"
                            id="last_service_km" name="last_service_km" required>
                        @error('last_service_km')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="last_service_spares">Last Service Spares & Tyre Change Dates:</label>
                        <input type="text" class="form-control @error('last_service_spares') is-invalid @enderror"
                            id="last_service_spares" name="last_service_spares" required>
                        @error('last_service_spares')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            

</div>

<div class="mt-1 d-grid d-flex justify-content-around mt-2">
    <a href="{{route('store.index')}}" class="btn btn-danger">Cancel</a>
    <button type="submit" onclick="submitForm()"  class="btn btn-success">Submit</button>
</div>
</form>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<style>
    .ui-autocomplete {
        z-index: 10000;
        /* Set an even higher z-index value */
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Include your JavaScript code here -->

