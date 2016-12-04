<script type="text/x-template" id="template-withdraw">
    <div class="col-md-offset-1 col-md-10">
        <h1>账户提现</h1>
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
                    <label for="amount" class="control-label col-md-4">提现金额</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="amount" placeholder="请输入您的提现金额">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                        <button type="button" class="btn btn-success" @click="withdraw">　　　立即提现　　　</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-withdraw', {
        /*TODO:*/
        template: '#template-withdraw',
        data(){
            return {}
        },
        mounted(){

        },
        methods : {
            withdraw(){
                /*获取用户信息*/

                /*获取提现信息*/

                /*向服务器发送请求*/

                /*根据结果返回提示*/
                success_dialog("主人様的提现请求已经在处理队列中了呢，三到五个工作日内将会转账到主人様的支付宝里面哦", "来自小P的友情提示");
            }
        }
    })
</script>