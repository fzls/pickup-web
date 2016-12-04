@extends('layouts.app')

@section('content')
    <pickup-chat></pickup-chat>
@endsection

@section('script')
    @include('components.vue.chat')
@endsection