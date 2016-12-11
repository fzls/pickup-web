@extends('layouts.home')

@section('left')
    @include('components.blade.home.contact-panel')
@endsection

@section('mid')
    @include('components.blade.home.baidu-map')
@endsection

@section('right')
    <div>
        <div v-if="current_status === '等车'">
            <h4>等待司机前来</h4>

            <hr>

            <button class="btn btn-danger" @click="cancel_by_me">取消叫车</button>
        </div>
        <div v-else-if="current_status === '行程中'">
            行程中
        </div>
        <div v-else-if="current_status === '行程结束'">
            行程结束
        </div>
    </div>
@endsection