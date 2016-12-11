<div class="row">
    <hr>

    <div class="col-md-7">
        @include('components.blade.home.baidu-map')
    </div>

    <div class="col-md-5">
        @include('components.blade.home.contact-panel')

        {{--<hr>--}}

        <div class="container-fluid text-center">
            <div v-if="current_status === '等车'">
                <h4>等待司机前来</h4>

                <hr>

                <button class="btn btn-danger" @click="cancel_by_me">取消叫车</button>
            </div>


            <div v-if="current_status === '行程中'">
                正在行程中
            </div>


            <div v-if="current_status === '取消叫车'">
                <h5>司机已接单，此时取消叫车会收取您一定的手续费！</h5>

                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="reason" class="col-md-4">取消原因</label>
                        <div class="col-md-8">
                            <select v-model="reason" name="reason" id="reason" class="form-control">
                                <option>司机长时间未到</option>
                                <option>司机不见了</option>
                                <option>司机XXXXXXX</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="other_reason" class="col-md-4">其他原因</label>
                        <div class="col-md-8">
                            <input v-model="other_reason" type="text" id="other_reason" placeholder="请输入其他原因" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-4">
                        <button class="btn btn-info" @click="restore">返回</button>
                    </div>
                    <div class="col-md-offset-2 col-md-4">
                        <button class="btn btn-info" @click="cancel">仍要取消</button>
                    </div>
                </div>
            </div>

            <div v-if="current_status === '行程结束'">
                <h5>行程已结束</h5>

                <div class="list-group">
                    <div class="list-group-item"><i class="fa fa-user"></i>　@{{ user.username }}</div>
                    <div class="list-group-item"><i class="fa fa-clock-o"></i>　用时 02:34</div>
                    <div class="list-group-item"><i class="fa fa-bicycle"></i>　出发地：test</div>
                    <div class="list-group-item"><i class="fa fa-motorcycle"></i>　目的地：test</div>
                    <div class="list-group-item"><i class="fa fa-bus"></i>　路程：2.1 km</div>
                    <div class="list-group-item"><i class="fa fa-dollar"></i>　3.4 元</div>
                    <div class="list-group-item" @click.capture.stop="give_gift = true"><i class="fa fa-gift"></i>　选择想赠送的礼物</div>
                    <div class="list-group-item" v-show="give_gift">
                        <div class="form-horizontal">
                            <div class="list-group-item form-group">
                                <label for="gift_1" class="col-md-6">礼物A 3元</label>
                                <div class="col-md-6">
                                    <input type="number" id="gift_1" class="form-control">
                                </div>
                            </div>
                            <div class="list-group-item form-group">
                                <label for="gift_1" class="col-md-6">礼物A 3元</label>
                                <div class="col-md-6">
                                    <input type="number" id="gift_1" class="form-control">
                                </div>
                            </div>
                            <div class="list-group-item form-group">
                                <label for="gift_1" class="col-md-6">礼物A 3元</label>
                                <div class="col-md-6">
                                    <input type="number" id="gift_1" class="form-control">
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-info" @click="select_gift">确认</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>一共需支付 4.5 元</h4>
                <hr>

                <div class="row">
                    <div class="col-md-offset-1 col-md-4">
                        <button class="btn btn-info" @click="change_status('支付')">立即支付</button>
                    </div>

                    <div class="col-md-offset-2 col-md-4">
                        <a class="btn btn-info" href="/order">稍后支付</a>
                    </div>
                </div>
            </div>


            <div v-if="current_status === '支付'">
                <div class="form-horizontal">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <label class="col-sm-6">账户余额</label>
                            <div class="col-sm-6 input-group">
                                <p class="form-control-static">20</p>
                                <div class="input-group-addon">元</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6">一共需支付</label>
                            <div class="col-sm-6 input-group">
                                <p class="form-control-static">4</p>
                                <div class="input-group-addon">元</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pay_password" class="col-md-6">支付密码</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="pay_password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-offset-1 col-md-4">
                                <button class="btn btn-info" @click="payNow">确认支付</button>
                            </div>

                            <div class="col-md-offset-2 col-md-4">
                                <a class="btn btn-info" href="/recharge" target="_blank">账户充值</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="current_status === '赠送礼物'">
                <h5>选择您想要赠送的礼物</h5>

                <div class="list-group form-horizontal">
                    <div class="list-group-item form-group">
                        <label for="gift_1" class="col-md-6">礼物A 3元</label>
                        <div class="col-md-6">
                            <input type="number" id="gift_1" class="form-control">
                        </div>
                    </div>
                    <div class="list-group-item form-group">
                        <label for="gift_1" class="col-md-6">礼物A 3元</label>
                        <div class="col-md-6">
                            <input type="number" id="gift_1" class="form-control">
                        </div>
                    </div>
                    <div class="list-group-item form-group">
                        <label for="gift_1" class="col-md-6">礼物A 3元</label>
                        <div class="col-md-6">
                            <input type="number" id="gift_1" class="form-control">
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-info" @click="select_gift">确认</button>
                    </div>
                </div>
            </div>


            <div v-if="current_status === '余额不足'">
                <h4>账户余额不足，支付失败，请先充值</h4>

                <div class="row">
                    <div class="col-md-offset-1 col-md-4">
                        <button class="btn btn-info">立即充值</button>
                    </div>
                    <div class="col-md-offset-2 col-md-2">
                        <button class="btn btn-info">稍后支付</button>
                    </div>
                </div>
            </div>


            <div v-if="current_status === '支付密码错误'">
                <h4>支付密码错误</h4>

                <div class="row">
                    <div class="col-md-offset-1 col-md-4">
                        <button class="btn btn-info">重新输入</button>
                    </div>
                    <div class="col-md-offset-2 col-md-2">
                        <button class="btn btn-info">忘记密码</button>
                    </div>
                </div>
            </div>

            <div v-if="current_status === '评价'" class="form-horizontal">
                <div class="form-group">
                    <label for="rating" class="col-md-4">评分</label>
                    <div class="col-md-8">
                        <input type="number" id="rating" min="0" max="5" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment" class="col-md-4">评价</label>
                    <div class="col-md-8">
                        <input type="text" id="comment" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-4">
                        <button class="btn btn-info" @click="review">提交评价</button>
                    </div>
                    <div class="col-md-offset-2 col-md-4">
                        <button class="btn btn-info" @click="change_status('投诉')">我要投诉</button>
                    </div>
                </div>
            </div>

            <div v-if="current_status === '评价成功'">
                <h4>评价成功</h4>

                <button class="btn btn-info" @click="redirect('/order')">确认</button>
            </div>


            <div v-if="current_status === '投诉'">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="reason" class="col-md-4">投诉原因</label>
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
                </div>

                <button class="btn btn-info btn-block" @click="tousu">提交投诉</button>
            </div>

            <div v-if="current_status === '投诉成功'">
                <h4>已收到您的投诉，会尽快处理，请您耐心等待</h4>

                <button class="btn btn-info btn-block" @click="redirect('/me')">确认</button>
            </div>


            {{--~~~~~~~~~~~~~~~~~~~~~~~~~~~司机界面~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--}}
            <div v-if="current_status === '正在出发中'">
                正在前往乘客的鲁中
            </div>


        </div>
    </div>
</div>