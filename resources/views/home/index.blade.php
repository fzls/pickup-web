@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <pickup-test></pickup-test>
        </div>
    </div>
@endsection

@section('script')
    @include('components.vue.test')
@endsection
