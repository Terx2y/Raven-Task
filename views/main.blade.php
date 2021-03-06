@extends('template.layout')

@section('title', 'Главная страница')

@section('content')

    <div id="tasks_content">

        <p style="width: 100%; display: flex; justify-content: flex-start; align-items: center; height: 62px; font-size: 1.5em; padding-left: 10px;">Добро пожаловать, {{ $user['name'] }}
            <span> <a href="/logout">&nbsp;&nbsp;выйти</a></span>
        </p>
        <div id="list_tasks" class="dashboard display-animation" style="margin: 0 auto;">
        </div>

    </div>
    <!-- Task alert -->
    <div class="alert-overlay">
        <div class="alert-window">
            <span class="alert-top">
                <span><i class="fas fa-exclamation-triangle"></i>Уведомление</span>
                <i class="fas fa-times" title="Закрыть"></i>
            </span>
            <span class="alert-body"></span>
        </div>
    </div>
    <!-- End of task alert -->
@endsection