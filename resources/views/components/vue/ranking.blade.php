<style>
    .ranking-num {
        font-family: Arial, sans-serif;
        font-weight: bold;
        color: #c6c6c6;
        /*font-size: 46px;*/
        line-height: 1;
        float: left;
    }
</style>
<script type="text/x-template" id="template-ranking">
    <div>
        <div class="text-center">
            <h3>风云榜</h3>
        </div>
        <hr>
        <div class="row">
            {{--最受欢迎的司机--}}
            <div class="panel panel-info col-md-3">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">最受欢迎老司机</h3>
                </div>

                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num ">1</span> 小明
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num">2</span> 小明
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num">3</span> 小明
                        </a>
                    </div>
                </div>
            </div>

            {{--最受欢迎的乘客--}}
            <div class="panel panel-info col-md-3 col-md-offset-1">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">最受欢迎皮条客</h3>
                </div>

                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num">1</span> 小明
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num">2</span> 小明
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num">3</span> 小明
                        </a>
                    </div>
                </div>
            </div>

            {{--最具魅力的司机--}}
            <div class="panel panel-info col-md-3 col-md-offset-1">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">最具魅力老司机</h3>
                </div>

                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num">1</span> 小明
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num">2</span> 小明
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <span class="ranking-num">3</span> 小明
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-ranking', {
        /*TODO:*/
        template: '#template-ranking',
        data(){
            return {}
        },
        mounted(){

        },
        methods : {}
    })
</script>