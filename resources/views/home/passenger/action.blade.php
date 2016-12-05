@extends('layouts.app')

@section('content')
    <pickup-action></pickup-action>
@endsection

@section('script')
    @include('components.vue.home.passenger.action')
@endsection