@extends('layouts.home')

@section('left')
    <h3><i class="fa fa-arrow-left"></i>　返回</h3>
@endsection

@section('mid')
    @include('components.blade.home.baidu-map')
@endsection

@section('right')
    <form>
        <div class="form-group">
            <label for="start">上车地点</label>
            <div>
                <input type="text" class="form-control" id="start" placeholder="浙江大学青溪学园">
                <input type="hidden" id="start_latitude">
                <input type="hidden" id="start_longitude">
            </div>
        </div>
        <div class="form-group">
            <label for="end">目的地</label>
            <div>
                <input type="text" class="form-control" id="end" placeholder="XXXXXXXX">
                <input type="hidden" id="end_latitude">
                <input type="hidden" id="end_longitude">
            </div>
        </div>
        <div class="form-group">
            <label for="vehicle_type">车辆类型</label>
            <div>
                <select name="vehicle_type" id="vehicle_type" class="form-control">
                    <option value="any">任意类型</option>
                    <option value="bicycle">自行车</option>
                    <option value="motorcycle">电动车</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="activity_type">活动类型</label>
            <div>
                <input type="text" class="form-control" id="activity_type" placeholder="比如->看电影">
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