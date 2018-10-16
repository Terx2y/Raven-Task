@extends('template.user')
@section('title', 'Вход')

@section('content')

    <form action="/welcome-back" method="POST">
        <div class="fields">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Пароль">
        </div>

        <input type="submit" value="Войти">
    </form>
    <p class="retrieve-password">
        <a href="/retrieve">Забыли пароль?</a>
    </p>

    @if(isset($errors) && count($errors) > 0)
        <div class="errors">
            @foreach($errors as $error)
                <p> {!! $error !!} </p>
            @endforeach
        </div>
    @endif

@endsection