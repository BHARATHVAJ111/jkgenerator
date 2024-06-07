@extends('layouts.layouts')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light shadow mt-3">
            <form action="{{route('generator.update',['id'=>$generator->id])}}" method="POST" id="indentForm">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="engine_srno">Asset Number:</label>
                                <input type="text" class="form-control @error('engine_srno') is-invalid @enderror"
                                    id="customer_name" name="engine_srno" value="{{ $generator->asset_number }}"
                                    disabled>
                                @error('engine_srno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="engine_srno">Engine Sr.No:</label>
                                <input type="text" class="form-control @error('engine_srno') is-invalid @enderror"
                                    id="customer_name" name="engine_srno" value="{{ $generator->engine_srno }}">
                                @error('engine_srno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="engine_make">Engine Make:</label>
                                <input type="text" class="form-control @error('engine_make') is-invalid @enderror"
                                    id="engine_make" name="engine_make" value="{{ $generator->engine_make }}">
                                @error('engine_make')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="alternator_srno">Alternator Serial Number:</label>
                                <input type="text"
                                    class="form-control @error('alternator_srno') is-invalid @enderror"
                                    id="alternator_srno" name="alternator_srno"
                                    value="{{ $generator->alternator_srno }}">
                                @error('alternator_srno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="alternator_make">Alternator Make:</label>
                                <input type="text"
                                    class="form-control @error('alternator_make') is-invalid @enderror"
                                    id="alternator_make" name="alternator_make"
                                    value="{{ $generator->alternator_make }}">
                                @error('alternator_make')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="battery_srno">Battery Sr.No:</label>
                                <input type="text" class="form-control @error('battery_srno') is-invalid @enderror"
                                    id="battery_srno" name="battery_srno" value="{{ $generator->battery_srno }}">
                                @error('battery_srno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="battery_make">Battery Make:</label>
                                <input type="text" class="form-control @error('battery_make') is-invalid @enderror"
                                    id="battery_make" name="battery_make" value="{{ $generator->battery_make }}">
                                @error('battery_make')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="oil_filter_part">Oil Filter part code:</label>
                                <input type="text"
                                    class="form-control @error('oil_filter_part') is-invalid @enderror"
                                    id="customer_name" name="oil_filter_part"
                                    value="{{ $generator->oil_filter_part_code }}">
                                @error('oil_filter_part')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="diesel_filter_part">Diesel Filter part code:</label>
                                <input type="text"
                                    class="form-control @error('diesel_filter_part') is-invalid @enderror"
                                    id="diesel_filter_part" name="diesel_filter_part"
                                    value="{{ $generator->diesel_filter_part_code }}">
                                @error('diesel_filter_part')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="air_filter_part">Air Filter part code:</label>
                                <input type="text"
                                    class="form-control @error('air_filter_part') is-invalid @enderror"
                                    id="air_filter_part" name="air_filter_part"
                                    value="{{ $generator->air_filter_part_code }}">
                                @error('air_filter_part')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="asset_photos">Assest photos:</label>
                                <input type="file"
                                    class="form-control @error('asset_photos') is-invalid @enderror"
                                    id="asset_photos" name="asset_photos" value="{{ $generator->asset_photos }}">
                                @error('asset_photos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                    </div>

                    <div class="mt-1 d-grid d-flex justify-content-around mt-2">
                        <a href="{{ route('assets.index') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" onclick="submitForm()" class="btn btn-success">Submit</button>
                    </div>
            </form>
        </div>
    </div>
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
