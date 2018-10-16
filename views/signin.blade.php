@extends('template.user')
@section('title', 'Вход')

@section('content')
    <form action="/welcome-back" method="POST">
        <input type="text" name="login" placeholder="Email">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>
@endsection