@extends('layouts.home')

@section('mid')
    <div class="well text-center">
        <h3>您好！请选择您的个人身份</h3>

        <hr>

        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <button class="btn btn-block btn-info">我是乘客</button>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <button class="btn btn-block btn-info">我是车主</button>
            </div>
        </div>
    </div>
@endsection