<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                         <div class="row justify-content-center">
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-danger bg-darken-2">
                                        <i class="fas fa-users-crown"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-danger  media-body">
                                        <h5>Admins</h5>
                                        <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i>{{admins}}</h5>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-primary bg-darken-2">
                                        <i class="fad fa-users-shield"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-primary  media-body">
                                        <h5>Surveyors</h5>
                                        <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> {{surveyors}}</h5>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-success bg-darken-2">
                                        <i class="fad fa-users-plus"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-primary  media-body">
                                        <h5>Users</h5>
                                        <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i>{{standard_users}}</h5>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-warning bg-darken-2">
                                        <i class="fa fa-users-plus"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-primary  media-body">
                                        <h5>Forms</h5>
                                        <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i>{{forms}}</h5>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
         data(){
            return {
               admins:'',
               surveyors:'',
               standard_users:'',
               forms:'',
               lists : {},
               users : {},
            }
        },
        methods: {
                getResults(page = 1) {
                     this.$Progress.start();
                            axios.get('api/user?page=' + page)
                                .then(response => {
                                    this.users = response.data;
                                    console.log(this.users);
                                    this.admins = this.users[0][0].admin;
                                    this.surveyors = this.users[1][0].surveyor;
                                    this.standard_users = this.users[2][0].normaluser;
                                    // for(let i=0; i<this.users.data.length; i++){
                                    //     if (this.users.data[i].user_type == 'admin')
                                    //         this.admins++;
                                    //     if (this.users.data[i].user_type == 'surveyor')
                                    //         this.surveyors++;
                                    //     if (this.users.data[i].user_type == 'user')
                                    //         this.standard_users++;
                                    // }
                                    console.log(this.admins);
                                     console.log(this.surveyors);
                                      console.log(this.standard_users);
                                });
                                axios.get('api/form-one')
                                    .then(response => {
                                        this.lists = response.data;
                                        this.forms = this.lists[0][0].form;
                                        console.log(this.forms);
                                    });
                        this.$Progress.finish();
                },
        },
        created() {
            this.getResults();
            console.log('Component mounted.')
        }
    }
</script>

<style lang="stylus" scoped>

</style>
