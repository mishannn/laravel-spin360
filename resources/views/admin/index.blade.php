<?php /** @var $spins \App\Spin[] */ ?>

@extends('layouts.main')

@section('title', 'Список изображений')

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
            <table class="table table-sm table-striped table-responsive">
                <tr>
                    <th>Название</th>
                    <th>Заголовок</th>
                    <th>Количество изображений</th>
                    <th>Скорость</th>
                    <th>Инверсия</th>
                    <th>Действия</th>
                </tr>
                @foreach($spins as $spin)
                    <tr>
                        <td><a href="{{ route('spin', ['name' => $spin->name]) }}" target="_blank">{{ $spin->name }}</a></td>
                        <td>{{ $spin->title }}</td>
                        <td>{{ $spin->frames_count }}</td>
                        <td>{{ $spin->rotation_speed }}</td>
                        <td>{{ ($spin->invert_rotation === 1) ? 'вкл' : 'выкл' }}</td>
                        <td><a href="{{ route('admin.delete', ['name' => $spin->name]) }}" class="btn btn-sm btn-warning">Удалить</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection