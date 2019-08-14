<template>
    <div class="container">
        <div class="card-header">
                <h3 class="card-title">Form List</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-success" @click="newModal">ADD NEW <i class="fas fa-user-plus fa-fw"></i></button>
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
                    <div class="form-group" v-for="(row,index) in form.rows" v-bind:key="index">

                        <input v-model="form.row" type="text" name="line[]" id="input"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('input') }">
                        <has-error :form="form" field="input"></has-error>
                            

                        <button class="btn btn-primary float-right" @click="removeRow(index)">REMOVE<i class="fas fa-plus fa-fw"></i></button>    
                        <button class="btn btn-primary float-right" @click="addRow">ADD<i class="fas fa-plus fa-fw"></i></button>
                    </div>  
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="!editmode" type="submit" class="btn btn-success">Create</button>
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
                blockRemoval: true,
                form : new Form ({
                    rows:['initial text']
                })
            }
        },
        watch: {
            lines () {
            this.blockRemoval = this.rows.length <= 1
            }
        },
       
        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },
            addRow(){
                 this.form.rows.push(this.form.rows[this.form.rows.length - 1])
            },
            removeRow(lineId){
                if (!this.blockRemoval) this.form.rows.splice(lineId, 1)
            },
            updateUser(){

            },
            createUser(){

            },
        },
        mounted () {
            this.addRow()
        }   
    }
</script>