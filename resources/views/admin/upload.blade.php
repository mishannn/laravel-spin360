<?php /** @var $errors \Illuminate\Support\MessageBag */ ?>

@extends('layouts.main')

@section('title', 'Загрузка нового набора изображений')

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
            <form action="{{ route('admin.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="uploadTitle">Заголовок</label>
                    <input id="uploadTitle" name="upload_title" type="text" class="form-control" placeholder="Например: Новый дом" value="{{ old('upload_title') }}" required>
                </div>
                <div class="form-group">
                    <label for="uploadName">Название (латинские буквы и цифры без пробелов)</label>
                    <input id="uploadName" name="upload_name" type="text" class="form-control" placeholder="Например: newhouse" value="{{ old('upload_name') }}" required>
                </div>
                <div class="form-group">
                    <label for="uploadRotationSpeed">Скорость прокрутки (кадры в секунду)</label>
                    <input id="uploadRotateSpeed" name="upload_rotation_speed" type="number" min="0" max="10" step="0.01" class="form-control"
                           placeholder="Например: 0.2" value="{{ old('upload_rotation_speed') }}" required>
                </div>
                <div class="form-check">
                    <input id="uploadInvertRotation" name="upload_invert_rotation" class="form-check-input" type="checkbox" value="yes">
                    <label for="uploadInvertRotation">Инверсия прокрутки</label>
                </div>
                <div class="form-group">
                    <label for="uploadArchive">Выберите ZIP архив с изображениями</label>
                    <input type="file" name="upload_archive" id="uploadArchive" required>
                </div>
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>
        </div>
    </div>
@endsection