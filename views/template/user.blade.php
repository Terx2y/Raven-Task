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
            padding: 100px;
            height: auto;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.13);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .wrapper .sign-logo{
            padding-bottom: 60px;
            font-family: 'Ubuntu';
            color: #444444;
            font-size: 3em;
            display: flex;
            flex-direction: column;
        }

        .wrapper .sign-logo span{
            font-family: 'Ubuntu';
            color: #444444;
            font-size: 15px;
            margin-left: 95px;
        }
        .wrapper form{
            width: 400px;
            height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        .wrapper .retrieve-password{
            margin-top: 50px;
        }
        .wrapper .retrieve-password a{
            font-family: 'Ubuntu';
            color: #386E93;
            text-decoration: none;
        }

        .wrapper .retrieve-password a:hover{
            transition: color ease 0.5s;
            color: #254962;
        }

        .wrapper .join{
            margin-top: 20px;
        }
        .wrapper .join a{
            font-family: 'Ubuntu';
            color: #386E93;
            text-decoration: none;
        }

        .wrapper .join a:hover{
            transition: color ease 0.5s;
            color: #254962;
        }

        .fields{
            display: flex;
            width: 100%;
            height: 100px;
            flex-direction: column;
            justify-content: space-around;
        }
        .fields input[type=email], input[type=password], input[type=text]{
            height: 35px;
            width: inherit;
            padding: 0 0 0 15px;
            outline: none;
            font-family: 'Ubuntu';
            font-size: 16px;
            border-radius: 20px;
            border: 1px #4444 solid;
        }
        input[type=submit]{
            height: 35px;
            width: 220px;
            border: none;
            outline: none;
            cursor: pointer;
            font-family: 'Ubuntu';
            font-size: 16px;
            background-color: #007ACC;
            color: #fff;
            margin-bottom: -20px;
            border-radius: 20px;
        }

        input[type=submit]:hover{
            transition: background-color ease 0.5s;
            background-color: #254962;
        }

        .errors{
            margin: 60px 0 -60px 0;
            background-color: rgba(255,41,44,0.2);
            width: 100%;
            height: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #ff292c;
            border: 1px #ff292c solid;
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
        <p class="sign-logo">
            Raven Task
            <span>Планировщик задач</span>
        </p>
        @yield('content')
    </div>
</body>
</html>