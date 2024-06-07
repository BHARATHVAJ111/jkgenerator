@extends('layouts.layouts')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 bg-light shadow mt-3">
            <form action="{{ route('status', ['asset_number' => $asset_number]) }}" method="POST" id="indentForm" enctype="multipart/form-data">
                @csrf
                <div class="">
                     @if (session('errors'))
                    <div class="alert alert-success">
                        {{ session('errors') }}
                    </div>
                @endif
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="image">image-1:</label>
                                <input type="file" class="form-control @error('imageone') is-invalid @enderror"
                                    id="customer_name" name="imageone">
                                @error('imageone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="image">image-2:</label>
                                <input type="file" class="form-control @error('imagetwo') is-invalid @enderror"
                                    id="customer_name" name="imagetwo">
                                @error('imagetwo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-1">
                                <label for="image">image-3:</label>
                                <input type="file" class="form-control @error('imagethree') is-invalid @enderror"
                                    id="customer_name" name="imagethree">
                                @error('imagethree')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    <div class="mt-1 d-grid d-flex justify-content-around mt-2">
                        <a href="{{ route('store.index') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
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
