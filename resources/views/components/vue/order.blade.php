<script type="text/x-template" id="template-order">
    <div>
        <div class="row">
            @include('components.blade.user-center.sidebar');

            {{--主体内容--}}
            <div class="col-md-7">
                <h2><i class="fa fa-motorcycle"></i> 订单管理</h2>
                <hr>

                <!-- TAB NAVIGATION -->
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a href="#order-passenger" data-toggle="tab">乘客</a></li>
                    <li><a href="#order-driver" data-toggle="tab">车主</a></li>
                </ul>

                <hr>

                <div class="row">
                    <div class="form-group col-md-3">
                        <select class="form-control">
                            <option value="all" selected>所有订单</option>
                            <option value="paid">已支付</option>
                            <option value="unpaid">待支付</option>
                        </select>
                    </div>
                </div>

                <!-- TAB CONTENT -->
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="order-passenger">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>日期</th>
                                <th>行程</th>
                                <th>订单状况</th>
                                <th>行程完成状况</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--TODO: 填充实际数据--}}
                            <tr v-for="payment in payments">
                                <td>@{{ payment.created_at }}</td>
                                <td>@{{ toKm(payment.distance) }}km @{{ toMin(payment.elapsed_time) }} min</td>
                                <td>@{{ payment.paid_at? "已支付": "待支付" }}</td>
                                <td>@{{ payment.finished_at?"已完成":"未完成" }}</td>

                                <td v-if="payment.paid_at">
                                    <a href="#">详情</a>
                                </td>
                                <td v-else>
                                    <a href="#">前往支付</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pager">
                                <li class="disabled"><a href="#">共@{{ payments_pagination.total }}条记录</a></li>
                                <li :class="{ disabled : payments_pagination.current_page === 1}"><a @click.prevent="get_prev_page_of_payment_history"
                                                                                                     href="#">Previous</a>
                                </li>
                                <li :class="{ disabled : payments_pagination.current_page === payments_pagination.last_page}"><a
                                            @click.prevent="get_next_page_of_payment_history" href="#">Next</a></li>
                                <li class="disabled"><a href="#">第@{{ payments_pagination.current_page }}/@{{ payments_pagination.last_page }}页</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane fade" id="order-driver">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>日期</th>
                                <th>行程</th>
                                <th>订单状况</th>
                                <th>行程完成状况</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--TODO: 填充实际数据--}}
                            <tr v-for="revenue in revenues">
                                <td>@{{ revenue.created_at }}</td>
                                <td>@{{ toKm(revenue.distance) }}km @{{ toMin(revenue.elapsed_time) }} min</td>
                                <td>@{{ revenue.paid_at? "已支付": "待支付" }}</td>
                                <td>@{{ revenue.finished_at?"已完成":"未完成" }}</td>

                                <td v-if="revenue.paid_at">
                                    <a href="#">详情</a>
                                </td>
                                <td v-else>
                                    <a href="#">催单</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pager">
                                <li class="disabled"><a href="#">共@{{ revenues_pagination.total }}条记录</a></li>
                                <li :class="{ disabled : revenues_pagination.current_page === 1}"><a @click.prevent="get_prev_page_of_revenue_history"
                                                                                                     href="#">Previous</a>
                                </li>
                                <li :class="{ disabled : revenues_pagination.current_page === revenues_pagination.last_page}"><a
                                            @click.prevent="get_next_page_of_revenue_history" href="#">Next</a></li>
                                <li class="disabled"><a href="#">第@{{ revenues_pagination.current_page }}/@{{ revenues_pagination.last_page }}页</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-order', {
        template: '#template-order',
        data(){
            return {
                payments           : [],
                payments_pagination: {},
                revenues           : [],
                revenues_pagination: {}
            }
        },
        mounted(){
            $("#sidebar-order").addClass('active');
            this.getPayments();
            this.getRevenues();
        },
        methods : {
            getPayments(page = 1, per_page = 5){
                let vue = this;
                axios.get(constructPaginationUrl(API_ORDER_PAYMENTS, page, per_page)).then(function (res) {
                    vue.payments            = res.data.data;
                    vue.payments_pagination = res.data.pagination;
                });
            },

            getRevenues(page = 1, per_page = 5){
                let vue = this;
                axios.get(constructPaginationUrl(API_ORDER_REVENUES, page, per_page)).then(function (res) {
                    vue.revenues            = res.data.data;
                    vue.revenues_pagination = res.data.pagination;
                });
            },

            get_prev_page_of_payment_history(){
                /*如果是第一页，则直接返回*/
                if (this.payments_pagination.current_page === 1) {
                    return
                }

                /*获取前一页的数据*/
                this.getPayments(this.payments_pagination.current_page - 1);
            },

            get_next_page_of_payment_history(){
                /*如果是最后一页，则直接返回*/
                if (this.payments_pagination.current_page === this.payments_pagination.last_page) {
                    return
                }

                /*获取后一页的数据*/
                this.getPayments(this.payments_pagination.current_page + 1);
            },

            get_prev_page_of_revenue_history(){
                /*如果是第一页，则直接返回*/
                if (this.revenues_pagination.current_page === 1) {
                    return
                }

                /*获取前一页的数据*/
                this.getRevenues(this.revenues_pagination.current_page - 1);
            },

            get_next_page_of_revenue_history(){
                /*如果是最后一页，则直接返回*/
                if (this.revenues_pagination.current_page === this.revenues_pagination.last_page) {
                    return
                }

                /*获取后一页的数据*/
                this.getRevenues(this.revenues_pagination.current_page + 1);
            },




            toKm(distance){
                return parseFloat(distance) / 1000;
            },

            toMin(time){
                return parseInt(parseInt(time) / 60 * 100) / 100;
            }
        }
    })
</script>