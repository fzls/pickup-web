@extends('layouts.home')

@section('left')
    <h3><a href="{{url('/passenger')}}"><i class="fa fa-arrow-left"></i>　返回</a></h3>
@endsection

@section('mid')
    @include('components.blade.home.baidu-map')
@endsection

@section('right')
    <form>
        {{--<div class="form-group">--}}
            {{--<label for="start">上车地点</label>--}}
            {{--<div>--}}
                {{--<input v-model="start_name" type="text" class="form-control" id="start" placeholder="浙江大学青溪学园">--}}
                {{--<input v-model="start_latitude" type="hidden" id="start_latitude">--}}
                {{--<input v-model="start_longitude" type="hidden" id="start_longitude">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="end">目的地</label>--}}
            {{--<div>--}}
                {{--<input v-model="end_name" type="text" class="form-control" id="end" placeholder="XXXXXXXX">--}}
                {{--<input v-model="end_latitude" type="hidden" id="end_latitude">--}}
                {{--<input v-model="end_longitude" type="hidden" id="end_longitude">--}}
            {{--</div>--}}
        {{--</div>--}}
        <h4>拖动选择起止点</h4>

        <hr>

        <div class="form-group">
            <label for="vehicle_type">车辆类型</label>
            <div>
                <select v-model="vehicle_type" name="vehicle_type" id="vehicle_type" class="form-control">
                    <option value="3">任意类型</option>
                    <option value="1">自行车</option>
                    <option value="2">电动车</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="activity_type">活动类型</label>
            <div>
                <input v-model="activity_type" type="text" class="form-control" id="activity_type" placeholder="比如->看电影">
            </div>
        </div>

        {{--仅选择预约时显示---上车时间--}}
        <div class="form-group">
            <label for="reservation_time">上车时间</label>
            <input type="text" id="reservation_time" class="form-control">
        </div>

        <button class="btn btn-info btn-block" @click.prevent="submitAndWait">确认叫车</button>
    </form>

@endsection