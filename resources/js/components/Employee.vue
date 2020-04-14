<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                         <h3 class="card-title">Employees Information</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employees Table</h3>

                                <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 500px;">
                                <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                    <th class="bg-success">ID</th>
                                    <th class="bg-success">Staff Code</th>
                                    <th class="bg-success">Name</th>
                                    <th class="bg-success">Position</th>
                                    <th class="bg-success">Category</th>
                                    <th class="bg-success">Level</th>
                                    <th class="bg-success">Base</th>
                                    <th class="bg-success">Basic Salary</th>
                                    <th class="bg-success">Gross Salary</th>
                                    <th class="bg-success">Provident Amount</th>
                                    <th class="bg-success">Joining Date</th>
                                    <th class="bg-success">Ending Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="employee in employees.data" :key="employee.id">
                                    <td> {{employee.id}} </td>
                                    <td> {{employee.staff_code}} </td>
                                    <td> {{employee.first_name}} </td>
                                    <td> {{employee.position}} </td>
                                    <td> {{employee.category}} </td>
                                    <td> {{employee.level}} </td>
                                    <td> {{employee.base}} </td>
                                    <td> {{employee.basic_salary}} </td>
                                    <td> {{employee.gross_salary}} </td>
                                    <td> {{employee.pf_amount}} </td>
                                    <td> {{employee.joining_date}} </td>
                                    <td> {{employee.ending_date}} </td>
                                </tr>
                                </tbody>
                                </table>
                            </div>

                            <div class="card-footer">
                                <pagination :data="employees" @pagination-change-page="getResults"></pagination>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <!-- START  Modal -->
            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewLabel">Add New Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form >
                <div class="modal-body">

                    <div class="form-group">
                        <input v-model="form.staff_code" type="number" name="staff_code" placeholder="Staff Code"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('staff_code') }">
                        <has-error :form="form" field="staff_code"></has-error>
                    </div>

                     <div class="form-group">
                        <input v-model="form.last_name" type="text" name="first_name" placeholder="Last Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                        <has-error :form="form" field="last_name"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.name" type="text" name="last_name" placeholder="First Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                        <has-error :form="form" field="first_name"></has-error>
                    </div>

                     <div class="form-group">
                        <input v-model="form.position" type="text" name="position" placeholder="Position"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('position') }">
                        <has-error :form="form" field="position"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.category" type="text" name="category" placeholder="Category"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('category') }">
                        <has-error :form="form" field="category"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.level" type="text" name="level" placeholder="Level"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('level') }">
                        <has-error :form="form" field="level"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.base" type="text" name="base"
                            placeholder="Base"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('base') }">
                        <has-error :form="form" field="base"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.basic_salary" type="text" name="basic_salary" placeholder="Basic Salary"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('basic_salary') }">
                        <has-error :form="form" field="basic_salary"></has-error>
                    </div>

                     <div class="form-group">
                        <input v-model="form.gross_salary" type="text" name="gross_salary" placeholder="Gross Salary"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('gross_salary') }">
                        <has-error :form="form" field="gross_salary"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.pf_amount" type="text" name="pf_amount" placeholder="Provident Amount"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('pf_amount') }">
                        <has-error :form="form" field="pf_amount"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.joining_date" type="date" name="joining_date" placeholder="Joining Date"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('joining_date') }">
                        <has-error :form="form" field="joining_date"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.ending_date" type="date" name="ending_date"
                            placeholder="Ending Date"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('ending_date') }">
                        <has-error :form="form" field="ending_date"></has-error>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-success">Create</button>
                </div>

                </form>

                </div>
            </div>
            </div>
    <!-- END  Modal -->
    </div>
</template>

<script>
    export default {

        data(){
            return {
             employees : {},
                form: new Form({
                    id:'',
                    staff_code : '',
                    trimmed: '',
                    first_name: '',
                    last_name: '',
                    position: '',
                    category: '',
                    level: '',
                    base: '',
                    basic_salary: '',
                    gross_salary: '',
                    pf_amount: '',
                    joining_date: '',
                    ending_date: '',
                })
            }
        },
        methods:{

            getResults(page = 1) {
                axios.get('api/employee?page=' + page)
                    .then(response => {
                        this.employees = response.data;
                    });
                },

            loadEmployees(){
            console.log('Hi');
                    axios.get("/api/employee").then(({ data }) => (this.employees = data));
            }
        },

    created(){
            this.loadEmployees();
    }
    }
</script>
