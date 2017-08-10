<!DOCTYPE html>
<html lang="en" ng-app="employeeRecords">
    <head>
        <title>Laravel 5 Angular JS CRUD Example</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
        
        <!--Datatables Application css  -->
         <link rel="stylesheet" href="<?= asset('app/lib/datatables/jquery.dataTables.min.css') ?>"> 
        <link rel="stylesheet" href="<?= asset('app/lib/datatables/datatables.bootstrap.min.css') ?>">
         <link rel="stylesheet" href="<?= asset('app/lib/datatables/angular-datatables.css') ?>"> 
        
    </head>
    <body ng-controller="employeesController"  style="background-color:whitesmoke;">
    </style>
        <div class="container">
            <center><h1>Basic Laravel 5.4 + AngularJS 1 CRUD</h1></center>
            <div class="col col-md-12">
                <div class="table-responsive">
                    <table datatable="ng" class="table table-bordered table-hover table-striped row-border hover" >
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Contact Number</td>
                                <td>Position</td>
                                <td><button class="btn btn-primary btn-xs" ng-click="toggle('add',0)">Add Employee</button></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="employee in employees">
                                <td>@{{ employee.id }}</td>
                                <td>@{{ employee.name }}</td>
                                <td>@{{ employee.email }}</td>
                                <td>@{{ employee.contact_number }}</td>
                                <td>@{{ employee.position }}</td>
                                <td>
                                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit',employee.id)">Edit</button>
                                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(employee.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>        
                </div>
            </div>
        </div>

        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>

        <!--Angular JS Application Scripts  -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/employee.js') ?>"></script>

        <!--Data tables  -->
        <script src="<?= asset('app/lib/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= asset('app/lib/datatables/angular-datatables.min.js') ?>"></script>

        <!--Modal Add/Update  -->
        <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="tue">x</span></button>
                        <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                    </div>
                    <div class="modal-body">
                            <form name="frmEmployee" class="form-horizontal" novalidate>

                                <div class="form-group error">
                                    <label for="inputName" class="col col-sm-3 control-label">Name</label>
                                    <div class="col col-sm-9">
                                        <input type="text" name="name" class="form-control has-error" id="name" ng-model="employee.name" ng-required="true" placeholder="Enter Full Name" value="@{{name}}">
                                        <span class="help-inline" ng-show="frmEmployee.name.$invalid && frmEmployee.name.$touched">Name field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputEmail" class="col col-sm-3 control-label">Email</label>
                                    <div class="col col-sm-9">
                                        <input type="email" name="email" class="form-control has-error" id="email" ng-model="employee.email" ng-required="true" placeholder="Email Email Address" value="@{{email}}">
                                        <span class="help-inline" ng-show="frmEmployee.email.$invalid && frmEmployee.email.$touched">Email field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputCnum" class="col col-sm-3 control-label">Contact Number</label>
                                    <div class="col col-sm-9">
                                        <input type="text" name="contact_number" class="form-control has-error" id="cnum" ng-model="employee.contact_number" ng-required="true" placeholder="Enter Contact Number" value="@{{contact_number}}">
                                        <span class="help-inline" ng-show="frmEmployee.contact_number.$invalid && frmEmployee.contact_number.$touched">Contact Number field is required</span>
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputPos" class="col col-sm-3 control-label">Position</label>
                                    <div class="col col-sm-9">
                                        <input type="text" name="position" class="form-control has-error" id="pos" ng-model="employee.position" ng-required="true" placeholder="Enter Position" value="@{{position}}">
                                        <span class="help-inline" ng-show="frmEmployee.position.$invalid && frmEmployee.position.$touched">Position field is required</span>
                                    </div>
                                </div>

                            </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="btn-save" ng-click="save(modalstate,id)" ng-disabled="frmEmployee.$invalid">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>