@extends('layouts.app')

@section('content')
    <pickup-recharge></pickup-recharge>
@endsection

@section('script')
    @include('components.vue.recharge')
@endsection