@extends('layouts.layouts')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light shadow mt-3">
    <form action="{{ route('parts.update',['id'=>$edit->id]) }}" method="POST" id="indentForm">
        @csrf
        @method('PUT')
        <input type="hidden" name="generated_number" id="generated_number">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Assets Code:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="material_name" value="{{$edit->jrnum}}" disabled>
                        @error('material_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Material Name:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="material_name" value="{{$edit->material_name}}">
                        @error('material_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="source_of_lead">Material Type:</label>
                        <select class="form-select @error('material_type') is-invalid @enderror" id="source_of_lead"
                            name="material_type">
                            <option value="{{$edit->material_type}}">{{$edit->material_type}}</option>
                            <option value="lupricant">Lubricant</option>
                            <option value="Diesel Filter">Diesel Filter</option>
                            <option value="Oil Filter">Oil Filter</option>
                            <option value="Air Filter">Air Filter</option>
                            <option value="Alum Cables">Alum Cables</option>
                            <option value="Machine Spares">Machine Spares</option>
                            <option value="Electrical Meters">Electrical Meters</option>
                            <option value="Tools">Tools</option>
                            <option value="Paint item">Paint item</option>
                            <option value="Adhseive">Adhseive</option>
                            <option value="dg spares">dg spares</option>
                            <option value="Wires">Wires</option>
                            <option value="Board">Board</option>
                            <option value="Cleaning">Cleaning</option>
                        </select>
                        @error('material_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                        
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="source_of_lead">Quantity:</label>
                        <select class="form-select @error('quantity') is-invalid @enderror" id="source_of_lead"
                            name="quantity">
                            <option value="{{$edit->quantity}}">{{$edit->quantity}}</option>
                            <option value="Ltr">Ltr</option>
                            <option value="Numbers">Numbers</option>
                            <option value="nos">nos</option>
                            <option value="Mtr">Mtr</option>
                            <option value="set">set</option>
                            <option value="Kg">Kg</option>
                        </select>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
    
        
                </div>
                <div class="row">

                    <div class="form-group mt-1">
                        <label for="number_2">Number of Quantity:</label>
                        <input type="number" class="form-control @error('number_of-quantity') is-invalid @enderror"
                            id="number_2" name="number_of_quantity" value="{{$edit->number_of_quantity}}" >
                        @error('number_of-quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-1 ">
                    <div class="form-group mt-1">
                        <label for="remarks">Description:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="remarks" name="description">{{$edit->description}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>

</div>

<div class="mt-1 d-grid d-flex justify-content-around mt-2">
    <a href="{{route('store.index')}}" class="btn btn-danger">Cancel</a>
    <button type="submit" onclick="submitForm()"  class="btn btn-success">Submit</button>
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

