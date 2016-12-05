@extends('layouts.home')

@section('left')
    @include('components.blade.home.chat-panel')
@endsection

@section('mid')
    @include('components.blade.home.baidu-map')
@endsection

@section('right')
    @include('components.blade.home.contact-panel')
    @include('components.blade.home.action-buttons')
@endsection