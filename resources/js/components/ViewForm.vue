<template>
   <div class="card">
		<div class="card-header">
			<h4 class="card-title" id="basic-layout-form">Surveyor <h4 class="red">{{lists.user.first_name}} {{lists.user.last_name}}</h4> </h4>
		</div>
		<div class="card-content collapse show">
			<div class="card-body">
<!--form start-->
				<!-- <form @submit.prevent="store()" id="addComponent"  @keydown="form.onKeydown($event)"> -->
					<div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text">Organization Name<span class="requiredField red">*</span></label>
                                        {{lists.org_name}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Owner Name<span class="requiredField red">*</span></label>
                                        {{lists.owner_name}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Present Address<span class="requiredField red">*</span></label>
                                        {{lists.present_address}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Permanent Address<span class="requiredField red">*</span></label>
                                        {{lists.permanent_address}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cell No<span class="requiredField red">*</span></label>
                                        {{lists.cell_no}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Concern Person<span class="requiredField red">*</span></label>
                                        {{lists.concern_person}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Organization Cell No<span class="requiredField red">*</span></label>
                                        {{lists.org_cell_no}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bussiness Type<span class="requiredField red">*</span></label>
                                       {{lists.bussiness_type}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bussiness Year<span class="requiredField red">*</span></label>
                                        {{lists.bussiness_year}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

				<!-- </form> -->
			</div>
		</div>
	</div>
</template>

<script>

    export default {
        name: "viewForm",
        props: {
            id: ''
        },
        data(){
            return{
                    form_id: this.id,
                    lists: {},
            }
        },

        methods:{
            getResults(page = 1) {
                        axios.get('api/form-one?page=' + page)
                            .then(response => {
                                this.lists = response.data;
                            });
            },

            loadView(){
                this.$Progress.start();
                    axios.get(`/api/form-one/${this.form_id}`).then(({data}) => (this.lists=data));
                this.$Progress.finish();
            },
        },

        created() {
                Fire.$on('searching',() => {
                    let query = this.$parent.search;
                    axios.get('api/findUser?q=' + query)
                    .then((data) => {
                        this.lists = data.data
                    })
                    .catch(() => {
                    })
                })
                this.loadView();
                Fire.$on('afterCreate',() => {
                    this.loadView();
            });
        },

        mounted() {
            console.log('Component mounted.')
        }
    }

</script>

<style scoped>
.is-invalid {
      border-color: #E84444;
      box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(232,68,68,.6);
    }
</style>
