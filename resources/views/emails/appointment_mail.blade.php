<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$mailData['title']}}</h1>
    <br>
    <p>{{$mailData['body']}}</p>
    <br>
    <p>
        {{$mailData['footer']}}
    </p>
</body>
</html>