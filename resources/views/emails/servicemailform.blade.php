@extends('layouts.layouts')
<div class="container bg-light shadow">
    <form action="{{route('mail.service')}}" method="POST" >
        @csrf
        <div class="">
            <div class="">
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="dg">DG KVA:</label>
                        <input type="text" class="form-control @error('dg') is-invalid @enderror"
                            id="dg" name="dg">
                        @error('dg')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                            id="date" name="date">
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Customer name:</label>
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                            id="customer_name" name="customer_name">
                        @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="engine_make">Engine make:</label>
                        <input type="text" class="form-control"
                            id="engine_make" name="engine_make" value="{{$generator->engine_make}}">
                        @error('engine_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="engine_srno">Engine Sr No:</label>
                        <input type="text" class="form-control"
                            id="engine_make" name="engine_srno" value="{{$generator->engine_srno}}">
                        @error('engine_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="alternative_make">Alternative Make:</label>
                        <input type="text" class="form-control"
                            id="engine_make" name="alternative_make" value="{{$generator->alternator_make}}">
                        @error('alternative_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="alternative_srno">Alternative Sr No:</label>
                        <input type="text" class="form-control"
                            id="engine_make" name="alternative_srno" value="{{$generator->alternator_srno}}">
                        @error('alternative_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="battery_make">Battery Make:</label>
                        <input type="text" class="form-control"
                            id="engine_make" name="battery_make" value="{{$generator->battery_make}}">
                        @error('battery_make')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="battery_srno">Battery Sr NO:</label>
                        <input type="text" class="form-control"
                            id="engine_make" name="battery_srno" value="{{$generator->battery_srno}}">
                        @error('battery_srno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="email_id">Customer Email id:</label>
                        <input type="email" class="form-control @error('email_id') is-invalid @enderror"
                            id="customer_name" name="email_id">
                        @error('email_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Location:</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                            id="customer_name" name="location">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="open_date">Open Date:</label>
                        <input type="date" class="form-control @error('open_date') is-invalid @enderror"
                            id="customer_name" name="open_date">
                        @error('open_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="open_hour">Open hour:</label>
                        <input type="time" class="form-control @error('open_hour') is-invalid @enderror"
                            id="customer_name" name="open_hour">
                        @error('open_hour')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}

</div>
<div class="d-flex justify-content-around mt-3">
    <a href="{{route('service.index')}}" class="btn btn-danger">
        Cancel
    </a>
    <button type="submit"  class="btn btn-success">Submit</button>
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
