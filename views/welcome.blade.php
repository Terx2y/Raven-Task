@extends('template.guest')
@section('title', 'Добро пожаловать')

@section('content')
    <!--  Ни Header  ни Footer мне тут не нужен!!!  -->
    <div class="overlay"></div>

    <div class="top">
        <div class="title">
            Raven Task
        </div>
        <p class="sub-title">Планировщик задач</p>
    </div>
    <div class="bottom">
        <div class="buttons">
            <a href="#">Войти</a>
            <a href="#">Регистрация</a>
        </div>
    </div>
@endsection

