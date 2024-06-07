<div class="container-fluid">
    <form action="" method="POST" id="indentForm">
        @csrf
        <div class="">
            <div class="">
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Booling date:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="booking_date">
                        @error('booking_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Enquiry date:</label>
                        <input type="date" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="enquiry_date">
                        @error('enquiry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Dg capacity:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="capacity">
                        @error('capacity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Duration:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="duration">
                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Cost/Rent:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="cost">
                        @error('cost')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Company name:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="company_name">
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Contact number:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="contact_number">
                        @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Email id:</label>
                        <input type="email" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="email_id">
                        @error('email_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Location:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="location">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Quote no :</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="quote_no">
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
