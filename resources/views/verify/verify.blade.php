<html>

<head>
    <style>
        body {
            color: #414141;
        }

        .container {
            font-family: 'Helvetica Neue', Helvetica;
            text-align: center;
            padding: 5px;
            display: flex;
            height: 100vh;
            align-items: center;
        }

        .text-container {
            width: 90%;
            max-width: 800px;
            font-weight: 300;
            margin: 0 auto;
            padding: 15px;
            padding-bottom: 15px;
        }

        h1 {
            font-weight: 100;
        }

        a {
            text-decoration: none;
            color: none;
        }

        .button {
            padding: 15px;
            font-family: 'Helvetica Neue', Helvetica;
            text-size: 18px;
            color: white;
            background-color: #f1e35c;
            border: 0;
            border-radius: 5px;
            margin: 10px;
            display: block;
            max-width: 200px;
            margin: auto;
            text-decoration: none;
        }

        p {
            line-height: 1.5;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body>
    <div class="container" id="web">
        <div class= "text-container">
            <h1><i class="fa fa-check-circle" aria-hidden="true" style="color: #f1e35c;"></i>{{ $title }}</h1>
            <p>{{ $message }}<span style="color: #0011ff;">
                @isset($user)
                    <a href="https://epics.uz/generate.html">{{ $user->email }}</a>
                @endisset
            </span>. </p>
        </div>
    </div>
</body>

</html>
