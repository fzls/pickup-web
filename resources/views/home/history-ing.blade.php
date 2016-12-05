@extends('layouts.app')

@section('content')
    <pickup-history-ing></pickup-history-ing>
@endsection

@section('script')
    @include('components.vue.home.history-ing')
@endsection