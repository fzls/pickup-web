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
                    /*首先尝试从本地存储中获取用户信息*/
                    let user = window.localStorage.getItem(AUTH_USER_INFO_LOCAL_STORAGE_KEY);
                    if (user !== null && user !== 'null') {
                        this.user = JSON.parse(user);
                    } else {
                        /*若未找到相关信息，则向后端请求当前用户的相关信息*/
                        let vue = this;
                        axios.get(API_ME).then(function (res) {
                            vue.user = res.data.data;
                            window.localStorage.setItem(AUTH_USER_INFO_LOCAL_STORAGE_KEY, JSON.stringify(vue.user, null, 4));
                        })
                    }
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
                /*TODO：跳转到对应身份的起始页面*/
            }
        },
    });
</script>