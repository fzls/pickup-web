<script type="text/x-template" id="template-history-ing">
    @include('components.vue.templates.history-ing')
</script>

@include('components.blade.home.baidu-map-js')


<script>
    /*定义一些对话框的消息内容*/
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



    Vue.component('pickup-history-ing', {
        template: '#template-history-ing',
        data(){
            return {
                current_status: '行程结束',
                previous_status: [],
                other_user_id : '',
                self_id       : '',
                cnt           : 0,
                finished: false,
                current_history_id : '',
                user: {},
                give_gift: false
            }
        },
        mounted(){
            vue_history_ing = this;
            init_map("baidu_map");
            this.other_user_id = JSON.parse(window.localStorage.getItem('other_user_id'));
            this.self_id       = util_get_userinfo_from_localstorage().id;
            this.current_history_id = JSON.parse(window.localStorage.getItem('current_history_id'));
            this.user = util_get_userinfo_from_localstorage();
            this.current_status = JSON.parse(window.localStorage.getItem('current_status'));

            /*为另一方添加位置图标*/
            this.addMarkers();
            /*获取另外一方的地址，并更新地图上的位置*/
            this.updatePositions();
            this.checkIfFinished();


        },
        methods : {
            change_status(status){
                /*备份*/
                this.previous_status.push(this.current_status);
                /*更新*/
                this.current_status = status;
            },

            back(){
                /*还原*/
                this.current_status = this.previous_status.pop();
            },

            checkIfFinished(){
                axios.get('/current-history').then(function(res){
                    console.log(res.data);
                    if(res.data.data === null){
                        /*如果当前行程已结束，则弹出支付界面*/
                        vue_history_ing.finish_history();
                    }else{
                        /*如果正在进行中，则过5秒钟后继续检查*/
                        console.log('sleep for 5 s to check again if finished');
                        window.setTimeout(vue_history_ing.checkIfFinished, 5000);
                    }
                })
            },
            updatePositions(){
                /*调用定位控件获取自己的最新位置, 并更新小红点的位置*/
                geolocationControl.location();
                let current_position = pickup_user_marker.getPosition();

                console.log('----------------------------------' + this.cnt++);

                /*向服务器发送自己的最新位置*/
                axios.post('/current_location', {
                    latitude : current_position.lat,
                    longitude: current_position.lng,
                }).then(function (res) {
                    console.log('update self');
                    console.log(res.data.data);
                });

                /*获取对方的最新位置, 并更新小红点的位置*/
                axios.get(`/users/${this.other_user_id}/current_location`).then(function (res) {
                    pickup_other_marker.setPosition(new BMap.Point(res.data.data.longitude, res.data.data.latitude));
                    console.log('other user location');
                    console.log(res.data.data);
                });

                /*调整视图可视范围*/
                let dis   = pickup_map.getDistance(pickup_user_marker.getPosition(), pickup_other_marker.getPosition());
                let scale = this.getScale(dis);
                pickup_map.setZoom(scale);

                /*设置定时器，从而实现每隔一段时间对位置信息进行更新*/
                /*TODO：取消注释下面这行*/
//                window.setTimeout(this.updatePositions, 2000);
            },

            /*计算当前距离下能够将双方都放在可视范围下的缩放级别, 最小缩放级别为19*/
            getScale(dis){
                if (dis < 1) {
                    dis = 1
                }

                return Math.min(26 - Math.ceil(Math.log2(dis)), 19);
            },

            addMarkers(){
                pickup_other_marker = new BMap.Marker(pickup_user_marker.getPosition());
                pickup_map.addOverlay(pickup_other_marker);
                pickup_other_marker.disableDragging();
                let other_label = new BMap.Label("对方", {offset: new BMap.Size(-5, 30)});
                pickup_other_marker.setLabel(other_label);

                /*为起点添加标注*/
                let me_label = new BMap.Label("您", {offset: new BMap.Size(-5, 30)});
                pickup_user_marker.setLabel(me_label);
                pickup_user_marker.disableDragging();
            },
            cancel_by_me(){
                this.change_status('取消叫车');
            },

            cancel(){
                /*TODO: later*/
            },

            cancel_by_driver(){
                BootstrapDialog.show({
                    title   : '系统通知',
                    message : cancel_by_driver_other_message,
                    closable: false
                })
            },
            finish_history(){
                this.change_status('行程结束');
            },

            payNow(){
                let vue = this;
                axios.post('/transfer',{
                    to: this.other_user_id,
                    amount: 10 /*TODO:加入实际的金额*/
                }).then(function (res) {
                    let dialog = success_dialog('支付完成啦');
                    setTimeout(function () {
                        vue.change_status('评价');
                        dialog.close();
                    }, 1000);
                })
            },

            select_gift(){
                /*保存选择的礼物信息*/

                /*跳回到之前的支付界面*/
                this.give_gift = false;
            },

            review(){
                /*发送评论的请求*/

                /*TODO: 成功状态改用对话框实现*/
                this.change_status('评价成功')
            },

            redirect(path){
                window.location.replace(path);
            },


            tousu(){
                /*发送请求*/

                this.change_status('投诉成功')
            }
        }
    });
</script>