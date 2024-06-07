<div class="container-fluid">
    <form action="{{route('Generator.store')}}" method="POST" id="indentForm">
        @csrf
        <div class="">
            <div class="">
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="engine_srno">Engine Sr.No:</label>
                        <input type="text" class="form-control @error('engine_srno') is-invalid @enderror"
                            id="customer_name" name="engine_srno" required>
                        @error('engine_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="dg_range">DG Range:</label>
                        <input type="text" class="form-control @error('dg_range') is-invalid @enderror"
                            id="dg_range" name="dg_range" required>
                        @error('dg_range')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="engine_make">Engine Make:</label>
                        <input type="text" class="form-control @error('engine_make') is-invalid @enderror"
                            id="engine_make" name="engine_make" required>
                        @error('engine_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="alternator_srno">Alternator Serial Number:</label>
                        <input type="text" class="form-control @error('alternator_srno') is-invalid @enderror"
                            id="alternator_srno" name="alternator_srno" required>
                        @error('alternator_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="alternator_make">Alternator Make:</label>
                        <input type="text" class="form-control @error('alternator_make') is-invalid @enderror"
                            id="alternator_make" name="alternator_make" required>
                        @error('alternator_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="battery_srno">Battery Sr.No:</label>
                        <input type="text" class="form-control @error('battery_srno') is-invalid @enderror"
                            id="battery_srno" name="battery_srno" required>
                        @error('battery_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="battery_make">Battery Make:</label>
                        <input type="text" class="form-control @error('battery_make') is-invalid @enderror"
                            id="battery_make" name="battery_make" required>
                        @error('battery_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="oil_filter_part">Oil Filter part code:</label>
                        <input type="text" class="form-control @error('oil_filter_part') is-invalid @enderror"
                            id="customer_name" name="oil_filter_part" required>
                        @error('oil_filter_part')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="diesel_filter_part">Diesel Filter part code:</label>
                        <input type="text" class="form-control @error('diesel_filter_part') is-invalid @enderror"
                            id="diesel_filter_part" name="diesel_filter_part" required>
                        @error('diesel_filter_part')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="air_filter_part">Air Filter part code:</label>
                        <input type="text" class="form-control @error('air_filter_part') is-invalid @enderror"
                            id="air_filter_part" name="air_filter_part" required>
                        @error('air_filter_part')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="asset_photos">Assest photos:</label>
                        <input type="file" class="form-control @error('asset_photos') is-invalid @enderror"
                            id="asset_photos" name="asset_photos" required>
                        @error('asset_photos')
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

