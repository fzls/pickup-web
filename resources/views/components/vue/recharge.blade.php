<script type="text/x-template" id="template-recharge">
    <div class="col-md-offset-1 col-md-10">
        {{--<div class="row">--}}
        {{--<form class="col-md-offset-3 col-md-6 form-horizontal">--}}
        {{--<div class="form-group">--}}
        {{--<label for="alipay_account" class="control-label col-md-4">支付宝账号</label>--}}
        {{--<div class="col-md-8">--}}
        {{--<input v-model="alipay_account" type="text" class="form-control" id="alipay_account" placeholder="请输入您的支付宝账户">--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--<label for="amount" class="control-label col-md-4">充值金额</label>--}}
        {{--<div class="col-md-8">--}}
        {{--<input v-model="amount" type="number" class="form-control" id="amount" placeholder="请输入您的充值金额">--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--<div class="col-md-offset-3 col-md-6">--}}
        {{--<button class="btn btn-success">　　　前往充值　　　</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--<div>--}}

        {{--</div>--}}
        {{--</div>--}}

        {{--由于支付接口需要商家认证，较麻烦，决定直接使用二维码进行--}}
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('/img/pay_by_alipay.jpg')}}" alt="进行充值" class="img-responsive img-rounded">
            </div>

            <div class="col-md-8">
                <h1>账户充值</h1>
                <hr>
                <h4>向我们的支付宝账号中转账，并注明你的用户名，我们将在一个工作日内进行充值处理，并通知您</h4>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-recharge', {
        template: '#template-recharge',
        data(){
            return {
            }
        },
        mounted(){

        },
        methods : {}
    })
</script>