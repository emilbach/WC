@extends('layouts.admin-app')
@section('content')
    <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
    <link rel="stylesheet" href="{{URL('css/admin-tabs.css')}}">
    <link rel="stylesheet" href="{{URL('css/admin-approve.css')}}">
    <link rel="stylesheet" href="{{URL('css/tables-info.css')}}">



    <body>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a href="javascript:void(0)" onclick="openTab(event, 'Waiting');" class="tablink" style="font-weight: bold">Waiting</a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" onclick="openTab(event, 'Approved');" class="tablink" style="font-weight: bold">Approved</a>
        </li>
    </ul>


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
                                        <td>{{ date('d M Y, G:i', strtotime($user->created_at)) }}</td>
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
                                        <td align="center">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit/Delete Contract">
                                                <a class="btn btn-primary btn-xs" href="{{ route('admin.user.get.contract', $approved_user->email) }}" >
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                            </p>
                                        </td>
                                        <td align="center">
                                            <p data-placement="top" data-toggle="tooltip" title="Add/Edit/Delete Billing" style="text-align: center">
                                                <a class="btn btn-primary btn-xs" href="{{ route('admin.user.get.bill', $approved_user->email) }}" >
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                            </p>
                                        </td>
                                        <td align="center">
                                            <p data-placement="top" data-toggle="tooltip" title="Add/Edit/Delete Measuring">
                                                <a class="btn btn-primary btn-xs" href="{{ route('admin.user.get.measurement', $approved_user->email) }}" >
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
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
    </div>
    <script type="text/javascript" src="{{URL('js/tabs.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/admin-pan.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/admin-approve-users.js')}}"></script>
    </body>
@endsection


