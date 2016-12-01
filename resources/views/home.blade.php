@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="test">
                    @{{ message }}
                    <h1>count: @{{ counter }}</h1>
                    <div>
                        <button class="btn btn-success" @click="inc">Add</button>
                    </div>
                    <input class="form-control" type="text" v-model="counter">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        new Vue({
            el: '#test',
            data: {
                message: 'Hello laravel 12312 - - - -',
                counter: 0
            },
            methods:{
                inc(){
                    this.counter++;
                }
            },
            mounted(){
                let vue = this;
                 axios.get("{{url('test')}}").then(function (response) {
                    console.log('test'+response.data);
                    vue.counter = response.data;
                }).catch(function (error) {
                 });
            }
        });
    </script>
@endsection
