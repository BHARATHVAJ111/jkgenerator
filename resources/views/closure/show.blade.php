<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 10px 0;
            font-size: 16px;
            color: #666;
        }
        .details label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Closure Details</h1>
        <div class="details">
            <label>Service Engineer:</label>
            <p>{{$closure->service_engineer}}</p>
            <label>Engine Serial Number:</label>
            <p>2</p>
            <label>Engine Make:</label>
            <p>{{$closure->engine_make}}</p>
            <!-- Add more details here -->
            <label>Asset Number:</label>
            <p>{{$closure->asset_number}}</p>
            <label>Customer Name:</label>
            <p>{{$closure->customer_name}}</p>
            <label>Location:</label>
            <p>{{$closure->location}}</p>
            <label>Open Hour:</label>
            <p>{{$closure->open_hr}}</p>
            <label>Open Date:</label>
            <p>{{$closure->open_date}}</p>
            <!-- Add more details here -->
        </div>
    </div>
</body>
</html>
