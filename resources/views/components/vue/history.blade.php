<script type="text/x-template" id="template-history">
    {{--历史行程内容--}}
    <div>
        <h2><i class="fa fa-bicycle" aria-hidden="true"></i>&nbsp; <strong>历史行程</strong></h2>
        <hr>
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a href="#history-passenger" data-toggle="tab">乘客</a></li>
            <li><a href="#history-driver" data-toggle="tab">车主</a></li>
        </ul>

        <hr>

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
                        <th>评分</th>
                        <th>评价详情</th>
                        <th>__________收到的礼物__________</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="ph in history_as_passenger">
                        <td>@{{ ph.created_at }}</td>
                        <td>@{{ ph.start_name }}</td>
                        <td>@{{ ph.end_name }}</td>
                        <td>@{{ ph.distance }}</td>
                        <td>@{{ compute_total(ph) }}</td>
                        <td>@{{ passenger_s_rating(dh) }}</td>
                        <td>@{{ passenger_s_review(dh) }}</td>
                        <td>
                            <p v-for="gift in gifts(dh)">
                                @{{ gift.name }} x @{{ gift.amount }}
                            </p>
                        </td>
                    </tr>

                    {{--TODO: 填充实际数据--}}
                    <tr>
                        <td>2016.11.1</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>TODO</td>
                        <td>TODO</td>
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
                        <th>评分</th>
                        <th>评价详情</th>
                        <th>__________收到的礼物__________</th>
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
                        <td>@{{ driver_s_rating(dh) }}</td>
                        <td>@{{ driver_s_review(dh) }}</td>
                        <td>
                            <p v-for="gift in gifts(dh)">
                                @{{ gift.name }} x @{{ gift.amount }}
                            </p>
                        </td>
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
            },
            driver_s_rating(history){
                let review = _.find(history.reviews, {reviewee_id: history.driver_id});
                return review.rating || '';
            },
            driver_s_review(history){
                let review = _.find(history.reviews, {reviewee_id: history.driver_id});
                return review.comment || '';
            },
            passenger_s_rating(history){
                let review = _.find(history.reviews, {reviewee_id: history.passenger_id});
                return review.rating || '';
            },
            passenger_s_review(history){
                let review = _.find(history.reviews, {reviewee_id: history.passenger_id});
                return review.comment || '';
            },
            gifts(history){
                return _.map(history.gift_bundles, function (gift_bundle) {
                    return {
                        name  : gift_bundle.gift.name,
                        pic   : gift_bundle.gift.pic,
                        amount: gift_bundle.amount
                    };
                });
            }
        }
    })
</script>