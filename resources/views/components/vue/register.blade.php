<script type="text/x-template" id="template-register">
    <div class="container text-center">
        <form>
            <legend>注册应用信息</legend>
            <div class="form-group">
                <label for="school_id" class="col-sm-2 control-label">school</label>
                <div class="col-sm-10">
                    <select name="school_id" id="school_id" class="form-control" v-model="school_id">
                        <option v-for="school in schools" :value="school.id">@{{school.name}}</option>
                    </select>
                </div>
            </div>

            <button type="button" class="btn btn-primary" @click="register(school_id)">Submit</button>
        </form>
    </div>
</script>

<script>
    Vue.component('register', {
        template: '#template-register',
        data() {
            return {
                school_id: 1,
                schools  : []
            }
        },
        mounted(){
            this.getSchoolList();
        },
        methods : {
            getSchoolList(){
                let vue = this;
                axios.get(API_SCHOOLS).then(function (res) {
                    vue.schools = res.data.data;
                });
            },
            register(school_id){
                axios.post(API_USERS, {
                    school_id: school_id
                }).then(function (res) {
                    success_dialog(res.data);
                });
            }
        },
    });
</script>