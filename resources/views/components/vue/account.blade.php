<script type="text/x-template" id="template-account">
    <div>
        <div class="row">
            @include('components.blade.user-center.sidebar');

            {{--主体内容--}}
            <div class="col-md-7">
                <h2><i class="fa fa-credit-card"></i> 账户概览</h2>
                <hr>

                {{--账户余额--}}
                <div class="row">
                    <div class="col-md-3">
                        <h3>账户余额</h3>
                    </div>

                    <div class="col-md-6">
                        <span style="font-size: 5em;">666.66</span>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-info btn-block">　　充值　　</button>
                        <button class="btn btn-info btn-block">　　提现　　</button>
                    </div>
                </div>

                <hr>

                {{--常用地址信息--}}
                <div class="row">
                    <div class="col-md-3">
                        <h3>我的礼物</h3>
                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/100x80"/>
                                    <div class="caption text-center">
                                        100个
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/100x80"/>
                                    <div class="caption text-center">
                                        100个
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/100x80"/>
                                    <div class="caption text-center">
                                        100个
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/100x80"/>
                                    <div class="caption text-center">
                                        100个
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <hr>

                {{--收支记录--}}
                <div class="row">
                    <div class="col-md-3">
                        <h3>收支记录</h3>
                    </div>

                    <div class="col-md-8">
                        <p>乘车消费累计：22.22 元</p>
                        <p>载客收入累计：66.66 元</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</script>

<script>
    /*设定当前侧边栏哪个为active*/
    window.setTimeout(function () {
        $("#sidebar-account").addClass('active');
    }, 1000);

    Vue.component('pickup-account', {
        /*TODO:*/
        template: '#template-account',
        data(){
            return {}
        },
        mounted(){

        },
        methods : {}
    })
</script>