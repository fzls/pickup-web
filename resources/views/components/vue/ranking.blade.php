<style>
    .ranking-num {
        font-family: Arial, sans-serif;
        font-weight: bold;
        color: #c6c6c6;
        /*font-size: 46px;*/
        line-height: 1;
        /*float: left;*/
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
                        <a v-for="(driver, ranking) in highest_rated_drivers" href="#" class="list-group-item text-center">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="ranking-num ">@{{ ranking+1 }}</span>
                                </div>

                                <div class="col-md-10">
                                    <h4>@{{ driver.username }}</h4>
                                    <div class="small">平均评分 <strong>@{{ driver.average_rating }}</strong></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{--最受欢迎的乘客--}}
            <div class="panel panel-success col-md-3 col-md-offset-1">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">最受欢迎皮条客</h3>
                </div>

                <div class="panel-body">
                    <div class="list-group">
                        <a v-for="(passenger, ranking) in highest_rated_passengers" href="#" class="list-group-item text-center">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="ranking-num ">@{{ ranking+1 }}</span>
                                </div>

                                <div class="col-md-10">
                                    <h4>@{{ passenger.username }}</h4>
                                    <div class="small">平均评分 <strong>@{{ passenger.average_rating }}</strong></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{--最具魅力的司机--}}
            <div class="panel panel-danger col-md-3 col-md-offset-1">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">最具魅力老司机</h3>
                </div>

                <div class="panel-body">
                    <div class="list-group">
                        <a v-for="(driver, ranking) in most_attractive_drivers" href="#" class="list-group-item text-center">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="ranking-num ">@{{ ranking+1 }}</span>
                                </div>

                                <div class="col-md-10">
                                    <h4>@{{ driver.username }}</h4>
                                    <div class="small">共收到<strong>@{{ driver.total_value_of_gifts }}</strong>元的礼物</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    Vue.component('pickup-ranking', {
        template: '#template-ranking',
        data(){
            return {
                highest_rated_drivers: [],
                interval_hrd: 7,
                most_attractive_drivers: [],
                interval_mad: 7,
                highest_rated_passengers: [],
                interval_hrp: 7,
                ranking_count: 5
            }
        },
        mounted(){
            this.getAllRankings();
        },
        methods : {
            /*获取所有排行榜*/
            getAllRankings(){
                this.getHighestRatedDrivers();
                this.getMostAttractiveDrivers();
                this.getHighestRatedPassengers();
            },

            /*获取最受欢迎的老司机*/
            getHighestRatedDrivers(){
                let vue = this;
                axios.get(`${API_RANKING_HIGHEST_RATED_DRIVERS}?interval=${this.interval_hrd}&count=${this.ranking_count}`).then(function (res) {
                    vue.highest_rated_drivers=res.data.data;
                })
            },

            /*获取最受欢迎皮条客*/
            getMostAttractiveDrivers(){
                let vue = this;
                axios.get(`${API_RANKING_MOST_ATTRACTIVE_DRIVERS}?interval=${this.interval_mad}&count=${this.ranking_count}`).then(function (res) {
                    vue.most_attractive_drivers=res.data.data;
                })
            },

            /*获取最具魅力老司机*/
            getHighestRatedPassengers(){
                let vue = this;
                axios.get(`${API_RANKING_HIGHEST_RATED_PASSENGERS}?interval=${this.interval_hrp}&count=${this.ranking_count}`).then(function (res) {
                    vue.highest_rated_passengers=res.data.data;
                })
            }
        }
    })
</script>