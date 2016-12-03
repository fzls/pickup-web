{{--侧边栏--}}
<div class="col-md-3 col-md-offset-1">
    <div class="list-group">
        <a href="{{url('/profile')}}" class="list-group-item text-center" id="sidebar-profile">
            <i class="fa fa-github-alt" aria-hidden="true"></i> 信息资料
        </a>
        <a href="{{url('/account')}}" class="list-group-item text-center" id="sidebar-account">
            <i class="fa fa-credit-card" aria-hidden="true"></i> 个人账户
        </a>
        <a href="{{url('/order')}}" class="list-group-item text-center" id="sidebar-order">
            <i class="fa fa-motorcycle" aria-hidden="true"></i> 订单管理
        </a>
        <a href="{{url('/notification')}}" class="list-group-item text-center" id="sidebar-notification">
            <i class="fa fa-bell" aria-hidden="true"></i> 系统通知
        </a>
    </div>
</div>