<script type="text/x-template" id="template-history-ing">
    @include('components.vue.templates.history-ing')
</script>

@include('components.blade.home.baidu-map-js')




<script>
    /*定义一些对话框的消息内容*/
    let cancel_by_passenger_self_message = $(`
<div class="container-fluid text-center">
    <h5>司机已接单，此时取消叫车会收取您一定的手续费！</h5>

    <div class="form-horizontal">
        <div class="form-group">
            <label for="reason" class="col-md-4">取消原因</label>
            <div class="col-md-8">
                <select name="reason" id="reason" class="form-control">
                    <option>司机长时间未到</option>
                    <option>司机不见了</option>
                    <option>司机XXXXXXX</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="other_reason" class="col-md-4">其他原因</label>
            <div class="col-md-8">
                <input type="text" id="other_reason" placeholder="请输入其他原因" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <button class="btn btn-info">返回</button>
        </div>
        <div class="col-md-offset-2 col-md-4">
            <button class="btn btn-info">仍要取消</button>
        </div>
    </div>
</div>
`);

    let cancel_by_driver_other_message = $(`
<div class="container-fluid text-center">
    <h5>对不起，您的订单已被司机取消</h5>
    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <button class="btn btn-info">重新预约</button>
        </div>
        <div class="col-md-offset-2 col-md-2">
            <button class="btn btn-info">返回</button>
        </div>
    </div>
</div>
`);

    let finish_history_message = $(`
<div class="container-fluid text-center">
    <h5>行程已结束</h5>

    <div class="list-group">
        <div class="list-group-item"><i class="fa fa-user"></i>　乘客名字</div>
        <div class="list-group-item"><i class="fa fa-clock-o"></i>　用时 02:34</div>
        <div class="list-group-item"><i class="fa fa-bicycle"></i>　出发地：test</div>
        <div class="list-group-item"><i class="fa fa-motorcycle"></i>　目的地：test</div>
        <div class="list-group-item"><i class="fa fa-bus"></i>　路程：2.1 km</div>
        <div class="list-group-item"><i class="fa fa-dollar"></i>　3.4 元</div>
        <div class="list-group-item"><i class="fa fa-gift"></i>　选择想赠送的礼物</div>
    </div>
    <h4>一共需支付 4.5 元</h4>
    <hr>

    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <button class="btn btn-info">立即支付</button>
        </div>

        <div class="col-md-offset-2 col-md-4">
            <button class="btn btn-info">稍后支付</button>
        </div>
    </div>
</div>
`);

    let select_gift_message = $(`
<div class="container-fluid text-center">
    <h5>选择您想要赠送的礼物</h5>

    <div class="list-group form-horizontal">
        <div class="list-group-item form-group">
            <label for="gift_1" class="col-md-6">礼物A 3元</label>
            <div class="col-md-6">
                <input type="number" id="gift_1" class="form-control">
            </div>
        </div>
        <div class="list-group-item form-group">
            <label for="gift_1" class="col-md-6">礼物A 3元</label>
            <div class="col-md-6">
                <input type="number" id="gift_1" class="form-control">
            </div>
        </div>
        <div class="list-group-item form-group">
            <label for="gift_1" class="col-md-6">礼物A 3元</label>
            <div class="col-md-6">
                <input type="number" id="gift_1" class="form-control">
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-info">确认</button>
        </div>
    </div>
</div>
`);

    let pay_message = $(`
<div class="container-fluid form-horizontal">
    <div class="col-md-offset-2 col-md-8">
        <div class="form-group">
            <label class="col-sm-6">账户余额</label>
            <div class="col-sm-6 input-group">
                <p class="form-control-static">20</p>
                <div class="input-group-addon">元</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-6">一共需支付</label>
            <div class="col-sm-6 input-group">
                <p class="form-control-static">4</p>
                <div class="input-group-addon">元</div>
            </div>
        </div>

        <div class="form-group">
            <label for="pay_password" class="col-md-6">支付密码</label>
            <div class="col-md-6">
                <input type="password" class="form-control" id="pay_password">
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-1 col-md-4">
                <button class="btn btn-info">确认支付</button>
            </div>

            <div class="col-md-offset-2 col-md-4">
                <button class="btn btn-info">账户充值</button>
            </div>
        </div>
    </div>
</div>
`);

    let not_enough_money_message = $(`
<div class="container-fluid text-center">
    <h4>账户余额不足，支付失败，请先充值</h4>

    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <button class="btn btn-info">立即充值</button>
        </div>
        <div class="col-md-offset-2 col-md-2">
            <button class="btn btn-info">稍后支付</button>
        </div>
    </div>
</div>
`);

    let wrong_pay_password_message = $(`
<div class="container-fluid text-center">
    <h4>支付密码错误</h4>

    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <button class="btn btn-info">重新输入</button>
        </div>
        <div class="col-md-offset-2 col-md-2">
            <button class="btn btn-info">忘记密码</button>
        </div>
    </div>
</div>
`);

    let pay_success_message = $(`
<div class="container-fluid text-center">
    <h4>支付成功</h4>

    <button class="btn btn-info btn-block">确认</button>
</div>
`);

    let rate_message = $(`
<div class="container-fluid text-center form-horizontal">
    <div class="form-group">
        <label for="rating" class="col-md-4">评分</label>
        <div class="col-md-8">
            <input type="number" id="rating" min="0" max="5" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="comment" class="col-md-4">评价</label>
        <div class="col-md-8">
            <input type="text" id="comment" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <button class="btn btn-info">提交评价</button>
        </div>
        <div class="col-md-offset-2 col-md-4">
            <button class="btn btn-info">我要投诉</button>
        </div>
    </div>
</div>
`);

    let rate_success_message = $(`
<div class="container-fluid text-center">
    <h4>评价成功</h4>

    <button class="btn btn-info">确认</button>
</div>
`);

    let tousu_message = $(`
<div class="container-fluid text-center">
    <div class="form-horizontal">
        <div class="form-group">
            <label for="reason" class="col-md-4">投诉原因</label>
            <div class="col-md-8">
                <select name="reason" id="reason" class="form-control">
                    <option>司机长时间未到</option>
                    <option>司机不见了</option>
                    <option>司机XXXXXXX</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="other_reason" class="col-md-4">其他原因</label>
            <div class="col-md-8">
                <input type="text" id="other_reason" placeholder="请输入其他原因" class="form-control">
            </div>
        </div>
    </div>

    <button class="btn btn-info btn-block">提交投诉</button>
</div>
`);

    let tousu_success_message = $(`
<div class="container-fluid text-center">
    <h4>已收到您的投诉，会尽快处理，请您耐心等待</h4>

    <button class="btn btn-info btn-block">确认</button>
</div>
`);

    Vue.component('pickup-history-ing', {
        /*TODO:*/
        template: '#template-history-ing',
        data(){
            return {}
        },
        mounted(){
            init_map("baidu_map");
            this.tousu_success();
        },
        methods : {
            cancel_by_driver(){
                BootstrapDialog.show({
                    title  : '取消叫车',
                    message: cancel_by_passenger_self_message
                })
            },
            cancel_by_driver(){
                BootstrapDialog.show({
                    title  : '系统通知',
                    message: cancel_by_driver_other_message
                })
            },
            finish_history(){
                BootstrapDialog.show({
                    title  : '系统通知',
                    message: finish_history_message
                })
            },
            select_gift(){
                BootstrapDialog.show({
                    title  : '赠送礼物',
                    message: select_gift_message
                })
            },
            pay(){
                BootstrapDialog.show({
                    title  : '支付',
                    message: pay_message
                })
            },
            not_enough_money(){
                BootstrapDialog.show({
                    title  : '余额不足',
                    message: not_enough_money_message
                })
            },
            wrong_password(){
                BootstrapDialog.show({
                    title  : '支付密码错误',
                    message: wrong_pay_password_message
                })
            },
            pay_success(){
                BootstrapDialog.show({
                    title  : '余额不足',
                    message: pay_success_message
                })
            },
            rate(){
                BootstrapDialog.show({
                    title  : '请您对司机进行评价',
                    message: rate_message
                })
            },
            rate_success(){
                BootstrapDialog.show({
                    title  : '系统提示',
                    message: rate_success_message
                })
            },
            tousu(){
                BootstrapDialog.show({
                    title  : '系统提示',
                    message: tousu_message
                })
            },
            tousu_success(){
                BootstrapDialog.show({
                    title  : '系统提示',
                    message: tousu_success_message
                })
            }
        }
    })
</script>