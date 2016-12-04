@extends('layouts.app')

@section('content')
    <pickup-order></pickup-order>
@endsection

@section('script')
    @include('components.vue.order')
@endsection