@extends('layouts.app')

@section('content')
    <pickup-change-phone></pickup-change-phone>
@endsection

@section('script')
    @include('components.vue.change-phone')
@endsection