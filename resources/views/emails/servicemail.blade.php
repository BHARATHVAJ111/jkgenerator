<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JKPL Mail</title>
</head>
<body>
    <div class="container">
        <p>Dear Sir/Mam,</p>
        <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.<span class="fs-5">{{$contact_data['dg']}}</span> Ab amet <span class="fs-5">{{$contact_data['date']}}</span>laborum obcaecati officiis sint vel nemo fuga pariatur, explicabo odio tenetur debitis et maxime dolor aut hic, quod aliquid optio.Lorem10</p>
        <h4>{{$contact_data['dg']}}</h4>
        <p>Engine Make:{{$contact_data['engine_make']}}</p>
        <p>Engine Sr No:{{$contact_data['engine_srno']}}</p>
        <p>Alternator Make:{{$contact_data['alternative_make']}}</p>
        <p>Alternator Sr No:{{$contact_data['alternative_srno']}}</p>
        <p>Battery Make:{{$contact_data['battery_make']}}</p>
        <p>Battery Sr No:{{$contact_data['battery_srno']}}</p>
    </div>
</body>
</html>
