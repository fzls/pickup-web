<script type="text/x-template" id="template-profile">
    <div>
        <div class="row">
            {{--侧边栏--}}
            <div class="col-md-3 col-md-offset-1">
                <div class="list-group">
                    <a href="#" class="list-group-item text-center active">
                        <i class="fa fa-github-alt" aria-hidden="true"></i> 信息资料
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <i class="fa fa-credit-card" aria-hidden="true"></i> 个人账户
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <i class="fa fa-motorcycle" aria-hidden="true"></i> 订单管理
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <i class="fa fa-bell" aria-hidden="true"></i> 系统通知
                    </a>
                </div>
            </div>

            {{--主体内容--}}
            <div class="col-md-7">
                <h2><i class="fa fa-github-alt"></i> 信息资料</h2>
                <hr>

                {{--用户信息--}}
                <div class="row">
                    <div class="col-md-3">
                        <h3>用户信息</h3>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>用户名：</td>
                                <td>毛太郎</td>
                            </tr>
                            <tr>
                                <td>邮箱账号：</td>
                                <td>3130101111@zju.edu.cn</td>
                            </tr>
                            <tr>
                                <td>绑定手机号：</td>
                                <td>18868111110</td>
                                <td><a class="btn btn-info pull-right" href="{{url('/change-phone')}}">　修改　</a></td>
                            </tr>
                            <tr>
                                <td>登陆密码：</td>
                                <td><i class="fa fa-user-secret"></i></td>
                                <td><a class="btn btn-info pull-right" href="{{url('/change-password')}}">　修改　</a></td>
                            </tr>
                            <tr>
                                <td>性别：</td>
                                <td><i class="fa fa-mars"></i> 帅哥</td>
                                {{--<td><i class="fa fa-venus"></i> 美女</td>--}}
                            </tr>
                            <tr>
                                <td>注册时间：</td>
                                <td>2015-11-29</td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{--常用地址信息--}}
                <div class="row">
                    <div class="col-md-3">
                        <h3>常用地址</h3>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>浙江大学紫金港校区----青溪一舍</td>
                                <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                <td><a href="#"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <tr>
                                <td>浙江大学紫金港校区----青溪一舍</td>
                                <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                <td><a href="#"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <tr>
                                <td>浙江大学紫金港校区----青溪一舍</td>
                                <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                <td><a href="#"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <tr>
                                <td>浙江大学紫金港校区----青溪一舍</td>
                                <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                <td><a href="#"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <tr>
                                <td>浙江大学紫金港校区----青溪一舍</td>
                                <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                <td><a href="#"><i class="fa fa-remove"></i></a></td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <button class="btn btn-info">添加地址</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-profile', {
        /*TODO:*/
        template: '#template-profile',
        data(){
            return {}
        },
        mounted(){

        },
        methods : {}
    })
</script>