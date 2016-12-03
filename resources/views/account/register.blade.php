@extends('layouts.app')

@section('content')
    <pickup-register></pickup-register>
@endsection

@section('script')
    @include('components.vue.register')
@endsection