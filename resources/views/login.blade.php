<?php /** @var $errors \Illuminate\Support\MessageBag */ ?>

@extends('layouts.main')

@section('title', 'Авторизация')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <span class="card-title">@yield('title')</span>
        </div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Логин</label>
                    <input id="username" name="username" type="text" class="form-control" placeholder="Введите логин" value="{{ old('username') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Введите пароль" value="{{ old('password') }}" required>
                </div>
                <button class="btn btn-success" type="submit">Войти</button>
            </form>
        </div>
    </div>
@endsection