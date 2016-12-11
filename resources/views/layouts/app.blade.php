<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('/vendor/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/bootstrap-dialog.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/titatoggle-dist.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/font-awesome.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                                                    'csrfToken' => csrf_token(),
                                                ]); ?>
    </script>
</head>
<body>
<div id="app">
    @include('components.blade.navbar')

    <div class="container">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
{{--3rd party libs--}}
<script src="{{asset('/vendor/js/jquery-3.1.1.js')}}"></script>
<script src="{{asset('/vendor/js/tether.js')}}"></script>
<script src="{{asset('/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('/vendor/js/bootstrap-dialog.js')}}"></script>
<script src="{{asset('/vendor/js/moment.js')}}"></script>
<script src="{{asset('/vendor/js/moment-timezone.js')}}"></script>
<script src="{{asset('/vendor/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('/vendor/js/vue.js')}}"></script>
<script src="{{asset('/vendor/js/axios.js')}}"></script>
<script src="{{asset('/vendor/js/lodash.min.js')}}"></script>


{{--对一些在开发时经常变化的文件设置版本为当前时间{e.g. 1975-12-25T14:15:16-05:00}，防止被浏览器缓存--}}
<?php
function getAssetUrl($path) {
    $url = asset($path);
    /*判断是否是本地开发环境，如果是则添加当前时间作为version，使得每次请求的自己写的js/css都是最新的资源文件*/
    if (app()->environment('local')) {
        $js_version = Carbon\Carbon::now()->toAtomString();
        $url .= "?version=$js_version";
    }

    return $url;
}
?>
{{--utils--}}
<script src="{{getAssetUrl('/js/util/dialog.js')}}"></script>
<script src="{{getAssetUrl('/js/util/user.js')}}"></script>

{{--configs--}}
<script src="{{getAssetUrl('/js/config/env.js')}}"></script>
<script src="{{getAssetUrl('/js/config/api.js')}}"></script>
<script src="{{getAssetUrl('/js/config/auth.js')}}"></script>
<script src="{{getAssetUrl('/js/config/url.js')}}"></script>
<script src="{{getAssetUrl('/js/config/axios.js')}}"></script>


{{--添加子页面所需的component--}}
@yield('script')

{{--获取用户信息--}}
@include('components.vue.user-info')

{{--实例化vue--}}
<script>
    $(function () {
        const app = new Vue({
            el: '#app'
        });
    });
</script>
</body>
</html>
