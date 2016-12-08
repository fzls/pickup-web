@extends('layouts.home')

@section('mid')
    <div class="well text-center">
        <h3>您好！请选择您的个人身份</h3>

        <hr>

        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <a class="btn btn-block btn-info" href="{{url('/passenger')}}" @click="setStatus(false)">我是乘客</a>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <a class="btn btn-block btn-info" href="{{url('/driver')}}" @click="setStatus(true)">我是车主</a>
            </div>
        </div>
    </div>
@endsection