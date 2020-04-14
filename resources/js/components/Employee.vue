<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                         <h3 class="card-title">Employees Information</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" >Add New <i class="fas fa-user-plus fa-fw"></i></button>
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
