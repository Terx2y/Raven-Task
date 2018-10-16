@extends('template.user')
@section('title', 'Регистрация')

@section('content')
    <form action="/welcome" method="POST">
        <div class="fields-register">
            <input type="text" name="login" placeholder="Имя">
            <input type="email" name="email" placeholder="EMail">
            <input type="password" name="password" placeholder="Пароль">
            <input type="password" name="confirm" placeholder="Повторите пароль">
        </div>
        <input type="submit" value="Регистрация">
    </form>
@endsection