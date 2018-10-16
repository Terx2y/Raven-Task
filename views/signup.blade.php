@extends('template.user')
@section('title', 'Регистрация')

@section('content')
    <form action="/welcome" method="POST">
        <input type="text" name="login" placeholder="Имя">
        <input type="email" name="email" placeholder="EMail">
        <input type="password" name="password" placeholder="Пароль">
        <input type="password" name="confirm" placeholder="Повторите пароль">
        <input type="submit" value="Регистрация">
    </form>
@endsection