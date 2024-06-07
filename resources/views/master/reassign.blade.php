@extends('layouts.layouts')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light shadow mt-3">
            <form action="{{route('reassign.engineer',['id'=>$engineer_assign->id])}}" method="POST">
                @csrf
                
                <div class="">
                    <div class="">
                        <div class="form-group">
                            <label for="engineer_id">Service Engineer Name:</label>

                            <select class="form-select @error('material_type') is-invalid @enderror" id="source_of_lead"
                                name="engineer_id">
                                <option value="">select service engineer</option>
                                @foreach ($engineer as $value)
                                    <option value="{{ $value->engineer_id }}">{{ $value->name }}</option>
                                    {{-- <option value="select">select service engineer</option>
                            <option value="select service engineer 1">select service engineer 1</option>
                            <option value="select service engineer 2">select service engineer 2</option>
                            <option value="select service engineer 3">select service engineer 3</option>
                            <option value="select service engineer 4">select service engineer 4</option> --}}
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
