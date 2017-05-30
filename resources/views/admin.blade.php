@extends('layouts.admin-app')
@section('content')
    <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
    <link rel="stylesheet" href="{{URL('css/admin-tabs.css')}}">

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
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                        </div>
                        <div class="modal-footer ">
                            <a class="btn btn-danger" href="{{route('user.get.delete')}}?uid={{$user->id}}">
                                <span class="glyphicon glyphicon-ok-sign">Yes</span>
                            </a>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>

        <div id="Approved" class="w3-container tabs" style="display:none;">
            <div class="container">
                <div class="row">


                    <div class="col-md-12">
                        <h4>Bootstrap Snipp for Datatable</h4>
                        <div class="table-responsive">


                            <table id="mytable" class="table table-bordred table-striped">

                                <thead>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach ($approved_users as $approved_user)
                                    <tr>
                                        <td>{{$approved_user->first_name}}</td>
                                        <td>{{$approved_user->last_name}}</td>
                                        <td>{{$approved_user->address}}</td>
                                        <td>{{$approved_user->city}}</td>
                                        <td>{{$approved_user->email}}</td>
                                        <td>{{$approved_user->created_at}}</td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                            <div class="clearfix"></div>
                            <ul class="pagination pull-right">
                                <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                            </ul>

                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control " type="text" placeholder="Mohsin">
                            </div>
                            <div class="form-group">

                                <input class="form-control " type="text" placeholder="Irshad">
                            </div>
                            <div class="form-group">
                                <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                        </div>
                        <div class="modal-footer ">
                            <a class="btn btn-danger" href="{{route('user.get.delete')}}?uid={{$user->id}}">
                                <span class="glyphicon glyphicon-ok-sign">Yes</span>
                            </a>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
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


