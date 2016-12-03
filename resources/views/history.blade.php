@extends('layouts.app')

@section('content')
    <pickup-history></pickup-history>
@endsection

@section('script')
    @include('components.vue.history')
@endsection