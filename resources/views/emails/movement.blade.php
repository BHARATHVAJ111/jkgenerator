@extends('layouts.layouts')
<div class="container-fluid ">
    <form action="{{route('mail.movement.send',['id'=>$values->id,'asset'=>$values->asset_number])}}" method="POST" >
        @csrf
        <div class="">
            <div class="">
               
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="name">name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="customer_name" name="name">
                        @error('name')
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
