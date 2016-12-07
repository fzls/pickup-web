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
                        <th>__________送出的礼物__________</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="ph in history_as_passenger">
                        <td>@{{ ph.created_at }}</td>
                        <td>@{{ ph.start_name }}</td>
                        <td>@{{ ph.end_name }}</td>
                        <td>@{{ ph.distance }}</td>
                        <td>@{{ compute_total(ph) }}</td>
                        <td>@{{ passenger_s_rating(ph) }}</td>
                        <td>@{{ passenger_s_review(ph) }}</td>
                        <td>
                            <p v-for="gift in gifts(ph)">
                                @{{ gift.name }} x @{{ gift.amount }}
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <nav>
                    <ul class="pager">
                        <li class="disabled"><a href="#">共@{{ passenger_pagination.total }}条记录</a></li>
                        <li :class="{ disabled : passenger_pagination.current_page === 1}"><a @click.prevent="get_prev_page_of_passenger_history" href="#">Previous</a>
                        </li>
                        <li :class="{ disabled : passenger_pagination.current_page === passenger_pagination.last_page}"><a
                                    @click.prevent="get_next_page_of_passenger_history" href="#">Next</a></li>
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
                        <li :class="{ disabled : driver_pagination.current_page === 1}"><a @click.prevent="get_prev_page_of_driver_history"
                                                                                           href="#">Previous</a></li>
                        <li :class="{ disabled : driver_pagination.current_page === driver_pagination.last_page}"><a
                                    @click.prevent="get_next_page_of_driver_history" href="#">Next</a></li>
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
            /*获取用户的历史行程（作为乘客）*/
            getHistoryAsPassenger(page = 1, per_page = 5){
                let vue = this;
                axios.get(constructPaginationUrl(API_HISTORY, page, per_page)).then(function (res) {
                    vue.history_as_passenger = res.data.data;
                    vue.passenger_pagination = res.data.pagination;
                });
            },

            /*获取用户的历史行程（作为司机）*/
            getHistoryAsDriver(page = 1, per_page = 5){
                let vue = this;
                axios.get(constructPaginationUrl(API_DRIVE_HISTORY, page, per_page)).then(function (res) {
                    vue.history_as_driver = res.data.data;
                    vue.driver_pagination = res.data.pagination;
                });
            },

            /*获取历史行程（乘客）的上一页数据*/
            get_prev_page_of_passenger_history(){
                /*如果是第一页，则直接返回*/
                if (this.passenger_pagination.current_page === 1) {
                    return
                }

                /*获取前一页的数据*/
                this.getHistoryAsPassenger(this.passenger_pagination.current_page - 1);
            },

            /*获取历史行程（乘客）的下一页数据*/
            get_next_page_of_passenger_history(){
                /*如果是最后一页，则直接返回*/
                if (this.passenger_pagination.current_page === this.passenger_pagination.last_page) {
                    return
                }

                /*获取后一页的数据*/
                this.getHistoryAsPassenger(this.passenger_pagination.current_page + 1);
            },

            /*获取历史行程（司机）的上一页数据*/
            get_prev_page_of_driver_history(){
                /*如果是第一页，则直接返回*/
                if (this.driver_pagination.current_page === 1) {
                    return
                }

                /*获取前一页的数据*/
                this.getHistoryAsDriver(this.driver_pagination.current_page - 1);
            },

            /*获取历史行程（司机）的下一页数据*/
            get_next_page_of_driver_history(){
                /*如果是最后一页，则直接返回*/
                if (this.driver_pagination.current_page === this.driver_pagination.last_page) {
                    return
                }

                /*获取后一页的数据*/
                this.getHistoryAsDriver(this.driver_pagination.current_page + 1);
            },

            /*计算该历史行程的总金额（基础金额 + 礼物金额 + 惩罚金（因延迟付款而造成的））*/
            compute_total(history){
                return parseFloat(history.base_amount) + parseFloat(history.gift_amount) + parseFloat(history.penalty_amount);
            },

            /*司机收到的评分*/
            driver_s_rating(history){
                let review = _.find(history.reviews, {reviewee_id: history.driver_id});
                return review ? review.rating : '';
            },

            /*司机收到的评价*/
            driver_s_review(history){
                let review = _.find(history.reviews, {reviewee_id: history.driver_id});
                return review ? review.comment : '';
            },

            /*乘客收到的评分*/
            passenger_s_rating(history){
                let review = _.find(history.reviews, {reviewee_id: history.passenger_id});
                return review ? review.rating : '';
            },

            /*乘客收到的评价*/
            passenger_s_review(history){
                let review = _.find(history.reviews, {reviewee_id: history.passenger_id});
                return review ? review.comment : '';
            },

            /*获取该行程对应的礼物信息*/
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