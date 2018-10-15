<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raven | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        html,body{
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        header{
            height: 48px;
            width: 100%;
            border-bottom: 1px solid rgba(0,0,0,0.33);
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.13);
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            font-family: 'Ubuntu';
        }
        .logo{
            margin-left: 10%;
        }
        .logo a{
            text-decoration: none;
            color: #444444;
        }
        .logo a:hover {
            text-decoration: underline;
        }
        .wrapper{
            width: 960px;
            height: 500px;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.13);
        }

    </style>
</head>
<body>
<header>
    <p class="logo">
        <a href="/">Raven Task</a>
    </p>
</header>
    <div class="wrapper">
        @yield('content')
    </div>
</body>
</html>