<script type="text/x-template" id="template-history-ing">
    @include('components.vue.templates.history-ing')
</script>

@include('components.blade.home.baidu-map-js')

<script>
    /*定义一些对话框的消息内容*/
    let cancel_by_passenger_self_message = $(`
<div class="form-horizontal">
    <h5>司机已接单，此时取消叫车会收取您一定的手续费！</h5>

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

    Vue.component('pickup-history-ing', {
        /*TODO:*/
        template: '#template-history-ing',
        data(){
            return {}
        },
        mounted(){
            init_map("baidu_map");
            this.cancel();
        },
        methods : {
            cancel(){
                BootstrapDialog.show({
                    title  : '取消叫车',
                    message: cancel_by_passenger_self_message
                })
            }
        }
    })
</script>