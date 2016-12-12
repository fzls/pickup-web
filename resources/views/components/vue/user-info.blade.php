{{--获取用户信息--}}
<script type="text/x-template" id="template-user-info">
    <ul class="nav navbar-nav navbar-right" id="user_info">
        <li class="dropdown" v-if="user && user!=={}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                @{{ user.username }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a @click.prevent="logout" href="{{ url('/logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <div class="checkbox checkbox-slider--b-flat">
                <label>
                    <input type="checkbox" id="status" v-model="status" @click="toggleStatus"><span>@{{ identity }}</span>
                </label>
            </div>
        </li>
    </ul>
</script>
<script>
    Vue.component('pickup-user-info', {
        template: '#template-user-info',
        data(){
            return {
                user  : {},
                status: false
            }
        },
        mounted(){
            this.getUserInfo();
            /*从本地存储中获取用户身份*/
            this.status = JSON.parse(window.localStorage.getItem(AUTH_USER_STATUS_LOCAL_STORAGE_KEY)) || false;
        },
        computed: {
            identity(){
                return this.status ? '司机' : '乘客';
            }
        },
        methods : {
            getUserInfo(){
                let token = window.localStorage.getItem(AUTH_TOKEN_LOCAL_STORAGE_KEY);
                if (token) {
                    /*NOTE: 为了保证用户的时效性，每次均重新进行请求，从而可以保证个人中心的信息是最新的*/
                    /*从本地存储读取之前更新过的用户信息*/
                    this.user = JSON.parse(window.localStorage.getItem(AUTH_USER_INFO_LOCAL_STORAGE_KEY));

                    /*更新用户信息， 并存储到本地，用以后续取出*/
                    /*如果当前页面不是注册应用信息页面，则向后端请求该用户信息*/
                    if (window.location.pathname.indexOf(URL_REGISTER) === -1) {
                        axios.get(API_ME).then(function (res) {
                            window.localStorage.setItem(AUTH_USER_INFO_LOCAL_STORAGE_KEY, JSON.stringify(res.data.data, null, 4));
                        })
                    }
                } else if (window.location.pathname.indexOf(AUTH_CALLBACK_PATH) === -1 && window.location.pathname.indexOf(AUTH_REDIRECT_PATH) === -1) {
                    // 否则如果不是oauth认证相关的的url，重定向到登陆界面
                    alert_dialog("主人还没登陆过呢");
                    window.location.replace(AUTH_REDIRECT_URI);
                }
            },
            logout(){
                window.localStorage.clear();
                this.user = {};
                success_dialog('主人様已经成功登出了呢');
            },
            toggleStatus(){
                /*切换用户身份，并记录*/
                this.status = !this.status;
                window.localStorage.setItem(AUTH_USER_STATUS_LOCAL_STORAGE_KEY, JSON.stringify(this.status));
                if (this.status) {
                    /*如果是司机*/
                    window.location.href = "{{url('/driver')}}";
                } else {
                    window.location.href = "{{url('/passenger')}}";
                }
            }
        },
    });
</script>