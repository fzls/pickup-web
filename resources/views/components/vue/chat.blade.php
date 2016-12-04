<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=pcXKABjQgrWR7frUWMApZVZ69nGYmHFg"></script>
<script type="text/x-template" id="template-chat">
    <div class="row">
        <hr>

        {{--私信界面--}}
        <div class="col-md-3">
            <div class="panel">
                {{--历史消息--}}
                <div class="panel-body bg-success">
                    <div class="text-left">
                        <h4>小头儿子</h4>
                        <p>爸爸去哪里了呢?</p>
                    </div>

                    <hr>

                    <div class="text-right">
                        <h4>大头爸爸</h4>
                        <p>爸爸跑非洲去了呀，不对，我是大头，难道不应该是小头吗</p>
                    </div>

                    <hr>

                    <div class="text-left">
                        <h4>小头儿子</h4>
                        <p>对啊，我什么我是小头啊?</p>
                    </div>
                </div>

                {{--发送消息--}}
                <div class="panel-footer">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="...输入聊天信息"></textarea>
                    </div>
                </div>
            </div>
        </div>

        {{--地图界面--}}
        <div class="col-md-7" style="height: 80vh;">
            <div id="baidu_map" style="height: 100%;"></div>
        </div>

        {{--相关操作及信息界面--}}
        <div class="col-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item text-center">
                    <i class="fa fa-user" aria-hidden="true"></i>　对方的名字
                </a>
                <a href="#" class="list-group-item text-center">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>　已等待05:33
                </a>
                <a href="#" class="list-group-item text-center">
                    <i class="fa fa-wechat" aria-hidden="true"></i>　私信那个TA
                </a>
                <a href="#" class="list-group-item text-center">
                    <i class="fa fa-phone" aria-hidden="true"></i>　打电话给TA
                </a>
            </div>
        </div>

    </div>
</script>

<script src="{{asset('/js/util/initialize-baidu-map.js')}}"></script>

<script>
    Vue.component('pickup-chat', {
        /*TODO:*/
        template: '#template-chat',
        data(){
            return {}
        },
        mounted(){
            init_map("baidu_map");
        },
        methods : {}
    })
</script>