<script type="text/x-template" id="template-history">
    {{--历史行程内容--}}
    <div>
        <span style="white-space: pre;"><i class="fa fa-bicycle" aria-hidden="true"></i>&nbsp; <strong>历史行程</strong></span>
        <hr>
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a href="#history-passenger" data-toggle="tab">乘客</a></li>
            <li><a href="#history-driver" data-toggle="tab">车主</a></li>
        </ul>
        <!-- TAB CONTENT -->
        <div class="tab-content">
            <div class="active tab-pane fade in" id="history-passenger">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>日期</th>
                        <th>出发地</th>
                        <th>目的地</th>
                        <th>路程</th>
                        <th>消费总额</th>
                        <th>文明程度</th>
                        <th>准时程度</th>
                        <th>评价详情</th>
                        <th>送出的礼物</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--TODO: 填充实际数据--}}
                    <tr>
                        <td>2016.11.1</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>TODO</td>
                        <td>TODO</td>
                        <td>TODO</td>
                        <td>TODO</td>
                    </tr>
                    <tr>
                        <td>2016.11.1</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>2016.11.1</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    </tbody>
                </table>
                <nav>
                    <ul class="pager">
                        <li class="disabled"><a href="#">共@{{ passenger_pagination.total }}条记录</a></li>
                        <li><a @click.prevent="get_prev_page_of_driver_history" href="#">Previous</a></li>
                        <li><a @click.prevent="get_next_page_of_driver_history" href="#">Next</a></li>
                        <li class="disabled"><a href="#">第@{{ passenger_pagination.current_page }}/@{{ passenger_pagination.last_page }}页</a></li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane fade" id="history-driver">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>日期</th>
                        <th>出发地</th>
                        <th>目的地</th>
                        <th>路程</th>
                        <th>收到金额</th>
                        <th>准时度</th>
                        <th>服务态度</th>
                        <th>车技水平</th>
                        <th>评价详情</th>
                        <th>收到的礼物</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--TODO: 填充实际数据--}}
                    <tr v-for="dh in history_as_driver">
                        <td>@{{ dh.created_at }}</td>
                        <td>@{{ dh.start_name }}</td>
                        <td>@{{ dh.end_name }}</td>
                        <td>@{{ dh.distance }}</td>
                        <td>@{{ compute_total(dh) }}</td>
                        <td>TODO</td>
                        <td>TODO</td>
                        <td>TODO</td>
                        <td>LATER</td>
                        <td>LATER</td>
                    </tr>
                    <tr>
                        <td>2016.11.1</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>2016.11.1</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>2016.11.1</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                    </tbody>
                </table>
                <nav>
                    <ul class="pager">
                        <li class="disabled"><a href="#">共@{{ driver_pagination.total }}条记录</a></li>
                        <li><a @click.prevent="get_prev_page_of_driver_history" href="#">Previous</a></li>
                        <li><a @click.prevent="get_next_page_of_driver_history" href="#">Next</a></li>
                        <li class="disabled"><a href="#">第@{{ driver_pagination.current_page }}/@{{ driver_pagination.last_page }}页</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-history', {
        template: '#template-history',
        data(){
            return {
                history_as_passenger: [],
                passenger_pagination: {},
                history_as_driver   : [],
                driver_pagination   : {},
            }
        },
        mounted(){
            this.getHistoryAsPassenger();
            this.getHistoryAsDriver();
        },
        methods : {
            /*TODO: here*/
            getHistoryAsPassenger(){
                let vue = this;
                axios.get(API_HISTORY).then(function (res) {
                    vue.history_as_passenger = res.data.data;
                    vue.passenger_pagination = res.data.pagination;
                });
            },
            getHistoryAsDriver(){
                let vue = this;
                axios.get(API_DRIVE_HISTORY).then(function (res) {
                    vue.history_as_driver = res.data.data;
                    vue.driver_pagination = res.data.pagination;
                });
            },
            get_prev_page_of_passenger_history(){
                /*TODO*/
            },
            get_next_page_of_passenger_history(){

            },
            get_prev_page_of_driver_history(){

            },
            get_next_page_of_driver_history(){

            },
            compute_total(history){
                return parseFloat(history.base_amount) + parseFloat(history.gift_amount) + parseFloat(history.penalty_amount);
            }
        }
    })
</script>