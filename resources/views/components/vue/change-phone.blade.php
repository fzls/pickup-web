<script type="text/x-template" id="template-change-phone">
    <div>
        <h2>更改绑定手机</h2>
        <hr>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h3>请输入您绑定手机18868111110收到的验证码</h3>
                <hr>
                <form>
                    <div class="form-group row">
                        <label for="phone" class="col-md-2 control-label">新绑定手机号</label>
                        <div class="col-md-8">
                            <input type="tel" pattern="/1[34578]\d{9}/" class="form-control" id="phone" placeholder="请输入新的手机号">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="verification_code" class="col-md-2 control-label">验证码</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="verification_code" placeholder="请输入验证码">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-info" @click="send_code" :disabled="resend_time>0">@{{ resend_time>0?`(${resend_time}s后)`:"" }}重新发送</button>
                        </div>
                    </div>

                    <hr>

                    <div class="text-center form-group">
                        <button class="btn btn-success">　　　　确认　　　　</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-change-phone', {
        /*TODO:*/
        template: '#template-change-phone',
        data(){
            return {
                resend_time: 0
            }
        },
        mounted(){

        },
        methods : {
            send_code(){
                /*如果距离上次发送验证码的时间太短，则直接返回*/
                if (this.resend_time > 0) {
                    return;
                }
                /*向服务器发出发送验证码的请求*/

                /*设定重新发送的时间*/
                this.resend_time = 60;
                this.count_down();
            },
            count_down(){
                if (this.resend_time > 0) {
                    this.resend_time -= 1;
                    window.setTimeout(this.count_down, 1000);
                }
            }
        }
    })
</script>