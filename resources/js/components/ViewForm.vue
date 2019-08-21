<template>
   <div class="card">
		<div class="card-header">
			<h4 class="card-title" id="basic-layout-form">Survey From </h4>
		</div>
		<div class="card-content collapse show">
			<div class="card-body">
<!--form start-->
				<!-- <form @submit.prevent="store()" id="addComponent"  @keydown="form.onKeydown($event)"> -->
					<div class="form-body" v-for="list in lists.data" :key="list.id">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text">Organization Name<span class="requiredField red">*</span></label>
                                        {{list.org_name}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Owner Name<span class="requiredField red">*</span></label>
                                        {{list.owner_name}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Present Address<span class="requiredField red">*</span></label>
                                        {{list.present_address}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Permanent Address<span class="requiredField red">*</span></label>
                                        {{list.permanent_address}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cell No<span class="requiredField red">*</span></label>
                                        {{list.cell_no}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Concern Person<span class="requiredField red">*</span></label>
                                        {{list.concern_person}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Organization Cell No<span class="requiredField red">*</span></label>
                                        {{list.org_cell_no}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bussiness Type<span class="requiredField red">*</span></label>
                                       {{list.bussiness_type}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bussiness Year<span class="requiredField red">*</span></label>
                                        {{list.bussiness_year}}
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
        data(){
            return{
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

            loadLists(){
                this.$Progress.start();
                    axios.get('api/form-one').then(({data}) => (this.lists=data));
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
                this.loadLists();
                Fire.$on('afterCreate',() => {
                    this.loadLists();
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
