<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('login_file/css.css')}}">
</head>

<body>

    <div class="aylana">

        <img class="aylana1" src="{{ asset('login_file/images/aylana1.png')}}">
        <img class="aylana2" src="{{ asset('login_file/images/aylana2.png')}}">
    </div>

    <div class="cl"></div>
    <div class="form_controll">
        <form action="{{ route("login")}}" method="POST" class="form">
            @csrf
            <h1 class="title">Tizimga Kirish</h1>
            <label for="input1">Email</label>
            <input type="email" name="email" required id="input1" class="input" placeholder="">
            <label for="input2">Parol</label>
            <input type="password" name="password" required id="input2" class="input bot" placeholder="">
            <button class="btn">Kirish</button>
        </form>
    </div>
    <script src="{{ asset('login_file/js.js')}}"></script>
</body>

</html>
<!-- Prepared by Habibulloh -->
