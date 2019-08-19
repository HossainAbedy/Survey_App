<template>
   <div class="card">
		<div class="card-header">
			<h4 class="card-title" id="basic-layout-form">Survey From </h4>
		</div>
		<div class="card-content collapse show">
			<div class="card-body">
<!--form start-->
				<form @submit.prevent="store()" id="addComponent"  @keydown="form.onKeydown($event)">
					<div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text">Organization Name<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control"
                                        placeholder="Organization Name" v-model="form.org_name"
                                        name="org_name" :class="{ 'is-invalid': form.errors.has('org_name') }">
                                        <has-error :form="form" field="org_name"></has-error>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Owner Name<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control"
                                        placeholder="Owner Name" v-model="form.owner_name"
                                        name="owner_name" :class="{ 'is-invalid': form.errors.has('owner_name') }">
                                        <has-error :form="form" field="owner_name"></has-error>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Present Address<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control"
                                        placeholder="Present Address" v-model="form.present_address"
                                        name="present_address" :class="{ 'is-invalid': form.errors.has('present_address') }">
                                        <has-error :form="form" field="present_address"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Permanent Address<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control"
                                        placeholder="Permanent Address" v-model="form.permanent_address"
                                        name="permanent_address"  :class="{ 'is-invalid': form.errors.has('permanent_address') }">
                                        <has-error :form="form" field="permanent_address"></has-error>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cell No<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control"
                                        placeholder="Cell No" v-model="form.cell_no"
                                        name="cell_no" :class="{ 'is-invalid': form.errors.has('cell_no') }">
                                        <has-error :form="form" field="cell_no"></has-error>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Concern Person<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Concern Person" v-model="form.concern_person"
                                         name="concern_person" :class="{ 'is-invalid': form.errors.has('concern_person') }">
                                        <has-error :form="form" field="concern_person"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Organization Cell No<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Organization Cell No" v-model="form.org_cell_no"
                                        name="org_cell_no" :class="{ 'is-invalid': form.errors.has('org_cell_no') }">
                                        <has-error :form="form" field="org_cell_no"></has-error>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bussiness Type<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Bussiness Type" v-model="form.bussiness_type"
                                        name="bussiness_type" :class="{ 'is-invalid': form.errors.has('bussiness_type') }">
                                        <has-error :form="form" field="bussiness_type"></has-error>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bussiness Year<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Bussiness Year" v-model="form.bussiness_year"
                                         name="bussiness_year" :class="{ 'is-invalid': form.errors.has('bussiness_year') }">
                                        <has-error :form="form" field="bussiness_year"></has-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--one-->
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1.How long you are dealing with Hi-vallay product<span class="requiredField red">*</span></label>
                                        <br>
                                        <input type="text" class="form-control" placeholder="year" v-model="form.one"
                                         name="one" :class="{ 'is-invalid': form.errors.has('one') }">
                                        <has-error :form="form" field="one"></has-error>
                                        <br>
                                        <span v-if="form.one" class="red"><strong>Picked: {{ form.one }}</strong></span>
                                    </div>
                                </div>
                            </div>
<!--one-->
<!--two-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>2.Are you dealing with other company<span class="requiredField red">*</span></label>
                                        <br>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('two.data') }">
                                            <div class="col-md-6">
                                                <input type="radio" id="yes" value="yes" v-model="form.two.data" name="two.data">
                                                <label for="yes">Yes</label>
                                                <div class="col-md-6" v-if="form.two.data == 'yes'" :class="{ 'is-invalid': form.errors.has('two.extra') }">
                                                    <input type="text" class="form-control" placeholder="If yes,please specifies" v-model="form.two.extra" name="two.extra">
                                                    <has-error :form="form" field="two.extra"></has-error>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" id="no" value="no" v-model="form.two.data" @click="setNullTwo(form.two.extra)" name="two.data">
                                                <label for="yes">No</label>
                                            </div>
                                        </div>
                                        <br>
                                        <has-error :form="form" field="two.data"></has-error>
                                        <span v-if="form.two.data" class="red"><strong>Picked: {{ form.two.data }} </strong></span>
                                        <span v-if="form.two.extra" class="red"><strong>---> {{ form.two.extra }}</strong></span>
                                    </div>
                                </div>
                            </div>
<!--two-->
<!--three-->
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>3.How do you feel about Quality of Hi-vallay fan?<span class="requiredField red">*</span></label>
                                        <div class="row"  name="three" :class="{ 'is-invalid': form.errors.has('three') }">
                                            <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="Very Good" value="Very Good" name="three" v-model="form.three">
                                                <label for="Very Good">Very Good</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Good" value="Good" name="three" v-model="form.three">
                                                <label for="Good">Good</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Satisfactory" value="Satisfactory" name="three" v-model="form.three">
                                                <label for="Satisfactory">Satisfactory</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Poor" value="Poor" name="three" v-model="form.three">
                                                <label for="Poor">Poor</label>
                                            </div>
                                            <br>
                                        </div>
                                        <has-error :form="form" field="three"></has-error>
                                        <span v-if="form.three" class="red"><strong>Picked: {{ form.three }}</strong></span>
                                    </div>
                                </div>
                            </div>
<!--three-->
<!--four-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>4.What does the customer except from Hi-vally in term of quality  ?<span class="requiredField red">*</span></label>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('four.data') }">
                                            <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="Design" value="Design" v-model="form.four.data" @click="setNullFour(form.four.extra)">
                                                <label for="Design">Design</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Speed" value="Speed" v-model="form.four.data" @click="setNullFour(form.four.extra)">
                                                <label for="Speed">Speed</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Power Consumption" value="Power Consumption" v-model="form.four.data" @click="setNullFour(form.four.extra)">
                                                <label for="Power Consumption">Power Consumption</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Any Other" value="Any Other" v-model="form.four.data">
                                                <label for="Any Other">Any Other</label>
                                                <div class="col-md-3" v-if="form.four.data == 'Any Other'"  :class="{ 'is-invalid': form.errors.has('four.extra') }">
                                                    <input type="text" class="form-control" placeholder="Anyother" v-model="form.four.extra">
                                                </div>
                                                <has-error :form="form" field="three"></has-error>
                                            </div>
                                            <br>
                                        </div>
                                        <has-error :form="form" field="three"></has-error>
                                        <span v-if="form.four.data" class="red"><strong>Picked: {{ form.four.data }}</strong></span>
                                        <span v-if="form.four.extra" class="red">---> {{ form.four.extra }}</span>
                                    </div>
                                </div>
                            </div>
<!--four-->
<!--five-->
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>5.How do you rate the promotional activities given y Hi-vally?<span class="requiredField red">*</span></label>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('five') }">
                                            <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="Very Good" value="Very Good" v-model="form.five">
                                                <label for="Very Good">Very Good</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Good" value="Good" v-model="form.five">
                                                <label for="Good">Good</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Satisfactory" value="Satisfactory" v-model="form.five">
                                                <label for="Satisfactory">Satisfactory</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Poor" value="Poor" v-model="form.five">
                                                <label for="Poor">Poor</label>
                                            </div>
                                            <br>
                                        </div>
                                        <span v-if="form.five" class="red"><strong>Picked: {{ form.five }}</strong></span>
                                    </div>
                                </div>
                            </div>
 <!--five-->
 <!--six-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>6.What type of promotional activity do you prefer with Hi-vally product?<span class="requiredField red">*</span></label>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('six.data') }">
                                            <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="Discount" value="Discount" v-model="form.six.data">
                                                <label for="Design">Discount</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Gift" value="Gift" v-model="form.six.data">
                                                <label for="Speed">Gift</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Price offer" value="Price offer" v-model="form.six.data">
                                                <label for="Price offer">Price offer</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Others" value="Others" v-model="form.six.data">
                                                <label for="Others">Others</label>
                                                <input v-if="form.six.data == 'Others'" type="text" class="form-control" placeholder="Others" v-model="form.six.extra">
                                            </div>
                                            <br>
                                        </div>
                                        <span v-if="form.six.data" class="red"><strong>Picked: {{ form.six.data }}</strong></span>
                                        <span v-if="form.six.extra" class="red">---> {{ form.six.extra }}</span>
                                    </div>
                                </div>
                            </div>
 <!--six-->
 <!--seven-->
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>7.Whether the expected Quantity of Hi-vally is is supplied to you in time?<span class="requiredField red">*</span></label>
                                        <br>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('seven') }">
                                            <div class="col-md-6">
                                                <input type="radio" id="yes" value="yes" v-model="form.seven">
                                                <label for="yes">Yes</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" id="no" value="no" v-model="form.seven">
                                                <label for="no">No</label>
                                            </div>
                                        </div>
                                        <span v-if="form.seven" class="red"><strong>Picked: {{ form.seven }} </strong></span>

                                    </div>
                                </div>
                            </div>
<!--seven-->
<!--Eight-->
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>8.What do you feel about credit period given by Hi-Vally?<span class="requiredField red">*</span></label>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('eight') }">
                                            <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="Very Good" value="Very Good" v-model="form.eight">
                                                <label for="Very Good">Very Good</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Good" value="Good" v-model="form.eight">
                                                <label for="Good">Good</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Satisfactory" value="Satisfactory" v-model="form.eight">
                                                <label for="Satisfactory">Satisfactory</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Poor" value="Poor" v-model="form.eight">
                                                <label for="Poor">Poor</label>
                                            </div>
                                            <br>
                                        </div>
                                        <span v-if="form.eight" class="red"><strong>Picked: {{ form.eight }}</strong></span>
                                    </div>
                                </div>
                            </div>
 <!--Eight-->
 <!--nine-->
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>9.What do you feel about the employee dealing with you in Hi-Vally?<span class="requiredField red">*</span></label>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('nine') }">
                                            <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="Highly Satisfied" value="Highly Satisfied" v-model="form.nine">
                                                <label for="Highly Satisfied">Highly Satisfied</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Satisfied" value="Satisfied" v-model="form.nine">
                                                <label for="Satisfied">Satisfied</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Average" value="Average" v-model="form.nine">
                                                <label for="Average">Average</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Dissatisfied" value="Dissatisfied" v-model="form.nine">
                                                <label for="Dissatisfied">Dissatisfied</label>
                                            </div>
                                            <br>
                                        </div>
                                        <span v-if="form.nine" class="red"><strong>Picked: {{ form.nine }}</strong></span>
                                    </div>
                                </div>
                            </div>
<!--nine-->
<!--Ten-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>10.What are the factors that you expects from Hi-Vally Products?<span class="requiredField red">*</span></label>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('nine') }">
                                            <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="Promotional Sale" value="Promotional Sale" v-model="form.ten.data" @click="setNullTen(form.ten.extra)">
                                                <label for="Promotional Sale">Promotional Sale</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Follow-Up" value="Follow-Up" v-model="form.ten.data" @click="setNullTen(form.ten.extra)">
                                                <label for="Follow-Up">Follow-Up</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Schele" value="Schele" v-model="form.ten.data" @click="setNullTen(form.ten.extra)">
                                                <label for="Schele">Schele</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Service" value="Service" v-model="form.ten.data">
                                                <label for="Service">Service</label>
                                                <input v-if="form.ten.data == 'Service'" type="text" class="form-control" placeholder="Service" v-model="form.ten.extra">
                                            </div>
                                            <br>
                                        </div>
                                        <span v-if="form.ten.data" class="red"><strong>Picked: {{ form.ten.data }}</strong></span>
                                        <span v-if="form.ten.extra" class="red">---> {{ form.ten.extra }}</span>
                                    </div>
                                </div>
                            </div>
<!--Ten-->
<!--Eleven-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>11.How much do you spend in winter Booking?<span class="requiredField red">*</span></label>
                                        <input type="text" class="form-control" placeholder="spending" v-model="form.eleven"
                                         name="eleven" :class="{ 'is-invalid': form.errors.has('eleven') }">
                                        <has-error :form="form" field="eleven"></has-error>
                                    </div>
                                </div>
                            </div>
<!--Eleven-->
<!--Twelve-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>12.Do you have any complains about Hi-Vallay Product?<span class="requiredField red">*</span></label>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('twelve.data') }">
                                        <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="yes" value="yes" v-model="form.twelve.data">
                                                <label for="yes">Yes</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="no" value="no" v-model="form.twelve.data" @click="setNullTwelve(form.twelve.extra)">
                                                <label for="no">No</label>
                                            </div>
                                        </div>
                                            <div class="col-md-12" v-if="form.twelve.data == 'yes'" :class="{ 'is-invalid': form.errors.has('twelve.extra') }">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <input type="radio" id="Delivery Goods" value="Delivery Goods" v-model="form.twelve.extra">
                                                            <label for="Delivery Goods">Delivery Goods</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="radio" id="Quality Product" value="Quality Product" v-model="form.twelve.extra">
                                                            <label for="Quality Product">Quality Product</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="radio" id="After Sales Service" value="After Sales Service" v-model="form.twelve.extra">
                                                            <label for="After Sales Service">After Sales Service</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="radio" id="Pricing" value="Pricing" v-model="form.twelve.extra">
                                                            <label for="Pricing">Pricing</label>
                                                        </div>
                                                    </div>
                                               </div>
                                            </div>
                                        <br>
                                        <span v-if="form.twelve.data" class="red"><strong>Picked: {{ form.twelve.data }}</strong></span>
                                        <span v-if="form.twelve.extra" class="red">---> {{ form.twelve.extra }}</span>
                                    </div>
                                </div>
                            </div>
<!--Twelve-->
<!--Thirteen-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>13.Do you recommend your customer Hi-Vallay Product?<span class="requiredField red">*</span></label>
                                        <br>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('thirteen.data') }">
                                            <div class="col-md-6">
                                                <input type="radio" id="yes" value="yes" v-model="form.thirteen.data" @click="setNullThirteen(form.thirteen.extra)">
                                                <label for="yes">Yes</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" id="no" value="no" v-model="form.thirteen.data">
                                                <label for="no">No</label>
                                                <div class="col-md-6" v-if="form.thirteen.data == 'no'" :class="{ 'is-invalid': form.errors.has('thirteen.extra') }">
                                                    <input type="text" class="form-control" placeholder="If No,please specifies" v-model="form.thirteen.extra">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <span v-if="form.thirteen.data" class="red"><strong>Picked: {{ form.thirteen.data }} </strong></span>
                                        <span v-if="form.thirteen.extra" class="red"><strong> Specifies {{ form.thirteen.extra }}</strong></span>
                                    </div>
                                </div>
                            </div>
<!--Thirteen-->
<!--Forteen-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>14.What do you feel about after Sales Service Given y Hi-Vally?<span class="requiredField red">*</span></label>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('forteen.data') }">
                                            <br>
                                            <div class="col-md-3">
                                                <input type="radio" id="Highly Satisfied" value="Highly Satisfied" v-model="form.forteen.data">
                                                <label for="Highly Satisfied">Highly Satisfied</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Satisfied" value="Satisfied" v-model="form.forteen.data">
                                                <label for="Satisfied">Satisfied</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Moderate" value="Moderate" v-model="form.forteen.data">
                                                <label for="Moderate">Moderate</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" id="Dissatisfies" value="Dissatisfies" v-model="form.forteen.data">
                                                <label for="Dissatisfies">Dissatisfies</label>
                                                <input v-if="form.forteen.data == 'Service'" type="text" class="form-control" placeholder="Service" v-model="form.forteen.extra">
                                            </div>
                                            <br>
                                        </div>
                                        <span v-if="form.forteen.data" class="red"><strong>Picked: {{ form.forteen.data }}</strong></span>
                                        <span v-if="form.forteen.extra" class="red">---> {{ form.forteen.extra }}</span>
                                    </div>
                                </div>
                            </div>
<!--Forteen-->
<!--Fiftenn-->
                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>15.Last Balance<span class="requiredField red">*</span></label>
                                        <br>
                                        <input type="text" class="form-control" placeholder="Last Balance" v-model="form.fifteen"
                                         name="fifteen" :class="{ 'is-invalid': form.errors.has('fifteen') }">
                                        <has-error :form="form" field="fifteen"></has-error>
                                        <br>
                                        <span v-if="form.fifteen" class="red"><strong>Picked: {{ form.fifteen }}</strong></span>
                                    </div>
                                </div>
                            </div>
<!--Fiftenn-->
<!--Sixtenn-->
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>16.Do you have any suggestion in improve the quality of Hi-Vally product<span class="requiredField red">*</span></label>
                                        <br>
                                        <div class="row" :class="{ 'is-invalid': form.errors.has('sixteen.data') }">
                                            <div class="col-md-6">
                                                <input type="radio" id="yes" value="yes" v-model="form.sixteen.data">
                                                <label for="yes">Yes</label>
                                                <div class="col-md-6" v-if="form.sixteen.data == 'yes'" :class="{ 'is-invalid': form.errors.has('sixteen.extra') }">
                                                    <input type="text" class="form-control" placeholder="If yes,please specifies" v-model="form.sixteen.extra">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" id="no" value="no" v-model="form.sixteen.data" @click="setNullSixteen(form.sixteen.extra)">
                                                <label for="no">No</label>
                                            </div>
                                        </div>
                                        <br>
                                        <span v-if="form.sixteen.data" class="red"><strong>Picked: {{ form.sixteen.data }} </strong></span>
                                        <span v-if="form.sixteen.extra" class="red"><strong>---> {{ form.sixteen.extra }}</strong></span>
                                    </div>
                                </div>
                            </div>
<!--Sixtenn-->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-actions pull-right">
                                            <button type="submit pull-right" class="btn btn-success btn-min-width mr-1 mb-1">
                                                    <i class="fa fa-check"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
	                </div>
				</form>
			</div>
		</div>
	</div>
</template>

<script>

    export default {
        data(){
            return{
                    form : new Form ({
                        org_name:'',
                        owner_name:'',
                        present_address:'',
                        permanent_address:'',
                        cell_no:'',
                        concern_person:'',
                        org_cell_no:'',
                        bussiness_type:'',
                        bussiness_year:'',
                        one:'',
                        two:{
                            data:'',
                            extra:''
                        },
                        three:'',
                        four:{
                            data:'',
                            extra:''
                        },
                        five:'',
                        six:{
                            data:'',
                            extra:''
                        },
                        seven:'',
                        eight:'',
                        nine:'',
                        ten:{
                            data:'',
                            extra:''
                        },
                        eleven:'',
                        twelve:{
                            data:'',
                            extra:''
                        },
                        thirteen:{
                            data:'',
                            extra:''
                        },
                        forteen:{
                            data:'',
                            extra:''
                        },
                        fifteen:'',
                        sixteen:{
                            data:'',
                            extra:''
                        },
                    }),
                    // errors: new Errors(),
            }
        },

        methods:{
            //setNull
            setNullTwo($values){
                 if($values != null){
                    this.form.two.extra=null;
                    }
            },
            setNullFour($values){
                 if($values != null){
                    this.form.four.extra=null;
                    }
            },
            setNullTen($values){
                 if($values != null){
                    this.form.ten.extra=null;
                    }
            },
            setNullTwelve($values){
                 if($values != null){
                    this.form.twelve.extra=null;
                    }
            },
            setNullThirteen($values){
                 if($values != null){
                    this.form.thirteen.extra=null;
                    }
            },
            setNullSixteen($values){
                 if($values != null){
                    this.form.sixteen.extra=null;
                    }
            },
            //formCreate
            store(){
                this.$Progress.start();
                 //console.log(this.form);
                 this.form.post('api/form-one')
                 .then(() => {
                  toast.fire({
                    type: 'success',
                    title: 'Created successfully'
                    });
                  this.form.reset();
                  this.$Progress.finish();
                    }).catch(() => {
                });
            },
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
