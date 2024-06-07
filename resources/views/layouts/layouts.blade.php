<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head><style>
    @media (max-width: 767px) {

        /* Hide some elements on small screens */
        .sidebar a {
            display: none;
        }

        /* Show only necessary elements */
        .sidebar .btn.dash,
        .sidebar a.d-block {
            display: block;
        }
    }

    /* Media query for larger screens */
    @media (min-width: 768px) {

        /* Hide/show elements accordingly */
        .sidebar .btn.dash,
        .sidebar a.d-none.d-lg-block {
            display: none;
        }

        .sidebar a.d-block.d-lg-none {
            display: block;
        }
    }

    span {
        color: black;
    }


    .active>span {
        background-color: #F98917 !important;
        color: white;
        padding: 10px;
        border-radius: 15px;
    }

    /* Override Bootstrap's default link styles */
    .nav-link {
        color: black !important;
        /* Change link color */
    }

    .nav-link:hover {
        color: black !important;
        /* Change link hover color */
    }

    .nav-link:active,
    a.nav-link.active {
        background-color: transparent !important;
        /* Remove active link background */
        color: black !important;
        /* Change active link color */
    }

    .nav-link i.fa-arrow-right {
        display: none;
    }

    .nav-link.active i.fa-arrow-right {
        display: inline-block;
        /* Show the arrow icon */
        margin-left: 5px;
        /* Adjust margin as needed */
    }
</style>
{{-- <body style="background-image:url('images/front.png');background-size:cover;"> --}}
    <body>
                <div>
                    @yield('content')
                </div>

            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="{{ asset('js/script.js') }}"></script>
            <div>
                @yield('scripts')
            </div>
</body>

</html>