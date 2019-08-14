<template>
    <div class="container">
       <div class="card mt-5"  v-if="$gate.isAdmin()">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-success" @click="newModal">ADD NEW <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Registered At</th>
                        <th>Action</th>
                  </tr>
                   <tr v-for="user in users.data" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.first_name}}</td>
                    <td>{{user.last_name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.user_type | upText}}</td>
                    <td>{{user.created_at | myDate}}</td>
                    <td>
                        <a href="#" @click=editUser(user) class="fa fa-edit orange"></a>
                        <a href="#" @click=deleteUser(user.id) class="fa fa-trash red"></a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="users" @pagination-change-page="getResults"></pagination>
              </div>
            </div>

            
        

        <!-- Modal -->
            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 v-show="!editmode" class="modal-title" id="addNew">Add New</h5>
                    <h5 v-show="editmode" class="modal-title" id="addNew">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <form @submit.prevent="editmode ? updateUser() : createUser()" @keydown="form.onKeydown($event)">
                <div class="modal-body">
                    <div class="form-group">
                        <input v-model="form.first_name" type="text" name="first_name"
                            placeholder="First Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                        <has-error :form="form" field="first_name"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.last_name" type="text" name="last_name"
                            placeholder="Last Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                        <has-error :form="form" field="last_name"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.email" type="email" name="email"
                            placeholder="Email Address"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div>

                    <div class="form-group">
                        <select v-model="form.user_type" id="user_type" class="form-control" :class="{ 'is-invalid': form.errors.has('user_type') }">
                            <option value="">Select User Role</option>
                            <option value="admin">Admin</option>
                            <option value="surveyor">Surveyor</option>
                            <option value="user">Standard User</option>
                        </select>
                        <has-error :form="form" field="user_type"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.password" type="password" name="password" id="password"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                    </div>

                 </div>

                 <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                 </div>
              </form>
           </div>
         </div>
      </div>  
    </div>
</template>

<script>
    export default {
        data(){
            return {
                editmode: false,
                users : {},
                form : new Form ({
                    id:'',
                    first_name: '',
                    last_name: '',
                    email: '',
                    password: '',
                    user_type: '',
                })
            }
        },
        methods: {
            getResults(page = 1) {
                        axios.get('api/user?page=' + page)
                            .then(response => {
                                this.users = response.data;
                            });
            },

            updateUser(){
              this.$Progress.start();
                // console.log('Editing data');
                this.form.put('api/user/'+this.form.id)
                .then(() => {
                    // success
                    $('#addNew').modal('hide');
                     swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('afterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });  
            },
            editUser(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                 this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },
            deleteUser(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    // send request to the server 
                    if (result.value){
                        this.form.delete('api/user/'+id)
                    .then( () => {    
                            swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            Fire.$emit('afterCreate');
                        }).catch( () => {
                            swal.fire(
                            'Failed!',
                            'There was somethinbg wrong',
                            'warning'
                            )
                        })
                    }
                })
            },
            loadUsers(){
              if(this.$gate.isAdminOrAuthor()){
                this.$Progress.start();
                    axios.get('api/user').then(({data}) => (this.users=data));
                this.$Progress.finish();
                }
            },
            createUser(){
                this.$Progress.start();
                  this.form.post('api/user')
                 .then(() => {
                  Fire.$emit('afterCreate');
                  $('#addNew').modal('hide')
                  toast.fire({
                    type: 'success',
                    title: 'Created successfully'
                    });
                  this.$Progress.finish();
                //  .then(({ data }) => { console.log(data) });
                }).catch( () => {
                })
            },
        },
        created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then((data) => {
                    this.users = data.data
                })
                .catch(() => {
                })
            })
           this.loadUsers();
           Fire.$on('afterCreate',() => {
               this.loadUsers();
           });
        //    setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>