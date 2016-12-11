<script type="text/x-template" id="template-request">
@include('components.vue.templates.passenger.request')
</script>

@include('components.blade.home.baidu-map-js')

<script>
    Vue.component('pickup-request', {
        /*TODO: 完成叫车一系列的逻辑处理*/
        template: '#template-request',
        data(){
            return {
                user            : {},
                start_name      : '',
                start_latitude  : '',
                start_longitude : '',
                end_name        : '',
                end_latitude    : '',
                end_longitude   : '',
                vehicle_type    : 3,
                activity_type   : '',
                reservation_time: '',
            }
        },
        mounted(){
            init_map('baidu_map');
            this.addDestinationMarker();
            $('#reservation_time').datetimepicker({
                defaultDate: moment()
            });
//            this.noDriverAvailable();
            this.user = util_get_userinfo_from_localstorage();
        },
        methods : {
            collectInfo(){
                let start = pickup_user_marker.getPosition();
                let end   = pickup_destination_marker.getPosition();

                let vue   = this;
                let myGeo = new BMap.Geocoder();
                myGeo.getLocation(start, function (result) {
                    if (result) {
                        vue.start_name = result.address;
                    }
                });

                this.start_latitude  = start.lat;
                this.start_longitude = start.lng;


                myGeo.getLocation(end, function (result) {
                    if (result) {
                        vue.end_name = result.address;
                    }
                });
                this.end_latitude  = end.lat;
                this.end_longitude = end.lng;

                this.reservation_time = $("#reservation_time").val();
            },


            submitAndWait(){
                this.collectInfo();
                /*向服务器发送请求*/
                axios.post('/requests', {
                    start_name           : this.start_name,
                    start_latitude       : this.start_latitude,
                    start_longitude      : this.start_longitude,
                    end_name             : this.end_name,
                    end_latitude         : this.end_latitude,
                    end_longitude        : this.end_longitude,
                    expected_vehicle_type: this.vehicle_type,
                    activity             : this.activity_type || '未注明',
                    phone_number         : this.user.phone,
                    estimated_cost       : this.getEstimatedCost()
                }).then(function (res) {
//                    info_dialog(res.data.meta.message);
                    /*显示进度*/
                    let canceled = false;
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
                                        axios.delete('/requests').then(function (res) {
                                            success_dialog(res.data.meta.message);
                                        });
                                        dialog.close();
                                        canceled = true;
                                    }
                                });
                            }
                        }]
                    });

                    function checkIfBeingAccepted(interval) {
                        if (canceled) {
                            return
                        }

                        axios.get('/request-status').then(function (res) {
                            if (res.data.meta.message === 'accepted') {
                                // TODO：获取对方的id，并存到本地，用于后续在地图上显示对方的位置
                                window.localStorage.setItem('current_history', JSON.stringify(res.data.data));
                                window.localStorage.setItem('other_user_id', JSON.stringify(res.data.data.driver_id));
                                window.location.replace('{{url('/history-ing')}}');
                            } else {
                                console.log('not yet');
                                console.log(interval);
                                if (interval < 5000) {
                                    interval += 500;
                                }
                                setTimeout(function () {
                                    checkIfBeingAccepted(interval);
                                }, interval);
                            }
                        })
                    }

                    checkIfBeingAccepted(1000);

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
            },

            getEstimatedCost(){
                /*获取起始点到终点的距离*/
                let start = pickup_user_marker.getPosition();
                let end   = pickup_destination_marker.getPosition();
                let vue   = this;

                /*乘以单位距离的价格，获得预计费用*/
                let dis = pickup_map.getDistance(start, end);

//                console.log('distance is '+dis);
//                console.log('zoom is '+pickup_map.getZoom());
//                geolocationControl.location();
                /* m */
                return dis * 0.001;
                /*每km一元*/
            },

            addDestinationMarker(){
                pickup_destination_marker = new BMap.Marker(pickup_user_marker.getPosition());
                pickup_map.addOverlay(pickup_destination_marker);
                pickup_destination_marker.enableDragging();
                let des_label = new BMap.Label("终点", {offset: new BMap.Size(-5, 30)});
                pickup_destination_marker.setLabel(des_label);

                /*为起点添加标注*/
                let start_label = new BMap.Label("起点", {offset: new BMap.Size(-5, 30)});
                pickup_user_marker.setLabel(start_label);

            }
        }
    })
</script>