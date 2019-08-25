<template>
   <div class="container">
       <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form List</h3>
                <a href="import-export" class="btn btn-success float-right">Excel <i class="far fa-file-excel"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Surveyed By</th>
                            <th>Surveyor Type</th>
                            <th>Organization Name</th>
                            <th>Owner Name</th>
                            <!-- <th>Present Address</th>
                            <th>Permanent Address</th>
                            <th>Cell No</th>
                            <th>Concern Person</th>
                            <th>Organization Cell No</th> -->
                            <th>Bussiness Type</th>
                            <th>Bussiness Year</th>
                            <th>Action</th>
                        </tr>
                        <tr v-for="list in lists.data" :key="list.id">
                            <td>{{list.id}}</td>
                            <td>{{list.user.first_name}} {{list.user.last_name}}</td>
                            <td>{{list.user.user_type}}</td>
                            <td>{{list.org_name}}</td>
                            <td>{{list.owner_name}}</td>
                            <!-- <td>{{list.present_address}}</td>
                            <td>{{list.permanent_address}}</td>
                            <td>{{list.cell_no}}</td>
                            <td>{{list.concern_person}}</td>
                            <td>{{list.org_cell_no}}</td> -->
                            <td>{{list.bussiness_type}}</td>
                            <td>{{list.bussiness_year}}</td>
                            <td>
                                <a href="#" @click="deleteList(list.id)" class="fa fa-trash red"></a>
                                <router-link :to="{ name: 'viewForm', params: { id: list.id }}">
                                    <i class="fa fa-eye blue"></i>
                                </router-link>
                                <router-link :to="{ name: 'editForm', params: { list: list }}">
                                    <i class="fa fa-edit orange"></i>
                                </router-link>
                                <!-- <a href="import-export" @click="send()" class="fab fa-google-plus-g"></a> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="lists" @pagination-change-page="getResults"></pagination>
              </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                lists : {},
                excell : {},
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

            deleteList(id){
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
                        axios.delete('api/form-one/'+id)
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

            send(id){
                this.$Progress.start();
                    let newWindow = window.open();
                    axios.get('export'+id)
                    .then(response => {
                        newWindow.location = 'http://' + window.location.hostname + 'export';
                    });
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
        },
    }
</script>

<style scoped>
.is-invalid {
      border-color: #E84444;
      box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(232,68,68,.6);
    }
</style>
