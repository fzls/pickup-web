@extends('layouts.app')

@section('content')
    <pickup-notification></pickup-notification>
@endsection

@section('script')
    @include('components.vue.notification')
@endsection