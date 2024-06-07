@extends('layouts.layouts')
<div class="container-fluid">
    <h2 class="text-center pt-5" style="text-decoration: underline">Parts Description</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light shadow mt-3">
            <form action="{{ route('assets.store') }}" method="POST" id="indentForm">
                @csrf
                <input type="hidden" name="generated_number" id="generated_number">
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="customer_name">Asset Code:</label>
                                <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                                    id="customer_name" name="material_name" value="{{ $partsshow->jrnum }}" disabled>
                                @error('material_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="customer_name">Material Name:</label>
                                <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                                    id="customer_name" name="material_name" value="{{ $partsshow->material_name }}">
                                @error('material_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="customer_name">Location:</label>
                                <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                                    id="customer_name" name="material_name" value="{{ $partsshow->location }}">
                                @error('material_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="source_of_lead">Material Type:</label>
                                <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                                    id="customer_name" value="{{ $partsshow->material_type }}">
                                @error('material_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="source_of_lead">Quantity:</label>
                                <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                                    id="customer_name" value="{{ $partsshow->quantity }}">
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group mt-1">
                                <label for="number_2">Number of Quantity:</label>
                                <input type="number"
                                    class="form-control @error('number_of-quantity') is-invalid @enderror"
                                    id="number_2" name="number_of_quantity"
                                    value="{{ $partsshow->number_of_quantity }}">
                                @error('number_of-quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-1 ">
                            <div class="form-group mt-1">
                                <label for="remarks">Description:</label>
                                <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                                    id="customer_name" value="{{ $partsshow->description }}">
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 d-grid d-flex justify-content-around mt-2">
                        <a href="{{ route('store.index') }}" class="btn btn-danger">Back</a>
                        {{-- <button type="submit" onclick="submitForm()"  class="btn btn-success">Submit</button> --}}
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
