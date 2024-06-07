<a href="#" class="btn edit-button" data-indent-id="{{ $indent->id }}" data-bs-toggle="modal" data-bs-target="#editIndentModal_{{ $indent->id }}">
    <i class="fa fa-edit" style="font-size:17px;color:brown"></i>
</a>



<div class="modal fade" id="editIndentModal_{{ $indent->id }}" tabindex="-1" role="dialog" aria-labelledby="editIndentModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#F98917">
                <h5 class="modal-title" id="editIndentModalLabel">Update Indent</h5>
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2>Update Indent</h2>
                    <form action="{{ route('indents.update', $indent->id) }}" method="POST" id="indentForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-1">
                                    <label for="customer_name">Customer Name:</label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $indent->customer_name }}">
                                </div>

                                <div class="form-group mt-1">
                                    <label for="company_name">Company Name:</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $indent->company_name }}">
                                </div>

                                <div class="form-group mt-1">
                                    <label for="number_1">Number 1:</label>
                                    <input type="text" class="form-control" id="number_1" name="number_1" value="{{ $indent->number_1 }}">
                                </div>

                                <div class="form-group mt-1">
                                    <label for="number_2">Number 2:</label>
                                    <input type="text" class="form-control" id="number_2" name="number_2" value="{{ $indent->number_2 }}">
                                </div>

                                <div class="form-group mt-1">
                                    <label for="source_of_lead">Source of Lead:</label>
                                    <select class="form-select" id="source_of_lead" name="source_of_lead">
                                        <option value="Justdial" {{ $indent->source_of_lead === 'Justdial' ? 'selected' : '' }}>Justdial</option>
                                        <option value="Whatsapp" {{ $indent->source_of_lead === 'Whatsapp' ? 'selected' : '' }}>Whatsapp</option>
                                        <option value="Social Media" {{ $indent->source_of_lead === 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                        <option value="Direct" {{ $indent->source_of_lead === 'Direct' ? 'selected' : '' }}>Direct</option>
                                        <option value="Source Of Lead" {{ $indent->source_of_lead === 'Source Of Lead' ? 'selected' : '' }}>Source Of Lead</option>
                                    </select>
                                </div>

                                <label for="pickup_location_id">Pickup Location:</label>
                                <select class="form-select" name="pickup_location_id" required>
                                    <!-- Populate this dropdown with the available locations from your database -->
                                    @foreach($locations as $location)
                                    <option value="{{ $location->id }}" {{ $indent->pickup_location_id == $location->id ? 'selected' : '' }}>{{ $location->district }}</option>
                                    @endforeach
                                </select><br>

                                <label for="drop_location_id">Drop Location:</label>
                                <select class="form-select" name="drop_location_id" required>
                                    <!-- Populate this dropdown with the available locations from your database -->
                                    @foreach($locations as $location)
                                    <option value="{{ $location->id }}" {{ $indent->drop_location_id == $location->id ? 'selected' : '' }}>{{ $location->district }}</option>
                                    @endforeach
                                </select><br>

                            </div>
                            <div class="col-md-6">

                                <!-- Truck Type Dropdown -->
                                <div class="form-group">
                                    <label for="truck_type_id">Truck Type</label>
                                    <select name="truck_type_id" id="truck_type_id" class="form-control">
                                        <option value="">Select or Add Truck Type</option>
                                        @foreach ($truckTypes as $truckType)
                                        <option value="{{ $truckType->id }}" {{ $indent->truck_type_id == $truckType->id ? 'selected' : '' }}>
                                            {{ $truckType->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="form-group mt-1">
                                    <label for="body_type">Body Type:</label>
                                    <select class="form-select" id="body_type" name="body_type">
                                        <option value="Open" {{ $indent->body_type === 'Open' ? 'selected' : '' }}>Open</option>
                                        <option value="Container" {{ $indent->body_type === 'Container' ? 'selected' : '' }}>Container</option>
                                    </select>
                                </div>

                                <div class="form-group mt-1 col-md-6">
    <label for="weight">Weight:</label>
    <div class="input-group">
        <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ $indent->weight }}">
        <select name="weight_unit" id="weight_unit" class="form-select" required>
            <option value="kg" {{ $indent->weight_unit === 'kg' ? 'selected' : '' }}>kg</option>
            <option value="tons" {{ $indent->weight_unit === 'tons' ? 'selected' : '' }}>tons</option>
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

                                {{-- edit.blade.php --}}
                                <!-- Material Type Dropdown -->
                                <div class="form-group">
                                    <label for="material_type_id">Material Type</label>
                                    <select name="material_type_id" id="material_type_id" class="form-control">
                                        <option value="">Select or Add Material Type</option>
                                        @foreach ($materialTypes as $materialType)
                                        <option value="{{ $materialType->id }}" {{ $indent->material_type_id == $materialType->id ? 'selected' : '' }}>
                                            {{ $materialType->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-1">
                                    <label for="pod_soft_hard_copy">POD Soft / Hard Copy:</label>
                                    <input type="text" class="form-control" id="pod_soft_hard_copy" name="pod_soft_hard_copy" value="{{ $indent->pod_soft_hard_copy }}">
                                </div>
                            </div>
                            <div class="form-group mt-1">
                                <label for="remarks">Remarks:</label>
                                <textarea class="form-control" id="remarks" name="remarks" rows="3">{{ $indent->remarks }}</textarea>
                            </div>

                            <div class="mt-3 d-grid gap-3">
                                <button type="submit" class="btn dash1">Update</button>
                            </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>