<script type="text/x-template" id="template-recharge">
    <div class="col-md-offset-1 col-md-10">
        <h1>账户充值</h1>
        <hr>
        <div class="row">
            <form class="col-md-offset-3 col-md-6 form-horizontal">
                <div class="form-group">
                    <label for="alipay_account" class="control-label col-md-4">支付宝账号</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="alipay_account" placeholder="请输入您的支付宝账户">
                    </div>
                </div>

                <div class="form-group">
                    <label for="amount" class="control-label col-md-4">充值金额</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="amount" placeholder="请输入您的充值金额">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                        <button class="btn btn-success">　　　前往充值　　　</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-recharge', {
        /*TODO:*/
        template: '#template-recharge',
        data(){
            return {}
        },
        mounted(){

        },
        methods : {}
    })
</script>