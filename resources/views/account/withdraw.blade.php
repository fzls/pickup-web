@extends('layouts.app')

@section('content')
    <pickup-withdraw></pickup-withdraw>
@endsection

@section('script')
    @include('components.vue.withdraw')
@endsection