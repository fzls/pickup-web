<script type="text/x-template" id="template-request-list">
    <div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>上车地点</th>
                <th>目的地</th>
                <th>活动类型</th>
                <th>车辆类型</th>
                <th>上车时间</th>
                <th>抢单</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="(req, index) in requests">
                <td>
                    @{{ req.start_name }}
                    <div class="help-block small">
                        (lat:@{{ req.start_latitude }} , lng:@{{ req.start_longitude }})
                    </div>
                </td>
                <td>
                    @{{ req.end_name }}
                    <div class="help-block small">
                        (lat:@{{ req.end_latitude }} , lng:@{{ req.end_longitude }})
                    </div>
                </td>
                <td>@{{ req.activity }}</td>
                <td>@{{ req.vehicle.name }}</td>
                <td>@{{ req.reserved_at || '现在' }}</td>
                <td>
                    <button class="btn btn-info" @click="jiedan(index)">接单</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</script>

<script>
    Vue.component('pickup-request-list', {
        template: '#template-request-list',
        data(){
            return {
                requests: [],
                user    : {},
                done  : false
            }
        },
        mounted(){
            this.getRequests();
            this.user = util_get_userinfo_from_localstorage();
        },
        methods : {
            getRequests(){
                let vue = this;
                axios.get('/requests').then(function (res) {
                    vue.requests = res.data.data;

                    /*假如司机没有接单，则每隔1.5s重新对订单列表进行请求，从而获得最新的列表*/
                    if(vue.done === false){
                        window.setTimeout(vue.getRequests, 1500);
                    }
                })
            },
            jiedan(index){
                this.done = true;
                let req = this.requests[index];
                axios.put('/requests', {
                    request_id: req.id
                }).then(function (res) {
                    let history = res.data.data;
                    /*将行程信息记录到本地存储中*/
                    window.localStorage.setItem('current_history_id', JSON.stringify(history.id));
                    window.localStorage.setItem('other_user_id', JSON.stringify(history.passenger_id));
                    window.localStorage.setItem('current_status', JSON.stringify('正在出发中'));
                    /*发出提醒的对话框并跳转到行程中的界面*/
                    success_dialog(res.data.meta.message);
                    window.setTimeout(function () {
                        window.location.replace('/history-ing');
                    });
                })
            }
        }
    })
</script>