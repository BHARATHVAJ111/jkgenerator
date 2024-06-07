@extends('layouts.layouts')

<div class=" d-flex justify-content-center vh-100 align-items-center border">
    <form action="{{ route('quantity.store', ['id' => $value->id]) }}" method="POST" class="border p-5 bg-light shadow">
        <h4 class="text-center border-bottom border-3 pb-2">Add</h4>
        @csrf
        <div class="form text">
            <div class="form-group ">
                <label for="material_type">Material Type</label>
                <input type="text" class="form-control" id="material_type" value="{{ $value->material_type }}" name="material_type" disabled>
            </div>
            <div class="form-group ">
                <label for="date">Material Type</label>
                <input type="date" class="form-control" id="material_type" name="date">
            </div>
            <div class="form-group">
                <label for="existing_quantity">Existing Quantity</label>
                <input type="number" class="form-control" id="existing_quantity" value="{{ $value->number_of_quantity }}" name="existing_quantity" disabled>
            </div>
       
            <div class="form-group ">
                <label for="add_quantity">Add Quantity</label>
                <input type="number" class="form-control" id="add_quantity" name="add_quantity">
            </div>
            <div class="form-group">
                <label for="total_quantity">Total Quantity</label>
                <input type="text" class="form-control" id="total_quantity" name="total_quantity" readonly>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2 text-center">Update</button>
    </form>

</div>
@section('scripts')
    <script>
        // Update total quantity based on existing quantity and add quantity
        document.getElementById('add_quantity').addEventListener('input', function() {
            var existingQuantity = parseFloat(document.getElementById('existing_quantity').value) || 0;
            var addQuantity = parseFloat(this.value) || 0;
            var totalQuantity = existingQuantity + addQuantity;
            document.getElementById('total_quantity').value = totalQuantity.toFixed(2); // Adjust to your precision needs
        });
    </script>
@endsection
