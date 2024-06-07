@extends('layouts.layouts')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light shadow mt-3">
            <form
                action="{{ route('service.engineer', ['asset_number' => $generator->asset_number, 'id' => $generator->id,'engine_srno'=>$generator->engine_srno,'engine_make'=>$generator->engine_make,'alternator_srno'=>$generator->alternator_srno,'alternator_make'=>$generator->alternator_make,'battery_srno'=>$generator->battery_srno,'battery_make'=>$generator->battery_make,'oilfilter'=>$generator->oil_filter_part_code,'dieselfilter'=>$generator->diesel_filter_part_code,'airfilter'=>$generator->air_filter_part_code]) }}"
                method="POST" id="indentForm">
                @csrf

                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="engine_srno">Asset Number:</label>
                                <input type="text" class="form-control @error('engine_srno') is-invalid @enderror"
                                  name="engine_srno" value="{{ $generator->asset_number }}"
                                    disabled>
                                @error('engine_srno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       
                        {{-- <label for="customer_name">Customer Name:</label><br> --}}
                        <input type="hidden" id="customer_name" name="customer_name" class="form-control" value="{{ $detailhistory ? $detailhistory->client_name : '' }}" >
                        @error('customer_name')
                            <div>{{ $message }}</div>
                        @enderror

                        {{-- <label for="location">Location:</label><br> --}}
                        <input type="hidden" id="location" name="location" class="form-control" value="{{ $detailhistory ? $detailhistory->location : '' }}">
                        @error('location')
                            <div>{{ $message }}</div>
                        @enderror

                        {{-- <label for="open_hr">Open HR:</label><br> --}}
                        <input type="hidden" id="open_hr" name="open_hr" class="form-control" value="{{ $detailhistory ? $detailhistory->open_hr : '' }}">
                        @error('open_hr')
                            <div>{{ $message }}</div>
                        @enderror
 
                        {{-- <label for="open_date">Open Date:</label><br> --}}
                        <input type="hidden" id="open_date" name="open_date" class="form-control" value="{{ $detailhistory ? $detailhistory->open_date : '' }}">
                        @error('open_date')
                            <div>{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="engineer_id">Service Engineer Name:</label>

                            <select class="form-select @error('material_type') is-invalid @enderror" id="source_of_lead"
                                name="engineer_id">
                                <option value="">select service engineer</option>
                                @foreach ($engineer as $value)
                                    <option value="{{ $value->engineer_id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @error('engineer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-1 d-grid d-flex justify-content-between mt-2">
                            <a href="{{ route('service.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" onclick="submitForm()" class="btn btn-success">Submit</button>
                        </div>
            </form>
        </div>
    </div>
</div>
