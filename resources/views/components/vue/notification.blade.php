<script type="text/x-template" id="template-notification">
    <div>
        <div class="row">
            @include('components.blade.user-center.sidebar');

            {{--主体内容--}}
            <div class="col-md-7">
                <h2><i class="fa fa-bell"></i> 系统消息</h2>

                <hr>

                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <select class="form-control">
                                <option value="all">所有消息</option>
                                <option value="unread" selected>未读</option>
                                <option value="read">已读</option>
                            </select>
                        </div>
                    </div>
                </div>


                {{--消息便利贴-开始--}}
                <div class="container-fluid">
                    {{--第一行开始--}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">账户信息</h3>
                                </div>
                                <div class="panel-body">
                                    您的提现申请已经受理成功，资金已到账，请查收
                                </div>
                                <div class="panel-footer">
                                    2016.11.28 12:23
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">账户信息</h3>
                                </div>
                                <div class="panel-body">
                                    您的提现申请已经受理成功，资金已到账，请查收
                                </div>
                                <div class="panel-footer">
                                    2016.11.28 12:23
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">账户信息</h3>
                                </div>
                                <div class="panel-body">
                                    您的提现申请已经受理成功，资金已到账，请查收
                                </div>
                                <div class="panel-footer">
                                    2016.11.28 12:23
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--第一行结束--}}


                    {{--第二行开始--}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">账户信息</h3>
                                </div>
                                <div class="panel-body">
                                    您的提现申请已经受理成功，资金已到账，请查收
                                </div>
                                <div class="panel-footer">
                                    2016.11.28 12:23
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">账户信息</h3>
                                </div>
                                <div class="panel-body">
                                    您的提现申请已经受理成功，资金已到账，请查收
                                </div>
                                <div class="panel-footer">
                                    2016.11.28 12:23
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">账户信息</h3>
                                </div>
                                <div class="panel-body">
                                    您的提现申请已经受理成功，资金已到账，请查收
                                </div>
                                <div class="panel-footer">
                                    2016.11.28 12:23
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--第二行结束--}}
                </div>
                {{--消息便利贴-结束--}}

                <div class="container-fluid text-right">
                    <button class="btn btn-success">　　更多　　</button>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-notification', {
        /*TODO:*/
        template: '#template-notification',
        data(){
            return {}
        },
        mounted(){
            $("#sidebar-notification").addClass('active');
        },
        methods : {}
    })
</script>