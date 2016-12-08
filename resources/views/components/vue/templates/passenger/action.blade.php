@extends('layouts.home')

@section('mid')
    <div class="text-center">
        <h3>选择下一步行动</h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <a class="btn btn-block btn-info btn-lg" href="{{url('/request-for-car')}}">现在叫车</a>
        </div>
        <div class="col-md-4 col-md-offset-2">
            <a class="btn btn-block btn-info btn-lg" href="{{url('/request-for-car?reserve=true')}}">预约车</a>
        </div>
    </div>
@endsection