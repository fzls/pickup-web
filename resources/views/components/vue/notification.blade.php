<script type="text/x-template" id="template-notification">
    <div>
        <div class="row">
            @include('components.blade.user-center.sidebar');

            {{--主体内容--}}
            <div class="col-md-7">
                <h2><i class="fa fa-bell"></i> 系统消息</h2>

                <hr>

                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <select class="form-control">
                                <option value="all">所有消息</option>
                                <option value="unread" selected>未读</option>
                                <option value="read">已读</option>
                            </select>
                        </div>
                    </div>
                </div>


                {{--消息便利贴-开始--}}
                <div class="container-fluid">
                    {{--第一行开始--}}
                    <div class="row">
                        <div v-for="(notification, index) in notifications" class="col-md-4">
                            <div :class="getTheme(index)">
                                <div class="panel-heading">
                                    <h3 class="panel-title">系统通知</h3>
                                </div>
                                <div class="panel-body">
                                    @{{ notification.content }}
                                </div>
                                <div class="panel-footer">
                                    @{{ notification.created_at }}
                                </div>
                            </div>
                        </div>
                </div>
                {{--消息便利贴-结束--}}

                <div class="container-fluid text-right">
                    <button class="btn btn-success">　　更多　　</button>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-notification', {
        /*TODO:*/
        template: '#template-notification',
        data(){
            return {
                notifications: [],
                themes       : [
                    'panel-default',
                    'panel-success',
                    'panel-warning',
                    'panel-info',
                    'panel-danger',
                    'panel-primary',
                ]
            }
        },
        mounted(){
            $("#sidebar-notification").addClass('active');
            this.getNotifications();
        },
        methods : {
            getNotifications(page = 1, per_page = 6){
                let vue = this;
                axios.get(constructPaginationUrl(API_NOTIFICATIONS, page, per_page)).then(function (res) {
                    vue.notifications = res.data.data;
                })
            },

            getTheme(index){
                return "panel " + this.themes[index % this.themes.length]
            }
        }
    })
</script>