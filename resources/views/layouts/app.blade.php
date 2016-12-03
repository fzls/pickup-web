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
<script src="{{asset('/vendor/js/vue.js')}}"></script>
<script src="{{asset('/vendor/js/axios.js')}}"></script>

{{--utils--}}
<script src="{{asset('/js/util/dialog.js')}}"></script>

{{--configs--}}
{{--对配置文件设置版本为当前时间{e.g. 1975-12-25T14:15:16-05:00}，防止被浏览器缓存--}}
<?php $js_version = Carbon\Carbon::now()->toAtomString(); ?>
<script src="{{asset('/js/config/api.js')."?version=$js_version"}}"></script>
<script src="{{asset('/js/config/auth.js')."?version=$js_version"}}"></script>
<script src="{{asset('/js/config/url.js')."?version=$js_version"}}"></script>
<script src="{{asset('/js/config/axios.js')."?version=$js_version"}}"></script>


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
