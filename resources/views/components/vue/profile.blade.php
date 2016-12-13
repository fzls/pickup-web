<script type="text/x-template" id="template-profile">
    <div>
        <div class="row">
            @include('components.blade.user-center.sidebar')

            {{--主体内容--}}
            <div class="col-md-7">
                <h2><i class="fa fa-github-alt"></i> 信息资料</h2>
                <hr>

                {{--用户信息--}}
                <div class="row">
                    <div class="col-md-3">
                        <h3>用户信息</h3>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>用户名：</td>
                                <td>@{{ user.username }}</td>
                            </tr>
                            <tr>
                                <td>邮箱账号：</td>
                                <td>@{{ user.email }}</td>
                            </tr>
                            <tr>
                                <td>绑定手机号：</td>
                                <td>@{{ user.phone }}</td>
                                <td><a class="btn btn-info pull-right" href="{{url('/change-phone')}}">　修改　</a></td>
                            </tr>
                            <tr>
                                <td>登陆密码：</td>
                                <td><i class="fa fa-user-secret"></i></td>
                                {{--TODO: 链接改为认证服务器的修改密码的地址--}}
                                <td><a class="btn btn-info pull-right" :href="reset_password_url">　修改　</a></td>
                            </tr>
                            <tr>
                                <td>性别：</td>
                                <td><i class="fa fa-mars"></i> 帅哥</td>
                                {{--<td><i class="fa fa-venus"></i> 美女</td>--}}
                            </tr>
                            <tr>
                                <td>注册时间：</td>
                                <td>@{{ user.created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{--常用地址信息--}}
                <div class="row">
                    <div class="col-md-3">
                        <h3>常用地址</h3>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr v-for="(location, index) in frequent_used_locations">
                                <td v-text="location.name" :id="getId(index)"></td>
                                <td><a href="#" @click.prevent="edit(index)"><i class="fa fa-edit"></i></a></td>
                                <td><a href="#" @click.prevent="remove(index)"><i class="fa fa-remove"></i></a></td>
                                <td><button style="display: none;" type="button" class="btn btn-success" @click.prevent="save(index)" :id="getButtonId(index)">保存</button></td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <button @click="add" class="btn btn-info">添加地址</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-profile', {
        template: '#template-profile',
        data(){
            return {
                user                   : {},
                frequent_used_locations: []
            }
        },
        mounted(){
            $("#sidebar-profile").addClass('active');
            this.getUserFromLocalStorage();
            this.getFrequentUsedLocations();
        },
        methods : {
            getUserFromLocalStorage(){
                let user = window.localStorage.getItem(AUTH_USER_INFO_LOCAL_STORAGE_KEY);
                if (user !== null && user !== 'null') {
                    this.user = JSON.parse(user);
                }
            },

            getFrequentUsedLocations(){
                let vue = this;
                axios.get(API_FREQUENT_USED_LOCATIONS).then( function (res) {
                    vue.frequent_used_locations = res.data.data;
                });
            },

            add(){
                success_dialog('因为主人様太懒了，这个功能并没有被实装哦','来自不知道该叫什么姬的没有设定的看板娘');
            },

            edit(index){
                /*更新更可编辑状态*/
                let location = $('#'+this.getId(index));

                location.addClass('bg-info');
                location.attr('contenteditable', true);

                /*使保存按钮可见*/
                let btn  = $('#'+this.getButtonId(index));

                btn.css('display','block');
            },

            save(index){
                let location = $('#'+this.getId(index));
                /*更新vm的数据*/
                this.frequent_used_locations[index].name = location.text();
                /*向服务器发送请求*/
                axios.put(API_FREQUENT_USED_LOCATIONS+'/'+this.frequent_used_locations[index].id,{
                    name: location.text()
                }).then(function (res) {
                    info_dialog(res.data.meta.message);
                });

                /*取消可编辑状态*/
                location.removeClass('bg-info');
                location.attr('contenteditable', false);

                /*使保存按钮不可见*/
                let btn  = $('#'+this.getButtonId(index));

                btn.css('display','none');
            },

            remove(index){
                /*隐藏该行*/
                let location = $('#'+this.getId(index));
                location.parent().css('display','none');

                /*并发送请求，删除该记录*/
                axios.delete(API_FREQUENT_USED_LOCATIONS+'/'+this.frequent_used_locations[index].id).then(function (res) {
                    info_dialog(res.data.meta.message);
                });
            },

            getId(index){
                return `location-${index}`;
            },

            getButtonId(index){
                return `button-${index}`;
            }
        },
        computed: {
            reset_password_url(){
                return AUTH_CHANGE_PASSWORD;
            }
        }
    })
</script>