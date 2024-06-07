<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            font-size: 16px;
        }

        .btn {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h4 class="text-warning text-center">Assign</h4>
    <form action="{{route('assign.store',['id' => $value->id])}}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control @error('material_name') is-invalid @enderror" id="customer_name"
                   name="material_name" value="{{$value->material_type}}" disabled>
            @error('material_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Engineer Name:</label>
            <input type="text" class="form-control @error('service_engineer') is-invalid @enderror" id="customer_name"
                   name="service_engineer">
            @error('service_engineer')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                   name="date" placeholder="Date">
            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Quantity :</label>
            <input type="number" class="form-control @error('number_of-quantity') is-invalid @enderror" id="number_2"
                   name="quantity" placeholder="Enter Number Of Quantity">
            @error('number_of-quantity')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Quantity Type :</label>
            <select class="form-select @error('quantity') is-invalid @enderror" id="source_of_lead" name="quantity_name">
                <option value="select">select</option>
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
        <div class="form-group mt-1">
            <label for="remarks">Description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="remarks" name="description" required></textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="mt-1 d-grid gap-3">
                <a href="{{route('store.index')}}" class="btn btn-danger">Cancel</a>
                <button type="submit" onclick="submitForm()" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</body>
</html>
