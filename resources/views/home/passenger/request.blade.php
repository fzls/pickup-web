@extends('layouts.app')

@section('content')
    <pickup-request></pickup-request>
@endsection

@section('script')
    @include('components.vue.home.passenger.request')
@endsection