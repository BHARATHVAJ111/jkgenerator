{{-- <div class="container-fluid">
    <form action="https://api.web3forms.com/submit" method="POST" id="indentForm">
        @csrf
       
        <input type="hidden" name="access-key" value="ced02fba-849d-4ddb-b2b0-a3cbfa2b023f">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Source:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="source" value="{{$convert->source}}">
                        @error('source')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Enquiry date:</label>
                        <input type="date" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="enquiry_date" value="{{$convert->enquiry_date}}">
                        @error('enquiry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Dg capacity:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="capacity" value="{{$convert->capacity}}">
                        @error('capacity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Duration:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="duration" value="{{$convert->duration}}">
                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Cost/Rent:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="cost" value="{{$convert->cost}}">
                        @error('cost')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Company name:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="company_name" value="{{$convert->company_name}}">
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Contact number:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="contact_number" value="{{$convert->contact_number}}">
                        @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Email id:</label>
                        <input type="email" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="email_id" value="{{$convert->email_id}}">
                        @error('email_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Location:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="location" value="{{$convert->location}}">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Quote no :</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="quote_no" value="{{$convert->quote_no}}">
                        @error('quote_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                

</div>
<div class="d-flex justify-content-around mt-3">
    <a href="{{route('sales.index')}}">
        <button  class="btn btn-danger">Cancel</button>
    </a>
    <button type="submit"  class="btn btn-success">Send Mail</button>
</div>
</form>
</div> --}}
@extends('layouts.layouts')
<div class="justify-content-center container mt-3">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('mail.send')}}" method="POST" class="contact-left" id="contact-form">
    
    {{-- <input type="hidden" name="access_key" value="ced02fba-849d-4ddb-b2b0-a3cbfa2b023f"> --}}
@csrf
    <div class="">
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Source:</label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="source" value="{{$convert->source}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Enquiry date:</label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="enquiry_date" value="{{$convert->enquiry_date}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Capacity:</label>
                    <input type="type" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="capacity"  value="{{$convert->capacity}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Duration:</label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="duration"  value="{{$convert->duration}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Cost/Rent:</label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="cost"  value="{{$convert->cost}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Company Name:</label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="company_name"  value="{{$convert->company_name}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Contact Number:</label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="contact_number"  value="{{$convert->contact_number}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Email id:</label>
                    <input type="email" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="email"  value="{{$convert->email_id}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="customer_name">Quote No:</label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                        id="customer_name" name="quote_no"  value="{{$convert->quote_no}}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        {{-- <div class="">
            <div class="row">
                <div class="form-group mt-1">
                    <label for="file">Attach File:</label>
                    <input type="file" class="form-control @error('material_name') is-invalid @enderror"
                        id="file" name="file">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div> --}}
    </div>
    
    <button class=" btn btn-success " type="submit" id="submit-btn">Send Email</button>
    {{-- <a href="{{route('sales.index')}}">
        <button  class="btn btn-danger">Cancel</button>
    </a> --}}
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