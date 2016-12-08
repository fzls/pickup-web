<script type="text/x-template" id="template-home">
    @include('components.vue.templates.home')
</script>

<script>
    Vue.component('pickup-home', {
        /*TODO:*/
        template: '#template-home',
        data(){
            return {}
        },
        mounted(){

        },
        methods : {
            setStatus(is_driver){
                window.localStorage.setItem(AUTH_USER_STATUS_LOCAL_STORAGE_KEY, JSON.stringify(is_driver));
            }
        }
    })
</script>