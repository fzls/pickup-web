<!--Vue-->
<script type="text/x-template" id="template-XXXXXXX">

</script>

<script>
    Vue.component('pickup-YYYYYY', {
        /*TODO:*/
        template: '#template-XXXXXXX',
        data(){
            return {}
        },
        mounted(){

        },
        methods : {}
    })
</script>

<!--PHP-->
@extends('layouts.app')

@section('content')
    <pickup-XXX></pickup-XXX>
@endsection

@section('script')
    @include('components.vue.XXX')
@endsection