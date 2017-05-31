@extends('layouts.admin-app')
@section('content')
    <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
    <link rel="stylesheet" href="{{URL('css/admin-tabs.css')}}">
    <link rel="stylesheet" href="{{URL('css/admin-approve.css')}}">


    <body class="tabs-back">
    <div class="w3-container">
        <div class="w3-row">
            <a href="javascript:void(0)" onclick="openTab(event, 'Waiting');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="text-align: center; font-weight: bold">Waiting for approval</div>
            </a>
            <a href="javascript:void(0)" onclick="openTab(event, 'Approved');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="text-align: center; font-weight: bold">Approved</div>
            </a>
        </div>

        <div id="Waiting" class="w3-container tabs" style="display:none">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Email</th>
                                    <th>Date Created</th>
                                    <th>Approve</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->city}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Approve">
                                                <a class="btn btn-success" href="{{route('user.get.approve')}}?uid={{$user->id}}">
                                                    <span class="glyphicon glyphicon-ok"></span>
                                                </a>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <a class="btn btn-danger" href="{{route('user.get.delete')}}?uid={{$user->id}}">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                            <div class="clearfix"></div>
                            <ul class="pagination pull-right">
                                <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="Approved" class="w3-container tabs" style="display:none;">
            <div class="container">
                <div class="row">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">Customers</h3>
                            <div class="pull-right">
                                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr class="filters">
                                <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                                <th><input type="text" class="form-control" placeholder="e-mail" disabled></th>
                                <th>Contract</th>
                                <th>Billing</th>
                                <th>Measiring</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($approved_users as $approved_user)
                                    <tr>
                                        <td>{{$approved_user->first_name}}</td>
                                        <td>{{$approved_user->last_name}}</td>
                                        <td>{{$approved_user->email}}</td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit/Delete Contract">
                                                <button class="btn btn-primary btn-xs" data-title="Delete" data-toggle="modal" data-target="#contractEdit" >
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </button>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit/Delete Billing">
                                                <button class="btn btn-primary btn-xs" data-title="Delete" data-toggle="modal" data-target="#billingEdit" >
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </button>
                                            </p>
                                        </td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit/Delete Measuring">
                                                <button class="btn btn-primary btn-xs" data-title="Delete" data-toggle="modal" data-target="#measuringEdit" >
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="contractEdit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Update/Delete contract</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table-fill">
                            <thead>
                            <tr>
                                <th>Contract Number</th>
                                <th>Contract Type</th>
                                <th>Starting Date</th>
                                <th>Suspension Date</th>
                                <th>Closing Date</th>
                                <th>Status</th>
                                <th>Old Contract Number</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="billingEdit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add/Update Bill</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table-fill">
                            <thead>
                            <tr>
                                <th>Contract Number</th>
                                <th>Contract Type</th>
                                <th>Starting Date</th>
                                <th>Suspension Date</th>
                                <th>Closing Date</th>
                                <th>Status</th>
                                <th>Old Contract Number</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="measuringEdit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Update/Delete Measurement</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table-fill">
                            <thead>
                            <tr>
                                <th>Contract Number</th>
                                <th>Contract Type</th>
                                <th>Starting Date</th>
                                <th>Suspension Date</th>
                                <th>Closing Date</th>
                                <th>Status</th>
                                <th>Old Contract Number</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <script type="text/javascript" src="{{URL('js/tabs.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/admin-pan.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/admin-approve-users.js')}}"></script>
    </body>
@endsection


