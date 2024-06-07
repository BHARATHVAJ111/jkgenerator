<div class="container-fluid">
    <form action="{{ route('assets.store') }}" method="POST" id="indentForm">
        @csrf
        <input type="hidden" name="generated_number" id="generated_number">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="customer_name">Material Name:</label>
                        <input type="text" class="form-control @error('material_name') is-invalid @enderror"
                            id="customer_name" name="material_name" required>
                        @error('material_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                            id="location" name="location" required>
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-1">
                        <label for="source_of_lead">Material Type:</label>
                        <select class="form-select @error('material_type') is-invalid @enderror" id="source_of_lead"
                            name="material_type" required>
                            <option value="select">select</option>
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
                            <option value="dg spares">Dg spares</option>
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
                            name="quantity" required> 
                            <option value="Select">Select</option>
                            <option value="Ltr">Ltr</option>
                            {{-- <option value="Numbers">Numbers</option> --}}
                            <option value="Nos">Nos</option>
                            <option value="Mtr">Mtr</option>
                            <option value="Set">Set</option>
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
                            id="number_2" name="number_of_quantity" required >
                        @error('number_of-quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-1 ">
                    <div class="form-group mt-1">
                        <label for="remarks">Description:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="remarks" name="description" required></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>

            

            {{-- <div class="row">
                <div class="form-group mt-1 col-md-6">
                    <label for="source_of_lead">Source of Lead:</label>
                    <select class="form-select @error('source_of_lead') is-invalid @enderror" id="source_of_lead"
                        name="source_of_lead">
                        <option value="select">select</option>
                        <option value="Justdial">Justdial</option>
                        <option value="Whatsapp">Whatsapp</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Direct">Direct</option>
                    </select>
                    @error('source_of_lead')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group mt-1 col-md-6">
                    <label for="body_type">Body Type:</label>
                    <select class="form-select @error('body_type') is-invalid @enderror" id="body_type"
                        name="body_type">
                        <option value="select">select</option>
                        <option value="Open">Open</option>
                        <option value="Container">Container</option>
                    </select>
                    @error('body_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6 ms-2">
            <div class="form-group mt-1">
                <label for="truck_type_id">Truck Type</label>
                <div class="input-group">
                    <select name="truck_type_id" id="truck_type_id"
                        class="form-control @error('truck_type_id') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach ($truckTypes as $truckType)
                            <option value="{{ $truckType->id }}">{{ $truckType->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-warning text-white" id="addTruckType"><i
                                class="fa fa-plus" style="font-size:24px"></i></button>
                    </div>
                </div>
                @error('truck_type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-1">
                <label for="material_type_id">Material Type</label>
                <div class="input-group">
                    <select name="material_type_id" id="material_type_id"
                        class="form-control @error('material_type_id') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach ($materialTypes as $materialType)
                            <option value="{{ $materialType->id }}">{{ $materialType->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-warning  text-white" id="addMaterialType"><i
                                class="fa fa-plus" style="font-size:24px"></i></button>
                    </div>
                </div>
                @error('material_type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="form-group mt-1 col-md-6">
                    <label for="weight">Weight:</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('weight') is-invalid @enderror"
                            id="weight" name="weight">
                        <select name="weight_unit" id="weight_unit" class="form-select" required>
                            <option value="kg / tons">kg / tons</option>
                            <option value="kg" {{ old('weight_unit') === 'kg' ? 'selected' : '' }}>kg</option>
                            <option value="tons" {{ old('weight_unit') === 'tons' ? 'selected' : '' }}>tons</option>
                        </select>
                        @error('weight_unit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('weight_unit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group mt-1 col-md-6">
                    <label for="pod_soft_hard_copy">POD Soft / Hard Copy:</label>
                    <input type="text" class="form-control @error('pod_soft_hard_copy') is-invalid @enderror"
                        id="pod_soft_hard_copy" name="pod_soft_hard_copy">
                    @error('pod_soft_hard_copy')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div> --}}
</div>

{{-- <input type="hidden" id="pickup_location_id" name="pickup_location_id">
<input type="hidden" id="drop_location_id" name="drop_location_id">
<div class="form-group mt-1">
    <label for="pickup_location">Pickup Location:</label>
    <input type="text" class="form-control autocomplete" id="pickup_location" name="pickup_location"
        autocomplete="off" required>
</div>

<div class="form-group mt-1">
    <label for="drop_location">Drop Location:</label>
    <input type="text" class="form-control autocomplete" id="drop_location" name="drop_location"
        autocomplete="off" required>
</div>
<div class="row">
    <div class="form-group mt-1">
        <label for="remarks">Remarks:</label>
        <textarea class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks"></textarea>
        @error('remarks')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div> --}}
<div class="mt-1 d-grid d-flex justify-content-around mt-2">
    <a href="{{route('store.index')}}" class="btn btn-danger">Cancel</a>
    <button type="submit" onclick="submitForm()"  class="btn btn-success">Submit</button>
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
<!-- Include your JavaScript code here -->
<script>
    $(function() {
        $(".autocomplete").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('locations.autocomplete') }}",
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data.map(item => ({
                            label: item.district,
                            value: item.district,
                            id: item.id
                        })));
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                var inputId = $(this).attr('id');
                var hiddenInputId = inputId + '_id';
                $('#' + hiddenInputId).val(ui.item.id);

                // Check if the current input is pickup or drop location
                if (inputId === 'pickup_location') {
                    $('#pickup_location_id').val(ui.item.id);
                } else if (inputId === 'drop_location') {
                    $('#drop_location_id').val(ui.item.id);
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#addTruckType').on('click', function() {
            addNewOption('truck_type_id', 'Truck Type', "{{ route('trucks.store') }}");
        });

        $('#addMaterialType').on('click', function() {
            addNewOption('material_type_id', 'Material Type', "{{ route('materials.store') }}");
        });

        function addNewOption(selectId, label, storeRoute) {
            var newValue = prompt('Enter new ' + label);
            if (newValue) {
                $.ajax({
                    url: storeRoute,
                    method: 'POST',
                    data: {
                        name: newValue,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        // Assuming the response contains the new type's ID and name
                        $('#' + selectId).append('<option value="' + response.id + '">' + response
                            .name + '</option>');
                        $('#' + selectId).val(response.id);
                    },
                    error: function(error) {
                        console.error('Error storing new ' + label + ': ' + error.responseText);
                    }
                });
            }
        }
    });
</script>
