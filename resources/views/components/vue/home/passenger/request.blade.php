<script type="text/x-template" id="template-request">
@include('components.vue.templates.passenger.request')
</script>

@include('components.blade.home.baidu-map-js')

<script>
    Vue.component('pickup-request', {
        /*TODO:*/
        template: '#template-request',
        data(){
            return {}
        },
        mounted(){
            init_map('baidu_map');
            $('#reservation_time').datetimepicker({
                defaultDate: moment()
            });
//            this.noDriverAvailable();
        },
        methods : {
            submitAndWait(){
                /*向服务器发送请求并建立websocket*/

                /*显示进度*/
                BootstrapDialog.show({
                    title  : '等待接单',
                    message: '系统正在为您叫车，请稍等......',
                    type   : BootstrapDialog.TYPE_INFO,
                    buttons: [{
                        label : '取消',
                        action: function (dialog) {
                            BootstrapDialog.confirm('确认取消叫车?', function (result) {
                                if (result) {
                                    /*发送取消请求*/

                                    /*返回用户提示*/
                                    dialog.close();
                                }
                            });

                        }
                    }]
                });
            },
            noDriverAvailable(){
                BootstrapDialog.show({
                    title  : '系统提示',
                    message: '对不起，暂时没有司机抢单',
                    type   : BootstrapDialog.TYPE_WARNING,
                    buttons: [
                        {
                            label : '继续等待',
                            action: function (dialog) {

                                dialog.close();
                            }
                        },
                        {
                            label : '返回',
                            action: function (dialog) {
                                dialog.close();
                            }
                        }
                    ]
                });
            }
        }
    })
</script>