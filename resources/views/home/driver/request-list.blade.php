@extends('layouts.app')

@section('content')
    <pickup-request-list></pickup-request-list>
@endsection

@section('script')
    @include('components.vue.request-list')
@endsection