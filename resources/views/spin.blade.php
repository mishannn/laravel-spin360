<?php /** @var $spin \App\Spin */ ?>

@extends('layouts.blank')

@section('title', $spin->title)

@section('content')
    <div class="content">
        <div class="img-wrapper">
            <img id="spin-image" class="reel" src="{{ route('home') }}/storage/spins/{{ $spin->name }}/1.jpg"
                 data-laziness="1"
                 data-frames="{{ $spin->frames_count }}"
                 data-images="{{ route('home') }}/storage/spins/{{ $spin->name }}/#.jpg"
                 data-responsive="true"
                 data-cw="{{ ($spin->invert_rotation == 1) ? 'true' : 'false' }}"
                 data-throwable="false"
                 data-speed="{{ $spin->rotation_speed }}">
        </div>
        <div class="info-bar">
            <img src="{{ route('home') }}/img/finger.png">
            <img src="{{ route('home') }}/img/360.png">
            <img src="{{ route('home') }}/img/mouse.png">
        </div>
    </div>
@endsection

@push('links')
    <link href="{{ route('home') }}/css/view.css" rel="stylesheet">
@endpush

@push('endHead')
    <script src="{{ route('home') }}/js/jquery.min.js"></script>
    <script src="{{ route('home') }}/js/jquery.mousewheel.min.js"></script>
    <script src="{{ route('home') }}/js/jquery.reel.min.js"></script>
@endpush