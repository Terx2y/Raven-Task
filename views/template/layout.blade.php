<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raven | @yield('title')</title>

    <link rel="stylesheet" href="/public/css/tasks.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
</head>
<body>
<div id="sideMenu">
    <p>
            <span>
                <i class="fas fa-crow"></i>
            </span>
        <i class="fa fa-bars" aria-hidden="true" title="Открыть меню"></i>
    </p>

    <div id="menuParts">
        <ul>
            <li id="active">
                <a href="/" style="color: #fff;" title="Главная"><i class="fa fa-home" aria-hidden="true"></i></a>
                <span><a href="/">Главная</a></span>
            </li>

            <li>
                <a href="/tasks" style="color: #fff;" title="Задачи"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                <span><a href="/tasks">Задачи</a></span>
            </li>

            <li>
                <a href="/favorites" style="color: #fff;" title="Избранное"><i class="fa fa-star" aria-hidden="true"></i></a>
                <span><a href="/favorites">Избранное</a></span>
            </li>
        </ul>
    </div>

    <div id="user_part">
        <div id="modules">
            <a href="/" title="Модули"><i class="fas fa-puzzle-piece"></i></a>
        </div>

        <div id="user">
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
    </div>
</div>
<div id="openedMenu">
    <span>RavenTask</span>
</div>

<div id="makeTask">
    <p id="top"><i class="fas fa-times" title="Close"></i></p>

    <div id="inputBlock">
        <form method="post" class="task-form">
            <p><input type="text" name="Name" placeholder="Заголовок" id="name"></p>
            <p><textarea name="Desc" id="desc" rows="5" cols="40" placeholder="Краткое описание"></textarea></p>
            <p>
                <select id="priority" name="priority">
                    <option value="tile tile-lg tile-light-green ripple-effect">Приоритет не задан</option>
                    <option value="tile tile-lg tile-light-blue ripple-effect">Обычный</option>
                    <option value="tile tile-lg tile-sqr tile-purple ripple-effect">В ближайшее время</option>
                    <option value="tile tile-lg tile-sqr tile-red ripple-effect">Срочно</option>
                </select>
            </p>

            <p>
                <select id="time" name="deadline">
                    <option>30 мин</option>
                    <option>1 час</option>
                    <option>2 часа</option>
                    <option>4 часа</option>
                    <option>На своё усмотрение</option>
                </select>
            </p>
        </form>
    </div>

    <button id="start">
        Начать
        <img src="/public/images/go.png" alt="">
    </button>
</div>
<header>
    <span style="width: 30px"></span>
    <button id="newTask">Задание <i class="fas fa-plus"></i></button>
    <button id="about">О Проекте</button>
</header>
<div id="wrapper">
    <!-- About project overlay and modal -->
    <div id="about_overlay">
        <div id="about_window">
            <div id="about_top">
                <span id="about_top_title">Raven Task&nbsp;&nbsp;<sup>v 0.0.1&nbsp;(pre-alpha)</sup></span>
                <span id="about_window_close" title="Закрыть">&#10005;</span>
            </div>
            <div id="about_body">
                <div id="about_logo">
                    <a href="#"><img src="/public/images/GitHub-Logo.png" alt="App Logo" width="110px"></a>
                    <p>Raven Task</p>
                </div>
                <div id="about_info">
                </div>
            </div>
        </div>
    </div>
    <!-- End of project overlay and modal -->

    <div id="content">
        @yield('content')
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous">
</script>
<script src="/public/js/tiles.js"></script>

<script>
    $(document).ready(function(){
        // Открытие меню
        $('.fa-bars').on('click', function(){
            $('#openedMenu ,#menuParts ul li span').toggle('slide');
        });
        // Новое задание
        $('#newTask').on('click', function(){
            $('#makeTask').effect('slide', { direction: 'right', mode: 'show' }, 500);
        });

        $('.fa-times').on('click', function(){
            $('#makeTask').effect('slide', { direction: 'right', mode: 'hide' }, 500);
        });

        $('#about').click(function () {
            $('#about_overlay').css("display", "flex");
        });

        $('#about_window_close').click(function () {
            $('#about_overlay').css("display", "none");
        });

        $('#start').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: '/add',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $('.task-form').serialize(),

                success: function(data){
                    $('.alert-body').html( data );
                    $('#makeTask').effect('slide', { direction: 'right', mode: 'hide' }, 500);
                    resetForm('.task-form'); // очищаем поля формы
                    $('.alert-overlay').css("display", "flex").delay(3000).fadeOut('fast');

                    // КОСТЫЛЬ !!!!!
                    setInterval(function(){
                        window.location.reload();
                    }, 3200);

                },
                error: function(data){
                    alert(data);
                }
            });
        });

// Если нажмём на крестик, уведомление исчезнет
        $('.fa-times').click(function(){
            $('.alert-overlay').css("display", "none");
        });
        // Alert block ends

        function resetForm(name)
        {
            $(name).find('input').val('');
            $(name).find('textarea').val('');
            $(name).find('select').prop('selectedIndex', 0);
        }
    });
</script>
</body>
</html>