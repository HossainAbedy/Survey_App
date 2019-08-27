<template>
   <div class="card">
		<div class="card-header">
			<h4 class="card-title" id="basic-layout-form">Surveyor <h4 class="red">{{lists.user.first_name}} {{lists.user.last_name}}</h4> </h4>
            <router-link to='/formlist' class="btn btn-success float-right"> View Lists</router-link>
		</div>
		<div class="card-content collapse show">
			<div class="card-body">
<!--form start-->
				<!-- <form @submit.prevent="store()" id="addComponent"  @keydown="form.onKeydown($event)"> -->
					<div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Organization Name: </label>
                                        <span class="text blue">{{lists.org_name}}</span>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Owner Name: </label>
                                        <span class="text blue">{{lists.owner_name}}</span>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Present Address: </label>
                                        <span class="text blue">{{lists.present_address}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                  <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Permanent Address: </label>
                                        <span class="text blue">{{lists.permanent_address}}</span>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Cell No: </label>
                                        <span class="text blue">{{lists.cell_no}}</span>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Concern Person: </label>
                                        <span class="text blue">{{lists.concern_person}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Organization Cell No: </label>
                                        <span class="text blue">{{lists.org_cell_no}}</span>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Bussiness Type: </label>
                                       <span class="text blue">{{lists.bussiness_type}}</span>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Bussiness Year: </label>
                                        <span class="text blue">{{lists.bussiness_year}}</span>
                                    </div>
                                </div>
                            </div>
                            <!--List of Question Answers -->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>1.How long you are dealing with Hi-vallay product? = </label>
                                        <span class="text blue">{{lists.one}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>2.Are you dealing with other company? =</label>
                                        <span class="text blue">{{lists.two_data}}</span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div v-if="lists.two_extra" class="form-group">
                                        <label>Specified Answer If Yes: </label>
                                        <span class="text blue">{{lists.two_extra}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>3.How do you feel about Quality of Hi-vallay fan? =</label>
                                        <span class="text blue">{{lists.three}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>4.What does the customer except from Hi-vally in term of quality? =</label>
                                        <span class="text blue">{{lists.four_data}}</span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div v-if="lists.four_extra" class="form-group">
                                        <label>Any other: </label>
                                        <span class="text blue">{{lists.four_extra}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>5.How do you rate the promotional activities given y Hi-vally? =</label>
                                        <span class="text blue">{{lists.five}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>6.What type of promotional activity do you prefer with Hi-vally product? =</label>
                                        <span class="text blue">{{lists.six_data}}</span>
                                    </div>
                                </div>
                                 <div class="col-md-8">
                                    <div v-if="lists.six_extra" class="form-group">
                                        <label>Others: </label>
                                        <span class="text blue">{{lists.six_extra}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>7.Whether the expected Quantity of Hi-vally is is supplied to you in time? =</label>
                                        <span class="text blue">{{lists.seven}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>8.What do you feel about credit period given by Hi-Vally? =</label>
                                        <span class="text blue">{{lists.eight}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>9.What do you feel about the employee dealing with you in Hi-Vally? =</label>
                                        <span class="text blue">{{lists.nine}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>10.What are the factors that you expects from Hi-Vally Products? =</label>
                                        <span class="text blue">{{lists.ten_data}}</span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div v-if="lists.ten_extra" class="form-group">
                                        <label>Serivices: </label>
                                        <span class="text blue">{{lists.ten_extra}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>11.How much do you spend in winter Booking? =</label>
                                        <span class="text blue">{{lists.eleven}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>12.Do you have any complains about Hi-Vallay Product? =</label>
                                        <span class="text blue">{{lists.twelve_data}}</span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div v-if="lists.twelve_extra" class="form-group">
                                        <label>Complains: </label>
                                        <span class="text blue">{{lists.twelve_extra}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>13.Do you recommend your customer Hi-Vallay Product? =</label>
                                        <span class="text blue">{{lists.thirteen_data}}</span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div v-if="lists.thirteen_extra" class="form-group">
                                        <label>Specified Answer: </label>
                                        <span class="text blue">{{lists.thirteen_extra}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>14.What do you feel about after Sales Service Given y Hi-Vally? =</label>
                                        <span class="text blue">{{lists.forteen_data}}</span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div v-if="lists.forteen_extra" class="form-group">
                                        <label>Serivices: </label>
                                        <span class="text blue">{{lists.forteen_extra}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>15.Last Balance =</label>
                                        <span class="text blue">{{lists.fifteen}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>16.Do you have any suggestion in improve the quality of Hi-Vally product =</label>
                                        <span class="text blue">{{lists.sixteen_data}}</span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div v-if="lists.sixteen_extra" class="form-group">
                                        <label>Specified Andwer: </label>
                                        <span class="text blue">{{lists.sixteen_extra}}</span>
                                    </div>
                                </div>
                            </div>
                            <!--EndList of Question Answers -->
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
                    lists: {
                        user:{},
                    },
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
