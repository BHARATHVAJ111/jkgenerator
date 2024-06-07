@extends('layouts.layouts')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light shadow mt-3">
            <form
                action="{{ route('service.detailstore', ['asset_number' => $generator->asset_number, 'id' => $generator->id,'engine_srno'=>$generator->engine_srno,'engine_make'=>$generator->engine_make,'alternator_srno'=>$generator->alternator_srno,'alternator_make'=>$generator->alternator_make,'battery_srno'=>$generator->battery_srno,'battery_make'=>$generator->battery_make,'oilfilter'=>$generator->oil_filter_part_code,'dieselfilter'=>$generator->diesel_filter_part_code,'airfilter'=>$generator->air_filter_part_code]) }}"
                method="POST" id="indentForm">
                @csrf
              

                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="engine_srno">Asset Number:</label>
                                <input type="text" class="form-control"
                                  name="engine_srno" value="{{ $generator->asset_number }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client_name">Client Name:</label>
                            <input type="text" id="client_name" name="client_name" class="form-control">
                            @error('client_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label for="">Location:</label><br>
                        <input type="text" id="location" name="location" class="form-control">
                        @error('location')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                      
                        <label for="">Open Hour:</label><br>
                        <input type="text
                        "id="open_hr" name="open_hr" class="form-control">
                        @error('open_hr')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                       

                        <label for="">Open Date:</label><br>
                        <input type="date" id="open_date" name="open_date" class="form-control">
                        @error('open_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                       
                         @if ($servicehistory)
    <!-- Access properties here -->
    <label for="">Last Oil Service:</label><br>
    <input type="text" id="last_os_hr" name="last_os_hr" class="form-control" value="{{$servicehistory->last_os_service}}">
    @error('last_os_hr')
    <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    <!-- Handle case where $servicehistory is empty -->
@endif
                         @if ($servicehistory)
    <!-- Access properties here -->
    <label for="">Last OS Date:</label><br>
                        <input type="date" id="last_os_date" name="last_os_date" class="form-control" value="{{$servicehistory->oil_service_date}}">
                        @error('last_os_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
    <!-- Handle case where $servicehistory is empty -->
@endif

                       
                       

                        

                        <div class="form-group">
                            <label for="">Movement Type:</label>

                            <select class="form-select" id="source_of_lead"
                                name="movement">
                                <option value="">Select Movement Type</option>
                                    <option value="Mobilization">Mobilization</option>
                                    <option value="De Mobilization">De Mobilization</option>
                                    <option value="Replacement">Replacement</option>
                            </select>
                            @error('movement')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                          
                        </div>

                        <label for="last_os_date">Closing Hour:</label><br>
                        <input type="text" id="closing_hr" name="closing_hr" class="form-control">
                        @error('closing_hr')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                        <label for="last_os_date">Closing Date:</label><br>
                        <input type="date" id="closing_date" name="closing_date" class="form-control">
                        @error('closing_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                       

                        <div class="mt-1 d-grid d-flex justify-content-between mt-2">
                            <a href="{{ route('service.index') }}" class="btn btn-danger">Back</a>
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
