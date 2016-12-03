<script type="text/x-template" id="template-test">
    <div>
        @{{ message }}
        <h1>count: @{{ counter }}</h1>
        <div>
            <button class="btn btn-success" @click="inc">Add</button>
        </div>
        <input class="form-control" type="text" v-model="counter">
    </div>
</script>

<script>
    Vue.component('pickup-test', {
        template: '#template-test',
        data(){
            return {
                message: 'Hello laravel 12312 - - - -',
                counter: 0
            }
        },
        mounted(){
            let vue = this;
            axios.get("{{url('test')}}").then(function (response) {
                console.log('test' + response.data);
                vue.counter = response.data;
            }).catch(function (error) {
            });
        },
        methods : {
            inc(){
                this.counter++;
            }
        },
    });
</script>