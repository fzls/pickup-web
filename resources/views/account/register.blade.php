@extends('layouts.app')

@section('content')
    <div class="container text-center" id="app">
        <form>
            <legend>注册应用信息</legend>
            <div class="form-group">
                <label for="school_id" class="col-sm-2 control-label">school</label>
                <div class="col-sm-10">
                    <select name="school_id" id="school_id" class="form-control" v-model="school_id">
                        <option v-for="school in schools" :value="school.id">@{{school.name}}</option>
                    </select>
                </div>
            </div>

            <button type="button" class="btn btn-primary" @click="register(school_id)">Submit</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        let app = new Vue({
            el     : '#app',
            data   : {
                school_id: 1,
                schools  : []
            },
            methods: {
                getSchoolList(){
                    let vue = this;
                    axios.get(API_SCHOOLS).then(function (res) {
                        vue.schools = res.data.data;
                    });
                },
                register(school_id){
                    /*TODO*/
                    axios.post(API_USERS, {
                        school_id: school_id
                    }).then(function (res) {
                        success_dialog(res.data);
                    });
                }
            },
            mounted(){
                this.getSchoolList();
            },
            computed(){
            }
        });
    </script>
@endsection