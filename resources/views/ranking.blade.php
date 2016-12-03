@extends('layouts.app')

@section('content')
    <pickup-ranking></pickup-ranking>
@endsection

@section('script')
    @include('components.vue.ranking')
@endsection