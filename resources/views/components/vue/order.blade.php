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
                            <tr>
                                <td>2016.11.28 12:24</td>
                                <td>3.8km 25min</td>
                                <td>待支付</td>
                                <td>已完成</td>
                                <td><a href="#">前往支付</a></td>
                            </tr>
                            <tr>
                                <td>2016.11.28 12:24</td>
                                <td>3.8km 25min</td>
                                <td>已支付</td>
                                <td>已完成</td>
                                <td><a href="#">详情</a></td>
                            </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pager">
                                <li class="disabled"><a href="#">共1111条记录</a></li>
                                <li><a href="#">Previous</a></li>
                                <li><a href="#">Next</a></li>
                                <li class="disabled"><a href="#">第1/112页</a></li>
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
                            <tr>
                                <td>2016.11.28 12:24</td>
                                <td>3.8km 25min</td>
                                <td>待支付</td>
                                <td>已完成</td>
                                <td><a href="#">催单？？？</a></td>
                            </tr>
                            <tr>
                                <td>2016.11.28 12:24</td>
                                <td>3.8km 25min</td>
                                <td>已支付</td>
                                <td>已完成</td>
                                <td><a href="#">详情</a></td>
                            </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pager">
                                <li class="disabled"><a href="#">共2222条记录</a></li>
                                <li><a href="#">Previous</a></li>
                                <li><a href="#">Next</a></li>
                                <li class="disabled"><a href="#">第2/555页</a></li>
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
        /*TODO:*/
        template: '#template-order',
        data(){
            return {}
        },
        mounted(){
            $("#sidebar-order").addClass('active');
        },
        methods : {}
    })
</script>